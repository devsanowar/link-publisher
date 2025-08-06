@extends('admin.layouts.app')
@section('title', 'Deleted Website Order')
@push('styles')
<link rel="stylesheet" href="{{ asset('backend') }}/assets/css/sweetalert2.min.css">
@endpush
@section('admin_content')

@php
    $countDeletedData = App\Models\WebsiteOrder::onlyTrashed()->get();
@endphp


<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4 class=""> Deleted Order ( {{ $countDeletedData->count() }} )  <span> <a href="{{ route('order.index') }}" class="btn btn-warning text-white text-bold text-uppercase right">
                        All Order
                    </a></span> </h4>
                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Website Url</th>
                                <th>Website Category</th>
                                <th>Website_language</th>
                                <th>Monthly Traffic</th>
                                <th>Domain Authority</th>
                                <th>Pricing</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($websiteOrders as $key=>$order)
                            <tr>
                                <td>{{$key+1 }}</td>
                                <td>{{ $order->website_url }}</td>
                                <td>{{ $order->website_category }}</td>
                                <td>{{ $order->website_language }}</td>
                                <td>{{ $order->monthly_traffic }}</td>
                                <td>{{ $order->domain_authority }}</td>
                                <td>{{ $order->pricing }}</td>
                                <td>{{ $order->status }}</td>
                                <td>
                                    <a href="{{ route('order.restore',$order->id) }}" class="btn btn-primary btn-sm"> Restore </a>

                                    <form class="d-inline-block" action="{{ route('order.forceDelete',$order->id ) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm show_confirm">Permanently delete</button>
                                    </form>
                                </td>
                            </tr>



                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('backend') }}/assets/js/sweetalert2.all.min.js"></script>



<script>
    $('.show_confirm').click(function(event){
        let form = $(this).closest('form');
        event.preventDefault();

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Permanently delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success"
                });
            }
            });

    });


</script>
@endpush


