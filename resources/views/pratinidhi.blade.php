@extends('layouts.master')

@section('content')
    <style>
        .representatives-page .representative-notice {
            border-left: 4px solid var(--bs-primary);
        }

        .representatives-page .association-card {
            height: 100%;
        }

        .representatives-page .association-logo {
            width: 64px;
            height: 64px;
            object-fit: contain;
        }

        .representatives-page .representative {
            min-width: 180px;
            padding: 16px;
            background: #f8f9fa;
            border-radius: 10px;
        }
    </style>

    @php
        $associations = [
            [
                'name' => 'मराठी बांधकाम व्यावसायिक संघटना, पुणे',
                'city' => 'पुणे',
                'taluka' => 'पुणे शहर',
                'district' => 'पुणे',
                'area' => 'पुणे शहर व जिल्हा',
                'representatives' => [
                    ['name' => 'श्री. नितीन देशपांडे', 'role' => 'अध्यक्ष, स्थानिक संघटना'],
                    ['name' => 'श्री. मकरंद केळकर', 'role' => 'सदस्य, स्थानिक संघटना'],
                ],
            ],
            [
                'name' => 'मराठी बांधकाम व्यावसायिक संघटना, नाशिक',
                'city' => 'नाशिक',
                'taluka' => 'नाशिक',
                'district' => 'नाशिक',
                'area' => 'नाशिक शहर व जिल्हा',
                'representatives' => [
                    ['name' => 'श्री. संजय मोरे', 'role' => 'अध्यक्ष, स्थानिक संघटना'],
                    ['name' => 'श्री. अमोल घनदाट', 'role' => 'समिती सदस्य'],
                    ['name' => 'श्री. सुभाष तमखाने', 'role' => 'समिती सदस्य'],
                    ['name' => 'श्री. सचिन एस. चुमडे', 'role' => 'समिती सदस्य'],
                    ['name' => 'श्री. समाधान एच. सोनवणे', 'role' => '[पदनाम अद्ययावत करणे बाकी]'],
                ],
            ],
        ];
    @endphp

    <main class="representatives-page container-xxl py-5">
        <div class="container">
            <div class="mb-4">
                <div class="mb-2">
                    <a href="{{ route('home') }}#karyakarini">मुख्यपृष्ठ › कार्यकारिणी</a>
                    <span aria-hidden="true"> › </span>
                    <span>संलग्न संस्था व अधिकृत प्रतिनिधी</span>
                </div>
                <h1 class="display-5 mb-3">संलग्न संस्था व अधिकृत प्रतिनिधी</h1>
                <p class="mb-0">
                    Affiliated Associations &amp; Authorized Representatives — महासंघाशी अधिकृतरीत्या
                    संलग्न स्थानिक संघटना व त्यांचे प्रतिनिधी
                </p>
            </div>

            <div class="representative-notice alert alert-light mb-4" role="note">
                संस्थेचा अधिकृत प्रतिनिधी असल्यामुळे संबंधित व्यक्ती महासंघाच्या कार्यकारिणीची सदस्य आपोआप होत नाही.
                महासंघाच्या कार्यकारिणीत स्वतंत्र निवड/नियुक्ती झाली असल्यासच MBVM पदनाम दर्शवले जाते.
                प्रतिनिधीसंख्या व नियुक्त्या केवळ MBVM ने मान्य केल्याप्रमाणे.
            </div>

            <div class="row g-4">
                @foreach ($associations as $association)
                    <div class="col-12">
                        <section class="association-card card shadow-sm">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-start gap-3 mb-3">
                                    <img class="association-logo"
                                         src="{{ asset('img/logo-mbvm.png') }}"
                                         alt="MBVM">
                                    <div class="flex-grow-1">
                                        <h2 class="h4 mb-2">{{ $association['name'] }}</h2>
                                        <p class="text-muted mb-2">
                                            {{ $association['city'] }} · {{ $association['taluka'] }} तालुका ·
                                            {{ $association['district'] }} जिल्हा · कार्यक्षेत्र:
                                            {{ $association['area'] }}
                                        </p>
                                        <span class="badge bg-success">संलग्न</span>
                                        <span class="badge bg-secondary">
                                            [MBVM-मान्य प्रतिनिधीसंख्या: अद्ययावत करणे बाकी]
                                        </span>
                                    </div>
                                </div>

                                <h3 class="h6 mt-4">अधिकृत प्रतिनिधी</h3>
                                <div class="d-flex flex-wrap gap-3">
                                    @foreach ($association['representatives'] as $representative)
                                        <div class="representative text-center">
                                            <div class="mb-2 text-muted" aria-hidden="true">फोटो</div>
                                            <strong class="d-block">{{ $representative['name'] }}</strong>
                                            <span class="d-block">{{ $representative['role'] }}</span>
                                            <small class="text-muted d-block mt-1">MBVM कार्यकारिणीत पद नाही</small>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                @endforeach
            </div>

            <p class="text-muted small mt-4 mb-0">
                २२/०६/२०२६ च्या संयुक्त बैठकीच्या इतिवृत्तानुसार; अधिकृत प्रतिनिधी-मान्यता व छायाचित्रे
                प्रशासन पॅनेलमधून अद्ययावत करावीत.
            </p>
        </div>
    </main>
@endsection
