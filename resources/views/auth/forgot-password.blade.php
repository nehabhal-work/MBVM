@extends('layouts.master')

@section('content')
<div class="container-xxl py-5">
    <div class="container" style="max-width:450px;">
        <div class="card shadow-sm p-4">
            <h2 class="text-center section-title mb-4">पासवर्ड विसरलात?</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.forgot.send') }}">
                @csrf
                <div class="mb-4">
                    <label class="form-label">नोंदणीकृत ई-मेल *</label>
                    <input type="email" name="email" class="form-control" style="height:55px;" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-3">OTP पाठवा →</button>
            </form>
        </div>
    </div>
</div>
@endsection
