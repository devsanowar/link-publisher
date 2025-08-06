@php
    $filteredStatus = $filteredStatus ?? null;
@endphp


@if ($orders->count() > 0)
    @foreach ($orders as $key => $item)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $item->created_at->format('d/m/Y') }}</td>
            <td>#{{ $item->website_url }}</td>
            <td>{{ $item->website_category }}</td>
            <td>{{ $item->language }}</td>
            <td>{{ $item->monthly_traffic }}</td>
            <td>{{ $item->domain_authority }}</td>
            <td>{{ $item->domain_rating }}</td>
            <td>
                <form class="order-status-form d-inline-block" data-id="{{ $item->id }}">
                    @csrf
                    <div class="form-group mb-0">
                        <div class="row clearfix" id="custom-select-form">
                            <div class="col-lg-8 col-md-8">
                                <select name="status" class="form-control status-select show-tick">
                                    <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="inreview" {{ $item->status == 'inreview' ? 'selected' : '' }}>
                                        In Review</option>
                                    <option value="rejected" {{ $item->status == 'rejected' ? 'selected' : '' }}>
                                        Rejected</option>
                                    <option value="approved" {{ $item->status == 'approved' ? 'selected' : '' }}>
                                        Approved</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <button type="submit" class="btn btn-warning btn-sm text-white">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </td>
            <td>
                <a href="{{ route('orders.show', $item->id) }}" class="btn btn-primary btn-sm">
                    <i class="material-icons">visibility</i></a>

                <form class="d-inline-block" action="{{ route('orders.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm show_confirm">
                        <i class="material-icons">delete</i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="8" class="text-center">No orders found.</td>
    </tr>
@endif
