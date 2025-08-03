<?php

namespace App\Http\Controllers\Admin;

use App\Models\VisitorLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisitorLogController extends Controller
{
    public function index()
    {
        $visitors = VisitorLog::orderBy('visited_at', 'desc')->paginate(20);

        return view('admin.layouts.pages.visitors.index', compact('visitors'));
    }
}
