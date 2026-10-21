@extends('layouts.master')

@section('content')
    <style>
        .member-registration-page {
            min-height: 100vh;
            padding-bottom: 64px;
            color: #212529;
            background: #fff;
        }

        .member-registration-page__hero {
            padding: clamp(48px, 7vw, 78px) 0;
            color: #fff;
            background: linear-gradient(120deg, #1d2940 0%, #33425d 48%, #d45d2c 100%);
        }

        .member-registration-page__breadcrumb {
            margin-bottom: 14px;
            color: rgba(255, 255, 255, .82);
        }

        .member-registration-page__breadcrumb a {
            color: #fff;
            text-decoration: none;
        }

        .member-registration-page__title {
            margin: 0 0 12px;
            color: #fff;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
        }

        .member-registration-page__intro {
            max-width: 760px;
            margin: 0;
            color: rgba(255, 255, 255, .9);
            font-size: 1.1rem;
            line-height: 1.7;
        }

        .member-registration-page__body {
            max-width: 780px;
            padding-top: 36px;
        }

        .member-registration-page__notice {
            margin-bottom: 20px;
            padding: 14px 16px;
            color: #553c18;
            background: #fff8e8;
            border: 1px solid #f2dfb1;
            border-left: 4px solid #d45d2c;
            border-radius: 7px;
            line-height: 1.55;
        }

        .member-registration-page__card {
            padding: clamp(20px, 4vw, 32px);
            background: #fff;
            border: 1px solid #e9edf2;
            border-radius: 11px;
            box-shadow: 0 10px 28px rgba(29, 41, 64, .06);
        }

        .member-registration-page .form-label {
            margin-bottom: 6px;
            color: #212529;
            font-size: .95rem;
            font-weight: 700;
        }

        .member-registration-page .form-control,
        .member-registration-page .form-select {
            min-height: 44px;
            color: #212529;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 7px;
        }

        .member-registration-page .form-control::placeholder {
            color: #6c757d;
            opacity: 1;
        }

        .member-registration-page .form-control:focus,
        .member-registration-page .form-select:focus {
            color: #212529;
            background-color: #fff;
            border-color: #d45d2c;
            box-shadow: 0 0 0 .2rem rgba(212, 93, 44, .2);
        }

        .member-registration-page .form-select {
            color-scheme: dark;
        }

        .member-registration-page textarea.form-control {
            min-height: 96px;
            resize: vertical;
        }

        .member-registration-page .form-check-input {
            background-color: #fff;
            border-color: #6c757d;
        }

        .member-registration-page .form-check-input:checked {
            background-color: #d45d2c;
            border-color: #d45d2c;
        }

        .member-registration-page .form-check-label {
            color: #212529;
            line-height: 1.6;
        }

        .member-registration-page__privacy summary {
            display: inline;
            color: #e36c36;
            cursor: pointer;
            text-decoration: underline;
        }

        .member-registration-page__privacy p {
            margin: 10px 0 0;
            color: #6c757d;
            font-size: .9rem;
        }

        .member-registration-page__submit {
            min-height: 48px;
            color: #fff;
            background: #d45d2c;
            border: 0;
            border-radius: 28px;
            font-weight: 700;
        }

        .member-registration-page__submit:hover,
        .member-registration-page__submit:focus {
            color: #fff;
            background: #bd4e23;
        }

        @media (max-width: 575px) {
            .member-registration-page__body {
                padding-top: 24px;
            }
        }
    </style>

    <main class="member-registration-page">
        <header class="member-registration-page__hero">
            <div class="container">
                <div class="member-registration-page__breadcrumb">
                    <a href="{{ route('home') }}">मुख्यपृष्ठ</a>
                    <span aria-hidden="true"> / </span>
                    <span aria-current="page">सदस्यत्व नोंदणी</span>
                </div>
                <h1 class="member-registration-page__title">सदस्यत्व नोंदणी</h1>
                <p class="member-registration-page__intro">
                    स्थानिक बांधकाम व्यावसायिक संघटनेशी जोडण्यासाठी खालील माहिती भरा.
                </p>
            </div>
        </header>

        <div class="container member-registration-page__body">
            <div class="member-registration-page__notice" role="note">
                ही नोंदणी म्हणजे स्थानिक संघटनेत सहभागी होण्याची / संघटना स्थापन करण्याची इच्छा आहे; यामुळे थेट महासंघ
                सदस्यत्व मिळत नाही. नोंदणी विनामूल्य आहे.
            </div>

            <section class="member-registration-page__card" aria-label="सदस्य नोंदणी फॉर्म">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('members.store') }}">
                    @csrf

                    <div class="row g-3">
                        <div class="col-12">
                            <label for="member-name" class="form-label">पूर्ण नाव *</label>
                            <input id="member-name" type="text" name="name" value="{{ old('name') }}"
                                class="form-control" autocomplete="name" required>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="member-mobile" class="form-label">मोबाईल *</label>
                            <input id="member-mobile" type="tel" name="mobile" value="{{ old('mobile') }}"
                                class="form-control" placeholder="१० अंकी" maxlength="10" inputmode="numeric"
                                pattern="[0-9]{10}" title="मोबाईल नंबर १० अंकी असावा" autocomplete="tel"
                                oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)" required>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="member-email" class="form-label">ई-मेल *</label>
                            <input id="member-email" type="email" name="email" value="{{ old('email') }}"
                                class="form-control" autocomplete="email" required>
                        </div>

                        <div class="col-12">
                            <label for="member-company" class="form-label">कंपनी / व्यवसायाचे नाव *</label>
                            <input id="member-company" type="text" name="company_name"
                                value="{{ old('company_name') }}" class="form-control" required>
                        </div>

                        <div class="col-12">
                            <label for="member-address" class="form-label">पत्ता *</label>
                            <textarea id="member-address" name="address" class="form-control" rows="3" required>{{ old('address') }}</textarea>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="member-state" class="form-label">राज्य *</label>
                            <select id="member-state" name="state" class="form-select" required>
                                <option value="महाराष्ट्र" selected>महाराष्ट्र</option>
                            </select>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="jilha-select" class="form-label">जिल्हा *</label>
                            <select name="jilha" id="jilha-select" class="form-select" required>
                                <option value="">जिल्हा निवडा</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->name }}" data-id="{{ $district->id }}"
                                        {{ old('jilha') == $district->name ? 'selected' : '' }}>
                                        {{ $district->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="taluka-select" class="form-label">तालुका *</label>
                            <select name="taluka" id="taluka-select" class="form-select"
                                data-old-value="{{ old('taluka') }}" required>
                                <option value="">आधी जिल्हा निवडा</option>
                            </select>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="member-city" class="form-label">शहर *</label>
                            <input id="member-city" type="text" name="city" value="{{ old('city') }}"
                                class="form-control" list="city-options" autocomplete="address-level2" required>
                            <datalist id="city-options"></datalist>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="member-village" class="form-label">गाव (ऐच्छिक)</label>
                            <input id="member-village" type="text" name="village" value="{{ old('village') }}"
                                class="form-control">
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="member-business-type" class="form-label">व्यवसायाचा प्रकार *</label>
                            <select id="member-business-type" name="business_type" class="form-select" required>
                                <option value="">निवडा</option>
                                @foreach ([
                                    'विकासक / बिल्डर',
                                    'लँड डेव्हलपर',
                                    'अभियंता',
                                    'वास्तुविशारद',
                                    'कंत्राटदार',
                                    'पुरवठादार',
                                    'इतर',
                                ] as $businessType)
                                    <option value="{{ $businessType }}"
                                        {{ old('business_type') === $businessType ? 'selected' : '' }}>
                                        {{ $businessType }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="member-website" class="form-label">
                                वेबसाइट <span class="fw-normal">(ऐच्छिक)</span>
                            </label>
                            <input id="member-website" type="url" name="website" value="{{ old('website') }}"
                                class="form-control" placeholder="https://" autocomplete="url">
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="member-maharera" class="form-label">
                                MahaRERA नोंदणी क्रमांक <span class="fw-normal">(ऐच्छिक)</span>
                            </label>
                            <input id="member-maharera" type="text" name="maharera_number"
                                value="{{ old('maharera_number') }}" class="form-control">
                        </div>

                        <div class="col-12">
                            <label for="member-business-details" class="form-label">
                                व्यवसायाविषयी थोडक्यात <span class="fw-normal">(ऐच्छिक)</span>
                            </label>
                            <textarea id="member-business-details" name="business_details" class="form-control"
                                rows="4">{{ old('business_details') }}</textarea>
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                                <input id="contact-consent" type="checkbox" name="contact_consent" value="1"
                                    class="form-check-input" {{ old('contact_consent') ? 'checked' : '' }} required>
                                <label for="contact-consent" class="form-check-label">
                                    महासंघ व स्थानिक संघटनेने माझ्याशी फोन / WhatsApp / ई-मेलद्वारे संपर्क साधण्यास
                                    माझी संमती आहे.
                                </label>
                                <details class="member-registration-page__privacy">
                                    <summary>गोपनीयता धोरण</summary>
                                    <p>
                                        दिलेली वैयक्तिक माहिती नोंदणी आणि महासंघाच्या कामकाजासाठी वापरली जाईल.
                                        ही माहिती अनधिकृतपणे सार्वजनिक केली जाणार नाही.
                                    </p>
                                </details>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn member-registration-page__submit w-100">
                                नोंदणी करा
                            </button>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        $(function() {
            const $district = $('#jilha-select');
            const $taluka = $('#taluka-select');
            const $city = $('#member-city');
            const $cityOptions = $('#city-options');

            function loadDistrictPlaces(districtId, selectedTaluka = '') {
                $taluka.empty().append(new Option('लोड होत आहे...', ''));
                $cityOptions.empty();

                Promise.all([
                    fetch(`/get-talukas/${districtId}`).then(response => {
                        if (!response.ok) {
                            throw new Error('तालुका लोड करता आले नाहीत.');
                        }

                        return response.json();
                    }),
                    fetch(`/get-cities/${districtId}`).then(response => {
                        if (!response.ok) {
                            throw new Error('शहरे लोड करता आली नाहीत.');
                        }

                        return response.json();
                    })
                ]).then(([talukas, cities]) => {
                    $taluka.empty().append(new Option('तालुका निवडा', ''));
                    talukas.forEach(taluka => {
                        $taluka.append(new Option(taluka, taluka, false, taluka === selectedTaluka));
                    });
                    cities.forEach(city => {
                        $cityOptions.append(new Option(city, city));
                    });
                }).catch(error => {
                    console.error(error);
                    $taluka.empty().append(new Option('माहिती लोड करता आली नाही', ''));
                });
            }

            $district.on('change', function() {
                const districtId = $(this).find(':selected').data('id');

                if (!districtId) {
                    $taluka.empty().append(new Option('आधी जिल्हा निवडा', ''));
                    $cityOptions.empty();
                    return;
                }

                loadDistrictPlaces(districtId);
            });

            const selectedDistrictId = $district.find(':selected').data('id');
            if (selectedDistrictId) {
                loadDistrictPlaces(selectedDistrictId, $taluka.data('old-value') || '');
            }
        });
    </script>
@endpush
