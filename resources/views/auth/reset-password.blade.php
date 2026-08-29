@extends('layouts.master')

@section('content')
<div class="container-xxl py-5">
    <div class="container" style="max-width:450px;">
        <div class="card shadow-sm p-4">
            <h2 class="text-center section-title mb-4">नवीन पासवर्ड सेट करा</h2>
            <p class="text-center">{{ $email }}</p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.reset.update') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">नवीन पासवर्ड *</label>
                    <input type="password" name="password" class="form-control" style="height:55px;" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">पासवर्ड पुन्हा टाका *</label>
                    <input type="password" name="password_confirmation" class="form-control" style="height:55px;" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-3">पासवर्ड बदला →</button>
            </form>
        </div>
    </div>
</div>
@endsection
