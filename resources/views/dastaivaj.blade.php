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

            <div class="documents-page__grid">
                <article class="documents-page__card">
                    <div class="documents-page__icon"><i class="fas fa-handshake" aria-hidden="true"></i></div>
                    <h2>मसुदा MoU</h2>
                    <p>स्थानिक संघटना आणि महासंघ यांच्यातील संलग्नता, समन्वय आणि जबाबदाऱ्या स्पष्ट करणारा सामंजस्य करार.</p>
                    <span class="documents-page__status">
                        <i class="fas fa-clock" aria-hidden="true"></i>
                        मंजुरीनंतर उपलब्ध
                    </span>
                    <div>
                        <button class="documents-page__download" type="button" disabled
                            aria-label="मसुदा MoU PDF मंजुरीनंतर उपलब्ध होईल">
                            <i class="fas fa-file-pdf" aria-hidden="true"></i>
                            PDF डाउनलोड
                        </button>
                    </div>
                </article>

                <article class="documents-page__card">
                    <div class="documents-page__icon"><i class="fas fa-book-open" aria-hidden="true"></i></div>
                    <h2>मानक घटना</h2>
                    <p>स्थानिक संघटनेची रचना, पदाधिकारी, सदस्यत्व आणि कार्यपद्धती यांसाठीचा मानक घटनामसुदा.</p>
                    <span class="documents-page__status">
                        <i class="fas fa-clock" aria-hidden="true"></i>
                        मंजुरीनंतर उपलब्ध
                    </span>
                    <div>
                        <button class="documents-page__download" type="button" disabled
                            aria-label="मानक घटना PDF मंजुरीनंतर उपलब्ध होईल">
                            <i class="fas fa-file-pdf" aria-hidden="true"></i>
                            PDF डाउनलोड
                        </button>
                    </div>
                </article>

                <article class="documents-page__card">
                    <div class="documents-page__icon"><i class="fas fa-building" aria-hidden="true"></i></div>
                    <h2>संघटना स्थापना मार्गदर्शिका</h2>
                    <p>स्थानिक संघटनेची स्थापना आणि नोंदणी प्रक्रियेबाबत आवश्यक टप्पे व मार्गदर्शन.</p>
                    <span class="documents-page__status">
                        <i class="fas fa-clock" aria-hidden="true"></i>
                        तयारीत
                    </span>
                    <div>
                        <button class="documents-page__download" type="button" disabled
                            aria-label="संघटना स्थापना मार्गदर्शिका PDF उपलब्ध झाल्यावर डाउनलोड करा">
                            <i class="fas fa-file-pdf" aria-hidden="true"></i>
                            PDF डाउनलोड
                        </button>
                    </div>
                </article>

                <article class="documents-page__card">
                    <div class="documents-page__icon"><i class="fas fa-file-signature" aria-hidden="true"></i></div>
                    <h2>अर्ज नमुने</h2>
                    <p>संलग्नता आणि संघटना स्थापनेसाठी आवश्यक अर्ज व नमुना कागदपत्रे.</p>
                    <span class="documents-page__status">
                        <i class="fas fa-clock" aria-hidden="true"></i>
                        तयारीत
                    </span>
                    <div>
                        <button class="documents-page__download" type="button" disabled
                            aria-label="अर्ज नमुने PDF उपलब्ध झाल्यावर डाउनलोड करा">
                            <i class="fas fa-file-pdf" aria-hidden="true"></i>
                            PDF डाउनलोड
                        </button>
                    </div>
                </article>
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
