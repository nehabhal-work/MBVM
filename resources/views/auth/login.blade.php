@extends('layouts.master')

@section('content')
<div class="container-xxl py-5">
    <div class="container" style="max-width:500px;">
        <div class="card shadow-sm p-4">
            <h2 class="text-center section-title mb-4">लॉगिन करा</h2>

            @if (session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
            @if (session('error'))<div class="alert alert-warning">{{ session('error') }}</div>@endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">ई-मेल *</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" style="height:55px;" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">पासवर्ड *</label>
                    <div class="position-relative">
                        <input type="password" name="password" id="login-password" class="form-control"
                            style="height:55px; padding-right:50px;" required autocomplete="current-password">
                        <button type="button" id="toggle-password"
                            class="btn position-absolute top-50 end-0 translate-middle-y border-0 bg-transparent text-secondary px-3"
                            aria-label="पासवर्ड दाखवा" title="पासवर्ड दाखवा">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-3">लॉगिन →</button>
            </form>
            <p class="text-center mt-3">
                <a href="{{ route('password.forgot.show') }}">पासवर्ड विसरलात?</a> 
                {{-- <a href="{{ route('register.show') }}">नवीन खाते तयार करा</a> --}}
            </p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('toggle-password').addEventListener('click', function () {
        const input = document.getElementById('login-password');
        const icon = this.querySelector('i');
        const show = input.type === 'password';

        input.type = show ? 'text' : 'password';
        icon.classList.toggle('fa-eye', !show);
        icon.classList.toggle('fa-eye-slash', show);

        const label = show ? 'पासवर्ड लपवा' : 'पासवर्ड दाखवा';
        this.setAttribute('aria-label', label);
        this.setAttribute('title', label);
    });
</script>
@endpush
