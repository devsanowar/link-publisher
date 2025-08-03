@extends('publisher.layouts.app')
@section('title', 'Publisher profile')
@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
@endpush
@section('publisher_contents')
    <!-- body content -->
    <div class="profile-container">
        <!-- Sidebar -->
        <div class="profile-sidebar">
            <div class="profile-img">
                <img src="{{ asset(Auth::user()->image) }}" id="profilePic" alt="Profile">
                <label for="uploadImg">📷</label>
                <input type="file" id="uploadImg" accept="image/*">
            </div>

            <!-- Message placeholder -->
            <div id="imageMessage"></div>

            <h3>{{ Auth::user()->name }}</h3>
            <p>{{ Auth::user()->system_admin }}</p>
            <div class="profile-status">
                <span class="active">Status: Active</span>
                <span class="balance">Balance: $0</span>
                <span>{{ Auth::user()->created_at->format('d F Y') }}</span>
            </div>
            <!-- Password change section -->
            <div class="password-section" id="passwordSection">
                <button class="btn password-toggle-btn" id="togglePasswordBtn" onclick="togglePasswordForm()">Change
                    Password</button>

                <div id="passwordForm" style="display:none; margin-top: 15px;">
                    <div style="margin-bottom: 10px;">
                        <input type="password" placeholder="Current Password" id="currentPassword" class="password-input">
                    </div>
                    <div style="margin-bottom: 10px;">
                        <input type="password" placeholder="New Password" id="newPassword" class="password-input">
                    </div>
                    <div style="margin-bottom: 10px;">
                        <input type="password" placeholder="Confirm New Password" id="confirmPassword"
                            class="password-input">
                    </div>

                    <div class="password-btn-group">
                        <button onclick="savePassword()" class="btn btn-update">Update</button>
                        <button onclick="togglePasswordForm()" class="btn btn-cancel-style">Cancel</button>
                    </div>

                    <div id="passwordError" class="password-error-msg"></div>
                </div>
            </div>



        </div>

        <!-- Main Content -->
        <div class="profile-main">
            <div id="profileMessage"></div>
            <!-- Basic Info -->
            <div class="section" id="basicInfoSection">
                <form id="profile_edit" action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    <div id="basicInfo">
                        <div class="section-title">
                            Basic Information
                            <div class="edit-btns">
                                <button type="button" class="btn btn-edit" onclick="enableEdit('basicInfo')">Edit</button>
                                <button type="button" class="btn btn-save" style="display:none;">Save</button>
                                <button type="button" class="btn btn-cancel" style="display:none;"
                                    onclick="cancelEdit('basicInfo')">Cancel</button>
                            </div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">Name:</div>
                            <div class="info-value" data-key="name">{{ $user->name }}</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Email:</div>
                            <div class="info-value" data-key="email">{{ $user->email }}</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Phone:</div>
                            <div class="info-value" data-key="phone">{{ $user->phone }}</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Country:</div>
                            <div class="info-value" data-key="country">{{ $user->country }}</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Website:</div>
                            <div class="info-value" data-key="website_url">{{ $user->website_url }}</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Identity:</div>
                            <div class="info-value" data-key="identity">{{ $user->identity }}</div>
                        </div>
                    </div>
                </form>

            </div>


            <!-- Payment Info -->
            <div class="section" id="paymentInfo">
                <div class="section-title">
                    Payment Information
                    <div class="edit-btns">
                        <button class="btn btn-edit" onclick="enableEdit('paymentInfo')">Edit</button>
                        <button class="btn btn-save" onclick="saveEdit('paymentInfo')">Save</button>
                        <button class="btn btn-cancel" onclick="cancelEdit('paymentInfo')">Cancel</button>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-label">Payment Country:</div>
                    <div class="info-value" data-key="payCountry">Select Country</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Preferred Method:</div>
                    <div class="info-value" data-key="payMethod">paypal</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Paypal Email:</div>
                    <div class="info-value" data-key="paypalEmail">you@example.com</div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("collapsed");
        }
    </script>
    <script>
        function copyToClipboard() {
            const link = document.getElementById("affiliateLink").innerText;
            navigator.clipboard.writeText(link).then(() => {
                alert("Affiliate link copied!");
            });
        }
    </script>
<script>
    document.getElementById('uploadImg').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;

        // Show preview instantly
        const reader = new FileReader();
        reader.onload = function () {
            document.getElementById('profilePic').src = reader.result;
        }
        reader.readAsDataURL(file);

        // Upload via AJAX
        const formData = new FormData();
        formData.append('image', file);
        formData.append('_token', '{{ csrf_token() }}');

        fetch("{{ route('publisher.update-image') }}", {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(res => {
            const msgDiv = document.getElementById('imageMessage');
            msgDiv.innerHTML = `
                <div class="alert alert-${res.status === 'success' ? 'success' : 'danger'} alert-dismissible fade show" role="alert">
                    ${res.message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;
            setTimeout(() => {
                msgDiv.querySelector('.alert')?.classList.remove('show');
                setTimeout(() => msgDiv.innerHTML = '', 300);
            }, 2000);
        })
        .catch(err => {
            console.error('Upload failed', err);
        });
    });
</script>

    <!-- password change features -->
    <script>
        let isPasswordFormVisible = false;

        function togglePasswordForm() {
            const form = document.getElementById('passwordForm');
            const toggleBtn = document.getElementById('togglePasswordBtn');

            isPasswordFormVisible = !isPasswordFormVisible;

            form.style.display = isPasswordFormVisible ? 'block' : 'none';
            // toggleBtn.innerText = isPasswordFormVisible ? 'Cancel Password Change' : 'Change Password';

            if (!isPasswordFormVisible) clearPasswordForm();
        }

        function savePassword() {
            const current = document.getElementById('currentPassword').value.trim();
            const newPass = document.getElementById('newPassword').value.trim();
            const confirm = document.getElementById('confirmPassword').value.trim();
            const errorDiv = document.getElementById('passwordError');

            errorDiv.innerText = '';

            if (!current || !newPass || !confirm) {
                errorDiv.innerText = 'All fields are required.';
                return;
            }

            if (newPass.length < 6) {
                errorDiv.innerText = 'New password must be at least 6 characters.';
                return;
            }

            if (newPass !== confirm) {
                errorDiv.innerText = 'Passwords do not match.';
                return;
            }

            alert('Password updated successfully!');
            togglePasswordForm();
        }

        function clearPasswordForm() {
            document.getElementById('currentPassword').value = '';
            document.getElementById('newPassword').value = '';
            document.getElementById('confirmPassword').value = '';
            document.getElementById('passwordError').innerText = '';
        }
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('profile_edit');
            const saveBtn = form.querySelector('.btn-save');
            const messageDiv = document.getElementById('profileMessage');

            saveBtn.addEventListener('click', function(e) {
                e.preventDefault();

                const section = document.getElementById('basicInfo');
                const data = {};

                section.querySelectorAll('.info-value input').forEach(input => {
                    const key = input.getAttribute('name');
                    data[key] = input.value;
                });

                fetch('{{ route('profile.update') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(async res => {
                        if (!res.ok) throw await res.json();
                        return res.json();
                    })
                    .then(res => {
                        if (res.status === 'success') {
                            // Replace input fields with text
                            section.querySelectorAll('.info-value').forEach(el => {
                                const key = el.getAttribute('data-key');
                                el.textContent = data[key] || '';
                            });

                            // Button toggle
                            form.querySelector('.btn-edit').style.display = 'inline-block';
                            form.querySelector('.btn-save').style.display = 'none';
                            form.querySelector('.btn-cancel').style.display = 'none';

                            // ✅ Show message
                            messageDiv.innerHTML = `
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    ${res.message || 'Profile updated successfully!'}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            `;

                            // ⏳ Auto hide after 2s
                            setTimeout(() => {
                                const alert = messageDiv.querySelector('.alert');
                                if (alert) {
                                    alert.classList.remove('show');
                                    alert.classList.add('hide');
                                    alert.addEventListener('transitionend', () => {
                                        alert.remove();
                                    });
                                }
                            }, 1500);
                        }

                    })
                    .catch(err => {
                        console.error(err);
                        messageDiv.innerHTML = `
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        ${err.message || 'Something went wrong.'}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
                    });
            });
        });
    </script>
@endpush
