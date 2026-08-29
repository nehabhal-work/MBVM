@extends('layouts.master')

@section('content')
<div class="container-xxl py-5">
    <div class="container" style="max-width:450px;">
        <div class="card shadow-sm p-4 text-center">
            <h2 class="section-title mb-3">OTP पडताळणी</h2>
            <p>{{ $email }} वर पाठवलेला ६ अंकी OTP टाका</p>

            @if (session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('otp.verify.submit') }}">
                @csrf
                <input type="text" name="otp" maxlength="6" inputmode="numeric"
                       class="form-control text-center mb-3" style="height:55px; font-size:24px; letter-spacing:8px;"
                       oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,6)" required autofocus>
                <button type="submit" class="btn btn-primary w-100 py-3 mb-2">पडताळा →</button>
            </form>

            <form method="POST" action="{{ route('otp.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link">OTP पुन्हा पाठवा</button>
            </form>
        </div>
    </div>
</div>
@endsection
