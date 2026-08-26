@extends('layouts.master')

@section('content')
    <div class="container-xxl py-5">
        <div class="container" style="max-width:700px;">
            <div class="mb-4 text-start">
                <a href="{{ route('members.index') }}" class="btn btn-primary px-4">
                    <i class="fa fa-user-plus me-2"></i> Member list
                </a>
            </div>
            <div class="card shadow-sm p-4 ">
                <h2 class="text-center section-title">सदस्य नोंदणी फॉर्म</h2>
                <h5 class=" mb-4 mt-2 text-center">तुमच्या जवळच्या नियोजित संघटनेचे सदस्य होण्यासाठी आजच फॉर्म भरा!”
                </h5>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('members.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">पूर्ण नाव *</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                            style="height:55px;" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">मोबाईल नंबर *</label>
                        <input type="text" name="mobile" value="{{ old('mobile') }}" class="form-control"
                            style="height:55px;" maxlength="10" inputmode="numeric" pattern="[0-9]{10}"
                            title="मोबाईल नंबर १० अंकी असावा"
                            oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ई-मेल *</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                            style="height:55px;" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">जिल्हा *</label>
                        <input type="text" name="jilha" value="{{ old('jilha') }}" class="form-control"
                            style="height:55px;" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">तालुका *</label>
                        <input type="text" name="taluka" value="{{ old('taluka') }}" class="form-control"
                            style="height:55px;" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">शहर *</label>
                        <input type="text" name="city" value="{{ old('city') }}" class="form-control"
                            style="height:55px;" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">कंपनी / फर्मचे नाव *</label>
                        <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control"
                            style="height:55px;" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-3">सबमिट करा →</button>
                </form>
            </div>
        </div>
    </div>
@endsection
