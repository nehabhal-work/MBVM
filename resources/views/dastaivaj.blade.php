@extends('layouts.master')

@section('content')
    <style>
        .documents-page {
            padding-bottom: 64px;
        }

        .documents-page__hero {
            padding: clamp(48px, 7vw, 78px) 0;
            color: #fff;
            background: linear-gradient(120deg, #1d2940 0%, #33425d 48%, #d45d2c 100%);
        }

        .documents-page__breadcrumb {
            margin-bottom: 14px;
            color: rgba(255, 255, 255, .82);
        }

        .documents-page__breadcrumb a {
            color: #fff;
            text-decoration: none;
        }

        .documents-page__title {
            margin: 0 0 12px;
            color: #fff;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
        }

        .documents-page__intro {
            max-width: 760px;
            margin: 0;
            color: rgba(255, 255, 255, .9);
            font-size: 1.1rem;
            line-height: 1.7;
        }

        .documents-page__body {
            padding-top: 44px;
        }

        .documents-page__notice {
            display: flex;
            gap: 14px;
            align-items: flex-start;
            margin-bottom: 32px;
            padding: 20px 22px;
            color: #553c18;
            background: #fff8e8;
            border: 1px solid #f2dfb1;
            border-radius: 14px;
            line-height: 1.7;
        }

        .documents-page__notice i {
            margin-top: 5px;
            color: #bc7b19;
        }

        .documents-page__grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .documents-page__card {
            height: 100%;
            padding: 26px;
            background: #fff;
            border: 1px solid #e9edf2;
            border-radius: 16px;
            box-shadow: 0 10px 28px rgba(29, 41, 64, .06);
        }

        .documents-page__icon {
            display: grid;
            width: 48px;
            height: 48px;
            margin-bottom: 18px;
            place-items: center;
            color: #d45d2c;
            background: #fff0eb;
            border-radius: 13px;
            font-size: 1.2rem;
        }

        .documents-page__card h2 {
            margin-bottom: 8px;
            color: #1d2940;
            font-size: 1.3rem;
            font-weight: 700;
        }

        .documents-page__card p {
            margin-bottom: 18px;
            color: #596273;
            line-height: 1.7;
        }

        .documents-page__status {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 6px 11px;
            color: #76551c;
            background: #fff5dc;
            border-radius: 999px;
            font-size: .88rem;
            font-weight: 600;
        }

        .documents-page__download {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 18px;
            padding: 10px 16px;
            color: #fff;
            background: #d45d2c;
            border: 1px solid #d45d2c;
            border-radius: 999px;
            font: inherit;
            font-size: .95rem;
            font-weight: 700;
            opacity: .65;
            cursor: not-allowed;
        }

        .documents-page__cta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-top: 36px;
            padding: 26px;
            background: #f7f8fa;
            border-radius: 16px;
        }

        .documents-page__cta p {
            margin: 0;
            color: #414b5b;
            line-height: 1.7;
        }

        @media (max-width: 767px) {
            .documents-page__grid {
                grid-template-columns: 1fr;
            }

            .documents-page__cta {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>

    <main class="documents-page">
        <header class="documents-page__hero">
            <div class="container">
                <div class="documents-page__breadcrumb">
                    <a href="{{ route('home') }}">मुख्यपृष्ठ</a>
                    <span aria-hidden="true"> / </span>
                    <span aria-current="page">दस्तऐवज</span>
                </div>
                <h1 class="documents-page__title">दस्तऐवज</h1>
                <p class="documents-page__intro">
                    संलग्न संघटनांसाठी मसुदा MoU, मानक घटना, स्थापना मार्गदर्शिका आणि अर्ज नमुन्यांची माहिती.
                </p>
            </div>
        </header>

        <div class="container documents-page__body">
            <div class="documents-page__notice" role="note">
                <i class="fas fa-info-circle" aria-hidden="true"></i>
                <div>
                    <strong>महत्त्वाची सूचना</strong><br>
                    मसुदा MoU व घटनेचा अंतिम मजकूर महासंघाची कार्यकारिणी निश्चित करेल. मंजूर दस्तऐवज उपलब्ध झाल्यानंतर
                    या पृष्ठावर प्रकाशित केले जातील.
                </div>
            </div>

            {{-- Managed from ERP → दस्तऐवज (only Active documents show here) --}}
            <div class="documents-page__grid">
                @forelse ($documents as $document)
                    <article class="documents-page__card">
                        <div class="documents-page__icon"><i class="fas {{ $document->icon }}" aria-hidden="true"></i></div>
                        <h2>{{ $document->title }}</h2>
                        @if ($document->description)
                            <p>{{ $document->description }}</p>
                        @endif
                        @if ($document->file)
                            <span class="documents-page__status" style="color:#176344;background:#e8f6ef">
                                <i class="fas fa-check-circle" aria-hidden="true"></i>
                                उपलब्ध
                            </span>
                            <div>
                                <a class="documents-page__download text-decoration-none" style="opacity:1;cursor:pointer"
                                    href="{{ $document->file_url }}" target="_blank" rel="noopener" download>
                                    <i class="fas fa-file-download" aria-hidden="true"></i>
                                    डाउनलोड
                                </a>
                            </div>
                        @else
                            <span class="documents-page__status">
                                <i class="fas fa-clock" aria-hidden="true"></i>
                                {{ $document->pending_label }}
                            </span>
                            <div>
                                <button class="documents-page__download" type="button" disabled
                                    aria-label="{{ $document->title }} — {{ $document->pending_label }}">
                                    <i class="fas fa-file-pdf" aria-hidden="true"></i>
                                    PDF डाउनलोड
                                </button>
                            </div>
                        @endif
                    </article>
                @empty
                    <article class="documents-page__card" style="grid-column:1/-1">
                        <h2>दस्तऐवज लवकरच उपलब्ध होतील</h2>
                        <p class="mb-0">मंजूर दस्तऐवज या पृष्ठावर प्रकाशित केले जातील.</p>
                    </article>
                @endforelse
            </div>

            <div class="documents-page__cta">
                <p>आपल्या परिसरातील विकासकांना एकत्र आणण्यासाठी सदस्यत्व नोंदणी करा. नोंदणी विनामूल्य आहे.</p>
                <a class="btn mbvm-btn" href="{{ route('members.create') }}">
                    <i class="fas fa-user-plus me-1" aria-hidden="true"></i>
                    नोंदणी करा
                </a>
            </div>
        </div>
    </main>
@endsection
