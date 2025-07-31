@extends('publisher.layouts.app')
@section('title', 'Publisher profile')
@section('publisher_contents')
    <div class="profile-container">
        <!-- Sidebar -->
        <div class="profile-sidebar">
            <div class="profile-img">
                <img src="https://i.pravatar.cc/110?u=1" id="profilePic" alt="Profile">
                <label for="uploadImg">📷</label>
                <input type="file" id="uploadImg" accept="image/*">
            </div>
            <h3>MD EMON HOWLADER</h3>
            <p>Publisher</p>
            <div class="profile-status">
                <span class="active">Status: Active</span>
                <span class="balance">Balance: $0</span>
                <span>Joined on 28 July 2025</span>
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

            <!-- Basic Info -->
            <div class="section" id="basicInfo">
                <div class="section-title">
                    Basic Information
                    <div class="edit-btns">
                        <button class="btn btn-edit" onclick="enableEdit('basicInfo')">Edit</button>
                        <button class="btn btn-save" onclick="saveEdit('basicInfo')">Save</button>
                        <button class="btn btn-cancel" onclick="cancelEdit('basicInfo')">Cancel</button>
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
        // Profile image upload
        document.getElementById('uploadImg').addEventListener('change', function(e) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('profilePic').src = reader.result;
            }
            reader.readAsDataURL(e.target.files[0]);
        });

        const originalData = {};

        function enableEdit(sectionId) {
            const section = document.getElementById(sectionId);
            const values = section.querySelectorAll('.info-value');
            originalData[sectionId] = {};
            values.forEach(val => {
                const key = val.dataset.key;
                const current = val.textContent;
                originalData[sectionId][key] = current;
                val.innerHTML = `<input type="text" name="${key}" value="${current}">`;
            });
            toggleButtons(sectionId, true);
        }

        function saveEdit(sectionId) {
            const section = document.getElementById(sectionId);
            const inputs = section.querySelectorAll('input');
            inputs.forEach(input => {
                const key = input.name;
                const parent = input.parentElement;
                parent.textContent = input.value;
            });
            toggleButtons(sectionId, false);
        }

        function cancelEdit(sectionId) {
            const section = document.getElementById(sectionId);
            const values = section.querySelectorAll('.info-value');
            values.forEach(val => {
                const key = val.dataset.key;
                val.textContent = originalData[sectionId][key];
            });
            toggleButtons(sectionId, false);
        }

        function toggleButtons(sectionId, editing) {
            const section = document.getElementById(sectionId);
            section.querySelector('.btn-edit').style.display = editing ? 'none' : 'inline-block';
            section.querySelector('.btn-save').style.display = editing ? 'inline-block' : 'none';
            section.querySelector('.btn-cancel').style.display = editing ? 'inline-block' : 'none';
        }
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
    function enableEdit(sectionId) {
        const section = document.getElementById(sectionId);
        section.querySelectorAll('.info-value').forEach(el => {
            const key = el.getAttribute('data-key');
            const value = el.textContent.trim();
            el.innerHTML = `<input type="text" name="${key}" value="${value}" class="form-control">`;
        });
    }

    function cancelEdit(sectionId) {
        location.reload(); // simple reload to cancel changes
    }

    function saveEdit(sectionId) {
        const section = document.getElementById(sectionId);
        const inputs = section.querySelectorAll('input');
        const data = {};

        inputs.forEach(input => {
            data[input.name] = input.value;
        });

        fetch("{{ route('publisher.profile.update') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(res => res.json())
        .then(response => {
            if (response.status === 'success') {
                inputs.forEach(input => {
                    input.parentElement.innerHTML = data[input.name];
                });
                alert('Profile updated successfully');
            } else {
                alert('Update failed');
            }
        })
        .catch(err => {
            console.error(err);
            alert('Something went wrong');
        });
    }
</script>

@endpush
