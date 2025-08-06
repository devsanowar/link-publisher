<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\WebsiteOrder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = WebsiteOrder::latest()->get();
        return view('admin.layouts.pages.order.index', compact('orders'));
    }

    public function orderChangeStatus(Request $request, $id)
    {
        $request->validate([
            'status' => ['required', Rule::in(['pending', 'inreview', 'rejected', 'approved'])],
        ]);

        $order = WebsiteOrder::findOrFail($id);
        $order->status = $request->status ?? 'pending';
        $order->status_updated_at = now();
        $order->save();

        return response()->json(['message' => 'Order status updated successfully.']);
    }

    public function show($id)
    {
        $websiteOrder = WebsiteOrder::findOrFail($id);

        return view('admin.layouts.pages.order.show', compact('websiteOrder'));
    }

    public function destroy($id)
    {
        $order = WebsiteOrder::find($id);
        $order->delete();

        $toast = Toastr();
        $toast->success('Order and associated items deleted successfully!', 'Success');

        return redirect()->back();
    }

    // Just date and updated date for filter orders

    // public function orderFilter(Request $request)
    // {
    //     $start_date = $request->start_date;
    //     $end_date = $request->end_date;

    //     $orders = Order::where(function ($query) use ($start_date, $end_date) {
    //         if ($start_date && $end_date) {
    //             $query->whereBetween('created_at', [$start_date, $end_date])->orWhereBetween('updated_at', [$start_date, $end_date]);
    //         }
    //     })->get();

    //     return response()->json(['orders' => $orders]);
    // }

    public function orderFilter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $status = $request->status;

        $query = WebsiteOrder::query();

        if ($start_date) {
            $query->whereDate('created_at', '>=', $start_date);
        }

        if ($end_date) {
            $query->whereDate('created_at', '<=', $end_date);
        }

        if ($status) {
            $query->where('status', $status);
        }

        $orders = $query->latest()->get();

        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.layouts.pages.order.partials.order_table', [
                    'orders' => $orders,
                    'filteredStatus' => $status,
                ])->render(),
            ]);
        }

        return view('admin.layouts.pages.order.index', compact('orders'));
    }


    public function trashedData()
    {
        $websiteOrders = WebsiteOrder::onlyTrashed()->get();

        return view('admin.layouts.pages.order.recyclebin', compact('websiteOrders'));
    }


      // Restore product data
    public function restoreData($id)
    {
        WebsiteOrder::withTrashed()->where('id', $id)->restore();
        $toast = Toastr();
        $toast->success('Website Order restored successfully.');
        return redirect()->route('order.index');
    }

    public function forceDeleteData($id)
    {
        $websiteOrder = WebsiteOrder::withTrashed()->where('id', $id)->first();

        if (!$websiteOrder) {
            return redirect()->route('order.index')->with('error', 'Order not found.');
        }

        $websiteOrder->forceDelete();

        $toast = Toastr();
        $toast->success('Order permanently deleted successfully.');
        return redirect()->back();
    }



}
