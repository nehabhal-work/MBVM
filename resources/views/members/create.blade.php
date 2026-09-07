@extends('layouts.master')

@section('content')

    <div class="container-xxl py-5">
        <div class="container" style="max-width:700px;">
            <div class="mb-4 text-start">
                <a href="{{ route('home') }}" class="btn btn-primary px-4">
                    मुख्यपृष्ठावर परत जा
                </a>
            </div>
            <div class="card shadow-sm p-4">
                <h2 class="text-center section-title">सदस्य नोंदणी फॉर्म</h2>
                <h5 class="mb-4 mt-2 text-center">तुमच्या जवळच्या नियोजित संघटनेचे सदस्य होण्यासाठी आजच फॉर्म भरा!</h5>

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
                        <select name="jilha" id="jilha-select" class="form-select" style="width:100%;" required>
                            <option value="">-- जिल्हा निवडा --</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->name }}" data-id="{{ $district->id }}"
                                    {{ old('jilha') == $district->name ? 'selected' : '' }}>
                                    {{ $district->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">तालुका *</label>
                        <select name="taluka" id="taluka-select" class="form-select" style="width:100%;" required>
                            <option value="">-- आधी जिल्हा निवडा --</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">शहर *</label>
                        <select name="city" id="city-select" class="form-select" style="width:100%;" required>
                            <option value="">-- आधी जिल्हा निवडा --</option>
                        </select>
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

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#jilha-select').select2({
                placeholder: '-- जिल्हा निवडा --',
                width: '100%'
            });
            $('#taluka-select').select2({
                placeholder: '-- आधी जिल्हा निवडा --',
                width: '100%'
            });
            $('#city-select').select2({
                placeholder: '-- आधी जिल्हा निवडा --',
                width: '100%'
            });

            $('#jilha-select').on('change', function() {
                const districtId = $(this).find(':selected').data('id');
                const $taluka = $('#taluka-select');
                const $city = $('#city-select');

                $taluka.empty().append('<option value="">लोड होत आहे...</option>').trigger('change');
                $city.empty().append('<option value="">लोड होत आहे...</option>').trigger('change');

                if (!districtId) {
                    $taluka.empty().append('<option value="">-- आधी जिल्हा निवडा --</option>').trigger(
                        'change');
                    $city.empty().append('<option value="">-- आधी जिल्हा निवडा --</option>').trigger(
                        'change');
                    return;
                }

                fetch(`/get-talukas/${districtId}`)
                    .then(res => res.json())
                    .then(talukas => {
                        $taluka.empty().append('<option value="">-- तालुका निवडा --</option>');
                        talukas.forEach(t => $taluka.append(new Option(t, t)));
                        $taluka.trigger('change');
                    })
                    .catch(() => {
                        $taluka.empty().append('<option value="">तालुका लोड करता आले नाहीत</option>')
                            .trigger('change');
                    });

                fetch(`/get-cities/${districtId}`)
                    .then(res => res.json())
                    .then(cities => {
                        $city.empty().append('<option value="">-- शहर निवडा --</option>');
                        cities.forEach(c => $city.append(new Option(c, c)));
                        $city.trigger('change');
                    })
                    .catch(() => {
                        $city.empty().append('<option value="">शहर लोड करता आले नाहीत</option>')
                            .trigger('change');
                    });
            });
        });
    </script>
@endpush
