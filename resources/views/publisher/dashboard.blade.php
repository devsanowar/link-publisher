@extends('publisher.layouts.app')
@section('title','dashboard')
@section('publisher_contents')

<div class="alert alert-success">
                    Tax information needed - <a href="#" class="alert-link">Click here</a> to complete your profile to
                    withdraw funds.
                </div>

<div class="row">
    <div class="col-md-3">
        <div class="card-box bg-dashboard-info">
            <div>Total Websites</div>
            <div class="fs-2">0</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card-box bg-dashboard-warning">
            <div>Total Orders</div>
            <div class="fs-2">0</div>
            <small>0 Completed Orders | 0 Pending Orders</small>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card-box bg-dashboard-primary">
            <div>Total Sales</div>
            <div class="fs-2">$0</div>
            <small>$0 Amount Withdrawn</small>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card-box bg-dashboard-success">
            <div>New Customers</div>
            <div class="fs-2">0</div>
            <small>Last 7 Days</small>
        </div>
    </div>
</div>

    
@endsection