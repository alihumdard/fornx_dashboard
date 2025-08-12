<div class="row">
    {{-- name --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label my-2">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}"
                placeholder="Enter User Name">
            @if ($errors->has('name'))
                <small class="text-danger">{{ $errors->first('name') }}</small>
            @endif
        </div>
    </div>
    {{-- email --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label my-2">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email ?? '') }}"
                placeholder="Enter User Email">
            @if ($errors->has('email'))
                <small class="text-danger">{{ $errors->first('email') }}</small>
            @endif
        </div>
    </div>
    {{-- role --}}
    <div class="col-lg-6 col-sm-12-col-12">
        <div class="form-group" id="role-selec-dropdown">
            <label>Role</label>
            <select name="role_id" class="form-control" id="">
                <option value="">Select role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}"
                        {{ old('role_id', $user->role_id ?? '') == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('role_id'))
                <small class="text-danger">{{ $errors->first('role_id') }}</small>
            @endif
        </div>
    </div>
    {{-- access --}}
    <div class="col-lg-6 col-sm-12-col-12">
        <div class="form-group" id="access-selec-dropdown">
            <label>Access</label>
            <select name="access_id" class="form-control" id="">
                <option value="">Select access</option>
                @foreach ($accesses as $access)
                    <option value="{{ $access->id }}"
                        {{ old('access_id', $user->access_id ?? '') == $access->id ? 'selected' : '' }}>
                        {{ $access->name }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('access_id'))
                <small class="text-danger">{{ $errors->first('access_id') }}</small>
            @endif
        </div>
    </div>
    {{-- phone --}}
    <div class="col-lg-6 col-sm-12-col-12">
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone ?? '') }}"
                placeholder="Enter phone number">
        </div>
        @if ($errors->has('phone'))
            <small class="text-danger">{{ $errors->first('phone') }}</small>
        @endif
    </div>
    {{-- Gender --}}
    <div class="col-lg-6 col-sm-12-col-12">
        <div class="form-group">
            <label>Gender</label>
            <select name="gender" id="" class="form-control">
                <option value="" disabled selected>Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        @if ($errors->has('phone'))
            <small class="text-danger">{{ $errors->first('phone') }}</small>
        @endif
    </div>
    {{-- password --}}
    <style>
        .password-wrapper {
            position: relative;
        }

        .generate-pass-inside {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 16px;
            color: #7114EF;
            text-decoration: none;
            
        }
    </style>

    <div class="col-lg-6 col-sm-12 col-12">
        <div class="form-group">
            <label>Generate Password</label>
            <div class="password-wrapper">
                <input type="text" id="password" name="password" class="form-control"
                    placeholder="Enter Password">
                <span class="generate-pass-inside" onclick="generatePassword()">Generate</span>
            </div>
        </div>
    </div>

    {{-- send email --}}
    @if (!isset($user))
    <div class="col-lg-12 col-sm-12 col-12">
        <div class="verify-user">
            <label style="display: flex; align-items: center; gap: 10px;">
                <input type="checkbox" name="send_email" id="notifyCheckbox" onchange="toggleCheckIcon(this)">
                <img id="checkIcon" src="{{ asset('assets/images/check-icon.png') }}" alt="icon"
                    style="display: none; width: 20px;">
            </label>
            <p>Send the new user an email about their account.</p>
        </div>
    </div>
    @endif

    <script>
        function toggleCheckIcon(checkbox) {
            const icon = document.getElementById('checkIcon');
            icon.style.display = checkbox.checked ? 'inline' : 'none';
        }
    </script>


</div>
<script>
    function generatePassword() {
        const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()';
        let password = '';
        for (let i = 0; i < 12; i++) {
            password += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        document.getElementById('password').value = password;
    }
</script>
