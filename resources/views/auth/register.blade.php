@extends('layouts.master')

@section('content')
<div class="container-xxl py-5">
    <div class="container" style="max-width:500px;">
        <div class="card shadow-sm p-4">
            <h2 class="text-center section-title mb-4">नवीन खाते तयार करा</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">पूर्ण नाव *</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" style="height:55px;" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ई-मेल *</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" style="height:55px;" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">पासवर्ड *</label>
                    <input type="password" name="password" class="form-control" style="height:55px;" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">पासवर्ड पुन्हा टाका *</label>
                    <input type="password" name="password_confirmation" class="form-control" style="height:55px;" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-3">नोंदणी करा →</button>
            </form>
            <p class="text-center mt-3">आधीच खाते आहे? <a href="{{ route('login.show') }}">लॉगिन करा</a></p>
        </div>
    </div>
</div>
@endsection
