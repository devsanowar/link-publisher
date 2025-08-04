@extends('publisher.layouts.app')
@section('title', 'Add Website')
@section('publisher_contents')
    <div class="container mt-4 dashboard-add-new-form">
        <!-- Navigation Path -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb small">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Website</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add New</li>
            </ol>
        </nav>

        <!-- Tax Notice -->
        <div class="alert alert-success d-flex justify-content-between align-items-center">
            <span>Tax information needed <a href="#" class="text-primary text-decoration-underline small">Click
                    here</a> </span>

        </div>


        <!-- Form Card -->
        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <!-- <h5 class="card-title mb-3">Add Website</h5> -->

                <div class="alert-box">
                    Make sure that any website you add to the platform has
                    <strong>at least 250 monthly visitors and a DA and DR of at least 15.</strong>
                    Add websites that don’t meet these requirements and
                    <strong>include PBN websites may result in an account ban.</strong>
                </div>


            </div>
        </div>
        <!-- Form -->
        <!-- Step Indicator -->
        <div class="step-indicator my-3">
            <!-- <span>2</span> -->
            <h5 class="card-title mb-4" style="color:#f4601d"> <span style="color:#000"></span>Add Website with
                Details</h5>
            <!-- <span>2</span> Verification &nbsp; › &nbsp;
                            <span>3</span>  -->
        </div>
        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <div id="successMessage" class="alert alert-success" style="display: none;"></div>
                <form id="websiteAddForm">
                    @csrf
                    <div class="row g-3">
                        <div class="mb-3">
                            <label for="website_url" class="form-label">1. Add Your Website</label>
                            <input type="url" class="form-control" id="website_url" name="website_url"
                                placeholder="https://example.com" required>
                        </div>

                        <div>
                            <label for="website_category" class="form-label">Website Niche / Category</label>
                            <input type="text" class="form-control" id="website_category" name="website_category"
                                placeholder="e.g. Technology, Health, Travel" required>
                        </div>

                        <div>
                            <label for="website_language" class="form-label">Primary Language</label>
                            <input type="text" class="form-control" id="website_language" name="website_language"
                                placeholder="e.g. English, Spanish" required>
                        </div>

                        <div class="col-md-4">
                            <label for="monthly_traffic" class="form-label">Monthly Traffic</label>
                            <input type="number" class="form-control" id="monthly_traffic" name="monthly_traffic"
                                placeholder="e.g. 1000" required>
                        </div>

                        <div class="col-md-4">
                            <label for="domain_authority" class="form-label">Domain Authority (DA)</label>
                            <input type="number" class="form-control" id="domain_authority" name="domain_authority"
                                placeholder="e.g. 20" required>
                        </div>

                        <div class="col-md-4">
                            <label for="domain_rating" class="form-label">Domain Rating (DR)</label>
                            <input type="number" class="form-control" id="domain_rating" name="domain_rating"
                                placeholder="e.g. 25" required>
                        </div>

                        <div>
                            <label for="pricing" class="form-label">Pricing (optional)</label>
                            <input type="text" class="form-control" id="pricing" name="pricing"
                                placeholder="e.g. $50 per post">
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary px-4">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $(document).ready(function() {
            $('#websiteAddForm').submit(function(e) {
                e.preventDefault();

                let website_url = $('#website_url').val();
                let website_category = $('#website_category').val();
                let website_language = $('#website_language').val();
                let monthly_traffic = $('#monthly_traffic').val();
                let domain_authority = $('#domain_authority').val();
                let domain_rating = $('#domain_rating').val();
                let pricing = $('#pricing').val();

                $.ajax({
                    url: '{{ route('website.store') }}',
                    type: 'POST',
                    data: {
                        website_url,
                        website_category,
                        website_language,
                        monthly_traffic,
                        domain_authority,
                        domain_rating,
                        pricing
                    },
                    success: function(response) {
                        // Show success message
                        $('#successMessage').text(response.message).fadeIn();

                        // Clear form
                        $('#websiteAddForm')[0].reset();

                        // Hide after 3 seconds
                        setTimeout(function() {
                            $('#successMessage').fadeOut();
                        }, 3000);
                    },
                    error: function(xhr) {
                        let message = 'An error occurred.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            message = xhr.responseJSON.message;
                        }
                        alert('Error: ' + message);
                    }
                });
            });
        });
    </script>
@endpush
