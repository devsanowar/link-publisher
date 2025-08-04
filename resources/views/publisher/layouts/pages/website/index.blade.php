@extends('publisher.layouts.app')
@section('title', 'Website')
@section('publisher_contents')
    <div class="container mt-4">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fas fa-home me-1"></i><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Websites</li>
            </ol>
        </nav>


        <!-- Tax Alert -->
        <div class="alert alert-success d-flex justify-content-between align-items-center" role="alert">
            <strong>Tax information needed</strong>
            <span>Click <a href="#">here</a> to complete your profile to withdraw funds.</span>
        </div>

        <!-- Websites Section -->
        <div class="card shadow-sm my-website-dashboard-body">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0">My Websites</h5>
                    <button class="btn btn-add-website"><i class="fas fa-plus me-2"></i>ADD WEBSITE</button>
                </div>
                <!-- Modal -->
                <div class="modal-overlay" id="popupModal">
                    <div class="modal-box">
                        <div class="close-icon" onclick="closeModal()">&times;</div>
                        <h2>By continuing, you agree to the following conditions:</h2>
                        <ul class="modal-rules-list default-list">
                            <li>
                                Add Website metrics
                                <ul class="nested-li-my-website-terms">
                                    <li>A minimum of 100 articles of a website should be indexed on Google. Link
                                        Publishers only considers websites with REAL high-quality traffic. PBN
                                        websites are immediately rejected from our list of accepted websites.
                                        Note: Including PBN websites may result in an account ban.</li>
                                    <li>A domain must have at least six months of age.</li>
                                    <li>Domain Authority of a website must be no less than 15.</li>
                                    <li>Website Ahrefs or Semrush Organic Traffic should be greater than 250.
                                    </li>
                                    <li>MOZ Spam Score of a website can be no more than 30%.</li>
                                </ul>
                            </li>
                            <li>Content on websites must be unique, readable and frequently updated.</li>
                            <li>Websites violating any laws are banned.</li>
                            <li>Websites not conforming to the ethical standards and highest moral is
                                prohibited..</li>
                            <li>Forbidden categories that are accepted: CBD, Casino, Vape ,Cryptocurrency</li>
                            <li>We are also authorized to assess the website from an end-user's perspective.
                                Thus, we may reject a website if our expectations are not met.</li>
                        </ul>
                        <!-- <button class="agree-btn" onclick="redirectToNextPage()">Agree and Continue</button> -->

                        <a href="{{ route('website.create') }}"><button class="agree-btn">Agree and
                                Continue</button></a>
                    </div>

                </div>

                <!-- Tabs -->
                <ul class="nav nav-tabs custom-tabs mb-3" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#approved">Approved (2)</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#pending">Pending
                            (1)</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#review">In Review
                            (1)</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#rejected">Rejected
                            (1)</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#all">All (5)</a></li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content">
                    <!-- Approved -->
                    <div class="tab-pane fade show active" id="approved">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center align-middle">
                                <thead>
                                    <tr>
                                        <th>Website URL</th>
                                        <th>DA</th>
                                        <th>Ahrefs Traffic</th>
                                        <th>Semrush Traffic</th>
                                        <th>Google Analytics</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Live Link Validity</th>
                                        <th>Action</th>
                                        <th>Verify</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>www.approved1.com</td>
                                        <td>45</td>
                                        <td>1200</td>
                                        <td>1500</td>
                                        <td><i class="fas fa-check-circle text-success"></i></td>
                                        <td>$25</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>30 days</td>
                                        <td><button class="btn btn-sm btn-primary">Edit</button></td>
                                        <td><button class="btn btn-sm btn-warning">Verify</button></td>
                                    </tr>
                                    <tr>
                                        <td>www.approved2.net</td>
                                        <td>38</td>
                                        <td>800</td>
                                        <td>950</td>
                                        <td><i class="fas fa-check-circle text-success"></i></td>
                                        <td>$18</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>60 days</td>
                                        <td><button class="btn btn-sm btn-primary">Edit</button></td>
                                        <td><button class="btn btn-sm btn-warning">Verify</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Pending -->
                    <div class="tab-pane fade" id="pending">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center align-middle">
                                <thead>
                                    <tr>
                                        <th>Website URL</th>
                                        <th>DA</th>
                                        <th>Ahrefs Traffic</th>
                                        <th>Semrush Traffic</th>
                                        <th>Google Analytics</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Live Link Validity</th>
                                        <th>Action</th>
                                        <th>Verify</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>www.pending.com</td>
                                        <td>33</td>
                                        <td>550</td>
                                        <td>620</td>
                                        <td><i class="fas fa-minus-circle text-warning"></i></td>
                                        <td>$20</td>
                                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                                        <td>N/A</td>
                                        <td><button class="btn btn-sm btn-secondary">Edit</button></td>
                                        <td><button class="btn btn-sm btn-outline-secondary">Verify</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- In Review -->
                    <div class="tab-pane fade" id="review">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center align-middle">
                                <thead>
                                    <tr>
                                        <th>Website URL</th>
                                        <th>DA</th>
                                        <th>Ahrefs Traffic</th>
                                        <th>Semrush Traffic</th>
                                        <th>Google Analytics</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Live Link Validity</th>
                                        <th>Action</th>
                                        <th>Verify</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>www.reviewsite.com</td>
                                        <td>41</td>
                                        <td>770</td>
                                        <td>820</td>
                                        <td><i class="fas fa-clock text-info"></i></td>
                                        <td>$23</td>
                                        <td><span class="badge bg-info text-dark">In Review</span></td>
                                        <td>N/A</td>
                                        <td><button class="btn btn-sm btn-secondary">Edit</button></td>
                                        <td><button class="btn btn-sm btn-outline-secondary">Verify</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Rejected -->
                    <div class="tab-pane fade" id="rejected">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center align-middle">
                                <thead>
                                    <tr>
                                        <th>Website URL</th>
                                        <th>DA</th>
                                        <th>Ahrefs Traffic</th>
                                        <th>Semrush Traffic</th>
                                        <th>Google Analytics</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Live Link Validity</th>
                                        <th>Action</th>
                                        <th>Verify</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>www.rejectedsite.com</td>
                                        <td>20</td>
                                        <td>150</td>
                                        <td>200</td>
                                        <td><i class="fas fa-times text-danger"></i></td>
                                        <td>$10</td>
                                        <td><span class="badge bg-danger">Rejected</span></td>
                                        <td>N/A</td>
                                        <td><button class="btn btn-sm btn-secondary">Edit</button></td>
                                        <td><button class="btn btn-sm btn-outline-secondary">Verify</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- All -->
                    <div class="tab-pane fade" id="all">
                        <p class="text-muted">All websites will be shown here.</p>
                        <!-- You can copy all 5 rows above and show them in this table if needed -->
                    </div>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        <label for="show" class="form-label me-2">Show</label>
                        <select id="show" class="form-select d-inline-block w-auto">
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                        </select>
                    </div>
                    <div>
                        <button class="btn btn-add-website me-2"><i class="fas fa-arrow-left me-1"></i>
                            Previous</button>
                        <button class="btn btn-add-website">Next <i class="fas fa-arrow-right ms-1"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("collapsed");
        }
    </script>
    <!-- Add Website Modal -->
    <script>
        const modal = document.getElementById('popupModal');

        document.querySelector('.btn-add-website').addEventListener('click', () => {
            modal.style.display = 'flex';
        });

        function closeModal() {
            modal.style.display = 'none';
        }

        // Optional: Close when clicking outside the modal box
        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });
    </script>
@endpush