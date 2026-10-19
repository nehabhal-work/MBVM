@extends('layouts.master')

@section('content')
    <style>
        #karyakarini .executive-eyebrow {
            display: inline-block;
            color: #d45d2c;
            font-weight: 700;
            letter-spacing: .04em;
        }

        #karyakarini .executive-heading {
            margin: 8px 0 16px;
            color: #1d2940;
            font-weight: 700;
        }

        #karyakarini .permanent-trustees {
            margin-bottom: 32px;
            padding: 28px;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .06);
        }

        #karyakarini .permanent-trustees__heading {
            margin-bottom: 10px;
            color: #1d2940;
            font-weight: 700;
        }

        #karyakarini .permanent-trustees__heading span {
            color: #6c757d;
            font-size: .7em;
            font-weight: 400;
        }

        #karyakarini .permanent-trustees__note {
            margin-bottom: 22px;
            color: #555;
            line-height: 1.7;
        }

        #karyakarini .permanent-trustees__grid {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 16px;
        }

        #karyakarini .permanent-trustee {
            padding: 18px 12px;
            background: #f8f9fa;
            border-radius: 12px;
            text-align: center;
        }

        #karyakarini .permanent-trustee__photo {
            display: grid;
            width: 76px;
            aspect-ratio: 1;
            margin: 0 auto 12px;
            place-items: center;
            color: #6c757d;
            background: #fff;
            border: 1px dashed #ced4da;
            border-radius: 50%;
        }

        #karyakarini .permanent-trustee b,
        #karyakarini .permanent-trustee span,
        #karyakarini .permanent-trustee small {
            display: block;
        }

        #karyakarini .permanent-trustee b {
            margin-bottom: 5px;
            color: #1d2940;
        }

        #karyakarini .permanent-trustee span {
            color: #d45d2c;
        }

        #karyakarini .permanent-trustee small {
            margin-top: 4px;
            color: #6c757d;
        }

        #karyakarini .exec-layout {
            display: grid;
            grid-template-columns: minmax(0, 3fr) minmax(250px, 1fr);
            gap: 24px;
            align-items: start;
        }

        #karyakarini .sub {
            padding: 26px;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .06);
        }

        #karyakarini .subhead {
            margin-bottom: 10px;
            color: #1d2940;
            font-size: 1.35rem;
            font-weight: 700;
        }

        #karyakarini .subhead span {
            color: #6c757d;
            font-size: .68em;
            font-weight: 400;
        }

        #karyakarini .subnote {
            margin-bottom: 20px;
            color: #555;
            line-height: 1.7;
        }

        #karyakarini .president {
            max-width: 240px;
            margin: 0 auto 20px;
            padding: 20px;
            background: #f8f9fa;
            border: 1px solid #eee;
            border-top: 4px solid #d45d2c;
            border-radius: 12px;
            text-align: center;
        }

        #karyakarini .person .photo {
            display: grid;
            width: 72px;
            aspect-ratio: 1;
            margin: 0 auto 12px;
            place-items: center;
            color: #6c757d;
            background: #fff;
            border: 1px dashed #ced4da;
            border-radius: 50%;
        }

        #karyakarini .president .photo {
            width: 92px;
        }

        #karyakarini .person b,
        #karyakarini .person span,
        #karyakarini .person small {
            display: block;
        }

        #karyakarini .person b {
            color: #1d2940;
        }

        #karyakarini .person span {
            margin-top: 5px;
            color: #d45d2c;
        }

        #karyakarini .person small {
            margin-top: 4px;
            color: #6c757d;
        }

        #karyakarini .exec-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
        }

        #karyakarini .exec-grid .person,
        #karyakarini .honorary .person {
            padding: 18px 12px;
            background: #f8f9fa;
            border-radius: 12px;
            text-align: center;
        }

        #karyakarini .person.pending {
            border: 1px dashed #ced4da;
        }

        #karyakarini .person.pending b {
            color: #6c757d;
        }

        #karyakarini .exec-sample {
            margin: 20px 0 0;
            color: #6c757d;
            line-height: 1.7;
        }

        #karyakarini .honorary {
            display: grid;
            gap: 12px;
        }

        #karyakarini .honorary .subhead,
        #karyakarini .honorary .subnote {
            margin-bottom: 0;
        }

        #karyapaddhati {
            background: #f8f9fa;
        }

        #karyapaddhati .process-chain {
            max-width: 780px;
            margin: 32px auto 0;
        }

        #karyapaddhati .process-step {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px 20px;
            background: #fff;
            border: 1px solid #e9ecef;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, .05);
            font-weight: 600;
        }

        #karyapaddhati .process-step--main {
            border-color: #d45d2c;
        }

        #karyapaddhati .process-number {
            display: grid;
            flex: 0 0 42px;
            width: 42px;
            height: 42px;
            place-items: center;
            color: #fff;
            background: #d45d2c;
            border-radius: 50%;
            font-size: 1.15rem;
        }

        #karyapaddhati .process-arrow {
            color: #d45d2c;
            font-size: 1.5rem;
            line-height: 1;
            text-align: center;
        }

        #karyapaddhati .process-split,
        #karyapaddhati .process-compare {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        #karyapaddhati .process-split .process-step {
            display: block;
        }

        #karyapaddhati .process-split small,
        #karyapaddhati .process-followup span {
            display: block;
            color: #6c757d;
            font-weight: 400;
        }

        #karyapaddhati .process-followup {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
        }

        #karyapaddhati .process-followup>div {
            height: 100%;
            padding: 20px;
            background: #fff;
            border: 1px solid #e9ecef;
            border-radius: 12px;
        }

        #karyapaddhati .process-followup b {
            display: block;
            margin-bottom: 6px;
            color: #1d2940;
        }

        #karyapaddhati .process-compare .card {
            height: 100%;
            border-radius: 12px;
        }

        #karyapaddhati .process-compare h3 {
            color: #1d2940;
        }

        #karyapaddhati .process-compare li {
            margin-bottom: 8px;
        }

        @media (max-width: 767px) {
            #karyapaddhati .process-followup {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 575px) {

            #karyapaddhati .process-split,
            #karyapaddhati .process-compare,
            #karyapaddhati .process-followup {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 991px) {
            #karyakarini .permanent-trustees__grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            #karyakarini .exec-layout {
                grid-template-columns: 1fr;
            }

            #karyakarini .honorary {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            #karyakarini .honorary .subhead,
            #karyakarini .honorary .subnote {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 575px) {
            #karyakarini .permanent-trustees {
                padding: 20px 16px;
            }

            #karyakarini .permanent-trustees__grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 10px;
            }

            #karyakarini .permanent-trustee {
                padding: 15px 9px;
            }

            #karyakarini .sub {
                padding: 20px 16px;
            }

            #karyakarini .exec-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 10px;
            }

            #karyakarini .honorary {
                grid-template-columns: 1fr;
            }

            #karyakarini .honorary .subhead,
            #karyakarini .honorary .subnote {
                grid-column: auto;
            }
        }

        .membership-cta {
            position: relative;
            overflow: hidden;
            padding: clamp(48px, 7vw, 84px) 0;
            color: #fff;
            background: linear-gradient(120deg, #1d2940 0%, #33425d 48%, #d45d2c 100%);
        }

        .membership-cta__inner {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 36px;
            padding: clamp(28px, 5vw, 52px);
            border: 1px solid rgba(255, 255, 255, .25);
            border-radius: 24px;
            background: rgba(255, 255, 255, .08);
            box-shadow: 0 20px 55px rgba(74, 12, 12, .18);
        }

        .membership-cta__content {
            max-width: 690px;
        }

        .membership-cta__eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            color: #ffe5d7;
            font-size: .9rem;
            font-weight: 700;
            letter-spacing: .04em;
        }

        .membership-cta__title {
            margin: 0 0 12px;
            color: #fff;
            font-size: clamp(1.75rem, 3vw, 2.5rem);
            font-weight: 700;
            line-height: 1.25;
        }

        .membership-cta__description {
            max-width: 650px;
            margin: 0;
            color: rgba(255, 255, 255, .9);
            font-size: 1.05rem;
            line-height: 1.75;
        }

        .membership-cta__actions {
            display: flex;
            flex: 0 0 auto;
            flex-wrap: wrap;
            gap: 12px;
        }

        .membership-cta__button {
            display: inline-flex;
            min-height: 50px;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 12px 20px;
            border: 1px solid #fff;
            border-radius: 999px;
            font-weight: 700;
            text-decoration: none;
            transition: transform .2s ease, background-color .2s ease, color .2s ease;
        }

        .membership-cta__button:hover {
            transform: translateY(-2px);
        }

        .membership-cta__button--primary {
            color: #1d2940;
            background: #fff;
        }

        .membership-cta__button--primary:hover {
            color: #bd4e23;
            background: #fff8f4;
        }

        .membership-cta__button--secondary {
            color: #fff;
            background: transparent;
        }

        .membership-cta__button--secondary:hover {
            color: #1d2940;
            background: #fff;
        }

        @media (max-width: 767px) {
            .membership-cta__inner {
                align-items: flex-start;
                flex-direction: column;
                gap: 24px;
            }

            .membership-cta__actions {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .membership-cta__actions {
                flex-direction: column;
            }

            .membership-cta__button {
                width: 100%;
            }
        }
    </style>
    <div>
        <!-- Carousel Start -->
        <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative" data-dot="<img src='img/MBVM_Hero_First_4.jpg'>">
                    <img class="img-fluid" src="img/MBVM_Hero_First_4.jpg" alt="">
                    <div class="owl-carousel-inner">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8 homebannerhead">
                                    <h4 class="display-1 text-white animated slideInDown ">
                                        महाराष्ट्रातील मराठी बांधकाम व्यावसायिकांची राज्यस्तरीय शिखर संघटना
                                        {{-- महाराष्ट्रातील मराठी विकासकांना एकत्र आणणारे व्यासपीठ old  --}}
                                    </h4>
                                    {{-- <p class="fs-5 fw-medium text-white mb-4 pb-3">Vero elitr justo clita lorem. Ipsum dolor
                                        at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea
                                        elitr.</p> --}}
                                    <a href="#contact" class="btn btn-primary py-3 mt-3 px-5 animated slideInLeft">
                                        आपल्या भागातील संघटनेत सहभागी व्हा
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative" data-dot="<img src='img/MBVM_Hero_Second.jpg'>">
                    <img class="img-fluid" src="img/MBVM_Hero_Second.jpg" alt="">
                    <div class="owl-carousel-inner">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8 homebannerhead">
                                    <h4 class="display-1 text-white animated slideInDown">
                                        महाराष्ट्रातील मराठी विकासकांना एकत्र आणणारे व्यासपीठ
                                        {{-- मराठी सारे एकत्र येऊ… सर्वसामान्यांना घर देऊ…  --}}
                                    </h4>
                                    {{-- <p class="fs-5 fw-medium text-white mb-4 pb-3">Vero elitr justo clita lorem. Ipsum dolor
                                        at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea
                                        elitr.</p> --}}
                                    <a href="#contact" class="btn btn-primary py-3 mt-3 px-5 animated slideInLeft">आपल्या
                                        भागातील संघटनेत सहभागी व्हा</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative" data-dot="<img src='img/MBVM_Hero_Third.png'>">
                    <img class="img-fluid" src="img/MBVM_Hero_Third.png" alt="">
                    <div class="owl-carousel-inner">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8 homebannerhead">
                                    <h4 class="display-1 text-white animated slideInDown">एकत्रित बळ, एकत्रित आवाज
                                    </h4>
                                    {{-- <p class="fs-5 fw-medium text-white mb-4 pb-3">Vero elitr justo clita lorem. Ipsum dolor
                                        at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea
                                        elitr.</p> --}}
                                    <a href="#contact" class="btn btn-primary py-3 mt-3 px-5 animated slideInLeft">आपल्या
                                        भागातील संघटनेत सहभागी व्हा</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- परिचय Start -->
        @include('parichay')
        <!-- परिचय End -->

        <!-- उद्देश Start -->
        <div class="container-fluid logo-bg-dark my-5 py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 ">
                        <div class="wow fadeInUp" data-wow-delay="0.1s">
                            <h4 class="section-title">उद्देश</h4>
                            <h1 class="display-5 mb-5 mt-4">महासंघाचे उद्देश</h1>
                        </div>
                        <div class="row g-4">
                            <div class="col-12 mb-3">
                                <div class="d-flex align-items-start">
                                    <img class="flex-shrink-0" src="img/icons/icon-2.png" alt="Icon">
                                    <div class="ms-4">
                                        <h3>विश्वासाचे नाते </h3>
                                        <p class="mb-0">मराठी बांधकाम व्यावसायिक व मालमत्ता खरेदीदार यांच्यात विश्वासाचे
                                            नाते निर्माण करणे, खरेदीदारांमध्ये जागरूकता निर्माण करणे व खरेदीदरम्यानच्या
                                            समस्यांबाबत माहिती उपलब्ध करून देणे.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="d-flex align-items-start">
                                    <img class="flex-shrink-0" src="img/icons/icon-3.png" alt="Icon">
                                    <div class="ms-4">
                                        <h3>प्रभावी प्रतिनिधित्व</h3>
                                        <p class="mb-0">राज्य व केंद्र शासनाकडे धोरणात्मक निवेदने व पाठपुरावा</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="d-flex align-items-start">
                                    <img class="flex-shrink-0" src="img/icons/icon-4.png" alt="Icon">
                                    <div class="ms-4">
                                        <h3>प्रश्न संघटितरीत्या सोडवणे </h3>
                                        <p class="mb-0">शासकीय व निमशासकीय प्राधिकरणांकडे एकत्रित पाठपुरावा, कायदेशीर व
                                            आर्थिक अडचणींवर मार्गदर्शन, आणि गरज पडल्यास न्यायालयात दावे, रिट याचिका वा जनहित
                                            याचिका दाखल करणे.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="d-flex align-items-start">
                                    <img class="flex-shrink-0" src="img/icons/icon-4.png" alt="Icon">
                                    <div class="ms-4">
                                        <h3>नवीन उद्योजकांना मार्गदर्शन </h3>
                                        <p class="mb-0">अधिकाधिक मराठी तरुणांना बांधकाम व्यवसायात येण्यास प्रवृत्त करणे
                                            आणि अनुभवी मराठी व्यावसायिकांकडून नवीन उद्योजकांना मार्गदर्शन व सल्ला उपलब्ध
                                            करून देणे.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="feature-img">
                            <img class="img-fluid" src="img/IMG_7940.jpg" alt="">
                            <img class="img-fluid" src="img/IMG_7880.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- उद्देश End -->

        <!-- सदस्यत्व Start -->
        {{-- <div class="container-xxl py-5" id="sadasyatva">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h4 class="section-title">सदस्यत्व</h4>
                    <h1 class="display-5 mb-3 mt-4">सदस्यत्वाचे प्रकार</h1>
                    <p class="mb-5">नियमावलीनुसार महासंघात खालील प्रकारचे सभासद असतात. प्रत्येक प्रकारासाठी वेगळी
                        पात्रता, शुल्क व अधिकार आहेत.
                    </p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6  ">
                        <div class="service-item rounded-4 d-flex position-relative text-center h-100">
                            <div class="service-text p-4">
                                <h3 class="mb-3">संस्थात्मक सभासद</h3>

                                <p class="mb-4">
                                    मराठी बांधकाम व्यावसायिकांचे प्रतिनिधित्व करणाऱ्या
                                    जिल्हा/स्थानिक असोसिएशन.
                                </p>

                                <div class="mb-4">
                                    <span class="badge rounded-pill px-3 py-2 membership-badge">
                                        संघटना निकषानुसार
                                    </span>
                                </div>

                                <p class="vote-text vote-yes">
                                    <i class="fa-solid fa-circle me-2"></i>मतदानाचा हक्क — सदस्यसंख्येनुसार
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 ">
                        <div class="service-item d-flex position-relative text-center h-100">
                            <div class="service-text p-4 ">
                                <h3 class="mb-3">विशेष सभासद</h3>

                                <p class="mb-4">
                                    किमान २५ युनिटची इमारत भोगवटा प्रमाणपत्रासह पूर्ण
                                    केलेले मराठी व्यावसायिक.
                                </p>

                                <div class="mb-4">
                                    <span class="badge rounded-pill px-3 py-2 membership-badge">₹५,००० एकरकमी</span>
                                    <span class="badge rounded-pill px-3 py-2 membership-badge">₹६,००० वार्षिक</span>
                                </div>

                                <p class="vote-text vote-no">
                                    <i class="fa-regular fa-circle me-2"></i>मतदानाचा हक्क नाही
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 ">
                        <div class="service-item d-flex position-relative text-center h-100">
                            <div class="service-text p-4 text-start">
                                <h3 class="mb-3">हितचिंतक सभासद</h3>

                                <p class="mb-4">
                                    महासंघाला सक्रिय पाठिंबा देणारे,
                                    बांधकाम क्षेत्राशी संबंधित मराठी व्यक्ती.
                                </p>

                                <div class="mb-4">
                                    <span class="badge rounded-pill px-3 py-2 membership-badge">₹५,००० एकरकमी</span>
                                    <span class="badge rounded-pill px-3 py-2 membership-badge">₹९,००० वार्षिक</span>
                                </div>

                                <p class="vote-text vote-no">
                                    <i class="fa-regular fa-circle me-2"></i>मतदानाचा हक्क नाही
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 ">
                        <div class="service-item d-flex position-relative text-center h-100">
                            <div class="service-text p-4 text-start">
                                <h3 class="mb-3">सन्माननीय सभासद</h3>

                                <p class="mb-4">
                                    कार्यकारिणीने बहुमताने नेमलेली प्रतिष्ठित व्यक्ती.
                                    जास्तीत जास्त २ सभासद.
                                </p>

                                <div class="mb-4">
                                    <span class="badge rounded-pill px-3 py-2 membership-badge">
                                        कार्यकारिणीद्वारे नियुक्ती
                                    </span>
                                </div>

                                <p class="vote-text vote-no">
                                    <i class="fa-regular fa-circle me-2"></i>मतदानाचा हक्क नाही
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 ">
                        <div class="service-item d-flex position-relative text-center h-100">
                            <div class="service-text p-4 text-start">
                                <h3 class="mb-3">सहयोगी सभासद</h3>

                                <p class="mb-4">
                                    बांधकाम क्षेत्रातील नेटवर्किंगसाठी —
                                    फक्त महासंघाच्या मंजुरीने नियुक्ती.
                                </p>

                                <div class="mb-4">
                                    <span class="badge rounded-pill px-3 py-2 membership-badge">
                                        महासंघाच्या मंजुरीने
                                    </span>
                                </div>

                                <p class="vote-text vote-no">
                                    <i class="fa-regular fa-circle me-2"></i>मतदानाचा हक्क नाही
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 ">
                        <div class="service-item d-flex position-relative text-center h-100">
                            <div class="service-text p-4 text-start">
                                <h3 class="mb-3 text-warning">नोंद</h3>

                                <p class="mb-0 fw-semibold">
                                    सर्व सदस्यांना सभेला उपस्थित राहता येते,
                                    परंतु मतदान फक्त संस्थात्मक सभासद व
                                    पहिल्या २५ सदस्यांना.
                                    एक सदस्य — एक मत.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="executive-note ">
                    कार्यकारी मंडळाची मुदत <strong>२ वर्षे</strong> असून दर दोन वर्षांनी वार्षिक सर्वसाधारण सभेत गुप्त मतदान
                    पद्धतीने नवीन कार्यकारिणीची निवड केली जाते.
                </div>
            </div>
        </div> --}}
        <!-- सदस्यत्व End -->



        <!-- कार्यकारिणी Start -->
        <div class="container my-5 py-5" id="karyakarini">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
                    <span class="executive-eyebrow">कार्यकारिणी</span>
                    <h2 class="display-5 executive-heading">महासंघाची कार्यकारिणी</h2>
                    <p class="mb-0">महासंघाचे कायमस्वरूपी विश्वस्त, विद्यमान राज्य कार्यकारिणी आणि सन्माननीय सभासद.</p>
                </div>

                <div class="permanent-trustees">
                    <h3 class="h4 permanent-trustees__heading">कायमस्वरूपी विश्वस्त <span>/ Permanent Trustees</span></h3>
                    <p class="permanent-trustees__note">मूळ ज्ञापनावर (Memorandum of Association, नोंदणी क्र. महा/६६७/२०२२,
                        दि. १९/०७/२०२२) क्रमांक १ ते ५ वर स्वाक्षरी करणारे विश्वस्त. विश्वस्तपद विद्यमान कार्यकारिणीतील
                        बदलांपासून स्वतंत्र आहे.</p>
                    <div class="permanent-trustees__grid">
                        <div class="permanent-trustee">
                            <div class="permanent-trustee__photo">फोटो</div>
                            <b>श्री. सुरेश काशिनाथ हावरे</b>
                            <span>कायमस्वरूपी विश्वस्त</span>
                            <small>वाशी, नवी मुंबई</small>
                        </div>
                        <div class="permanent-trustee">
                            <div class="permanent-trustee__photo">फोटो</div>
                            <b>श्री. संजय रामचंद्र कुलकर्णी</b>
                            <span>कायमस्वरूपी विश्वस्त</span>
                            <small>पुणे</small>
                        </div>
                        <div class="permanent-trustee">
                            <div class="permanent-trustee__photo">फोटो</div>
                            <b>श्री. प्रकाश भिमराव बाविस्कर</b>
                            <span>कायमस्वरूपी विश्वस्त</span>
                            <small>सीबीडी बेलापूर, नवी मुंबई</small>
                        </div>
                        <div class="permanent-trustee">
                            <div class="permanent-trustee__photo">फोटो</div>
                            <b>श्री. अजित श्रीराम मराठे</b>
                            <span>कायमस्वरूपी विश्वस्त</span>
                            <small>अंधेरी, मुंबई</small>
                        </div>
                        <div class="permanent-trustee">
                            <div class="permanent-trustee__photo">फोटो</div>
                            <b>श्री. गजेंद्र दत्तात्रय पवार</b>
                            <span>कायमस्वरूपी विश्वस्त</span>
                            <small>पुणे</small>
                        </div>
                    </div>
                </div>
                <div class="exec-layout">
                    <div class="sub exec">
                        <h3 class="subhead">विद्यमान राज्य कार्यकारिणी व पदाधिकारी <span>/ Current State Executive
                                Committee &amp; Office Bearers</span></h3>
                        <p class="subnote">कार्यकाळ: <mark>[कार्यकाळ सुरुवात – समाप्ती: तारखा अद्ययावत करणे बाकी]</mark>
                            (नियमावलीनुसार २ वर्षे) · कार्यकारिणी सदस्यसंख्या ९ ते २५</p>

                        <div class="person president">
                            <div class="photo">फोटो</div>
                            <b>श्री. प्रकाश भीमराव बाविस्कर</b>
                            <span>अध्यक्ष / President</span>
                            <small>नवी मुंबई</small>
                        </div>

                        <div class="exec-grid">
                            <div class="person pending">
                                <div class="photo">फोटो</div><b>[नाव अद्ययावत करणे बाकी]</b><span>कार्याध्यक्ष / Working
                                    President</span><small>निवड / नियुक्ती बाकी</small>
                            </div>
                            <div class="person pending">
                                <div class="photo">फोटो</div><b>[नाव अद्ययावत करणे बाकी]</b><span>उपाध्यक्ष / Vice
                                    President</span><small>निवड / नियुक्ती बाकी</small>
                            </div>
                            <div class="person pending">
                                <div class="photo">फोटो</div><b>[नाव अद्ययावत करणे बाकी]</b><span>उपाध्यक्ष / Vice
                                    President</span><small>निवड / नियुक्ती बाकी</small>
                            </div>
                            <div class="person pending">
                                <div class="photo">फोटो</div><b>[नाव अद्ययावत करणे बाकी]</b><span>महासचिव / General
                                    Secretary</span><small>निवड / नियुक्ती बाकी</small>
                            </div>
                            <div class="person pending">
                                <div class="photo">फोटो</div><b>[नाव अद्ययावत करणे बाकी]</b><span>सहसचिव / Joint
                                    Secretary</span><small>निवड / नियुक्ती बाकी</small>
                            </div>
                            <div class="person pending">
                                <div class="photo">फोटो</div><b>[नाव अद्ययावत करणे बाकी]</b><span>सहसचिव / Joint
                                    Secretary</span><small>निवड / नियुक्ती बाकी</small>
                            </div>
                            <div class="person pending">
                                <div class="photo">फोटो</div><b>[नाव अद्ययावत करणे बाकी]</b><span>खजिनदार /
                                    Treasurer</span><small>निवड / नियुक्ती बाकी</small>
                            </div>
                            <div class="person pending">
                                <div class="photo">फोटो</div><b>[नाव अद्ययावत करणे बाकी]</b><span>सहखजिनदार / Joint
                                    Treasurer</span><small>निवड / नियुक्ती बाकी</small>
                            </div>
                            <div class="person pending">
                                <div class="photo">फोटो</div><b>[नाव अद्ययावत करणे बाकी]</b><span>कार्यकारिणी सदस्य / EC
                                    Member</span><small>निवड / नियुक्ती बाकी</small>
                            </div>
                        </div>

                        <p class="exec-sample">सध्या केवळ अध्यक्षपदाची निवड झाली आहे; उर्वरित पदांवरील नावे
                            निवड/नियुक्तीनंतर प्रशासन पॅनेलमधून अद्ययावत करावीत.</p>
                    </div>

                    <aside class="sub honorary">
                        <h3 class="subhead">सन्माननीय सभासद <span>/ Honorary Members</span></h3>
                        <p class="subnote">कार्यकारिणीद्वारे नियुक्त.</p>
                        <div class="person">
                            <div class="photo">फोटो</div>
                            <b>श्री. प्रविण दरेकर</b>
                            <span>सन्माननीय सभासद</span>
                            <small>आमदार, विधानपरिषद · अध्यक्ष, मुंबई बँक</small>
                        </div>
                        <div class="person">
                            <div class="photo">फोटो</div>
                            <b>श्री. गजानन कीर्तिकर</b>
                            <span>सन्माननीय सभासद</span>
                        </div>
                        <div class="person">
                            <div class="photo">फोटो</div>
                            <b>श्री. सतीश मगर</b>
                            <span>सन्माननीय सभासद</span>
                        </div>
                        <div class="person pending">
                            <div class="photo">फोटो</div>
                            <b>[नियुक्ती बाकी]</b>
                            <span>सन्माननीय सभासद</span>
                        </div>
                        <div class="person pending">
                            <div class="photo">फोटो</div>
                            <b>[नियुक्ती बाकी]</b>
                            <span>सन्माननीय सभासद</span>
                        </div>
                    </aside>
                </div>
            </div>

            <div class="text-center mt-4">
                <a class="btn btn-primary d-inline-flex flex-column align-items-center" href="{{ route('pratinidhi') }}">
                    <span>संलग्न संस्था व अधिकृत प्रतिनिधी पहा</span>
                    <small class="fw-normal">View Affiliated Associations &amp; Authorized Representatives</small>
                </a>
            </div>




        </div>
        <!-- कार्यकारिणी End -->




        <!-- कार्यपद्धती Start -->
        <section class="ccontainer-fluid logo-bg-dark my-5 py-5" id="karyapaddhati">
            <div class="container">
                <div class="text-center mx-auto mb-5">
                    <h4 class="section-title">कार्यपद्धती</h4>
                    <h2 class="display-5 mb-3">अशी होते संघटना — स्थानिक विकासक ते शिखर संघटना</h2>
                    <p class="text-muted fs-5 mb-0">
                        एकाच भागातील मराठी विकासक एकत्र येतात, “मराठी बांधकाम व्यावसायिक संघटना,
                        [जिल्हा / शहर / तालुका]” या नावाने स्थानिक संघटना स्थापन करतात आणि ती महासंघाशी संलग्न होते.
                    </p>
                </div>

                <div class="process-chain">
                    <div class="process-step process-step--main">
                        <span class="process-number">१</span>
                        <span>इच्छुक विकासकांची नोंदणी</span>
                    </div>
                    <div class="process-arrow" aria-hidden="true">↓</div>
                    <div class="process-step">
                        <span class="process-number">२</span>
                        <span>१० / १५ / २५ / ५० / १०० स्थानिक विकासक</span>
                    </div>
                    <div class="process-arrow" aria-hidden="true">↓</div>
                    <div class="process-step">
                        <span class="process-number">३</span>
                        <span>स्थानिक संघटनेची स्थापना</span>
                    </div>
                    <div class="process-arrow" aria-hidden="true">↓</div>
                    <div class="process-step">
                        <span class="process-number">४</span>
                        <span>कार्यकारिणी + नोंदणी + घटना</span>
                    </div>
                    <div class="process-arrow" aria-hidden="true">↓</div>
                    <div class="process-step process-step--main">
                        <span class="process-number">५</span>
                        <span>MBVM सोबत MoU / संलग्नता</span>
                    </div>
                    <div class="process-arrow" aria-hidden="true">↓</div>
                    <div class="process-split">
                        <div class="process-step">
                            <small>स्थानिक प्रश्न</small>
                            → स्थानिक संघटना
                        </div>
                        <div class="process-step">
                            <small>राज्य / केंद्र प्रश्न</small>
                            → MBVM शिखर संघटना
                        </div>
                    </div>
                </div>

                <div class="mt-5 pt-3">
                    <div class="text-center mx-auto mb-4" style="max-width: 760px">
                        <h2 class="display-6 mb-3">पुरेसे सदस्य नोंदल्यानंतर काय होते?</h2>
                        <p class="text-muted fs-5 mb-0">
                            प्रथम बैठकीत महासंघाचे पदाधिकारी सहभागी होऊन संघटना स्थापनेसाठी मार्गदर्शन करतात.
                        </p>
                    </div>

                    <div class="process-followup">
                        <div><b>इच्छुक विकासकांची ऑनलाइन नोंदणी</b><span>या वेबसाइटवरील नोंदणी फॉर्मद्वारे</span></div>
                        <div><b>एकाच परिसरातील विकासकांची संख्या पूर्ण</b><span>जिल्हा / तालुका / शहरनिहाय गणना</span></div>
                        <div><b>MBVM कडून संपर्क</b><span>नोंदणी केलेल्या सर्वांशी फोन / WhatsApp</span></div>
                        <div><b>त्या भागात प्रथम बैठक</b><span>महासंघ पदाधिकाऱ्यांच्या उपस्थितीत</span></div>
                        <div><b>स्थानिक कमिटीची स्थापना</b><span>अध्यक्ष, सचिव, खजिनदार व सदस्य</span></div>
                        <div><b>स्थानिक संघटनेची नोंदणी</b><span>संस्था नोंदणी अधिनियम १८६० अन्वये</span></div>
                        <div><b>घटना / आवश्यक कागदपत्रे</b><span>महासंघाची मानक घटना स्वीकारणे</span></div>
                        <div><b>MBVM सोबत MoU</b><span>मसुदा MoU दस्तऐवज विभागात उपलब्ध</span></div>
                        <div><b>महासंघाशी संलग्नता</b><span>संलग्न संघटनांच्या यादीत समावेश</span></div>
                    </div>
                </div>

                <div class="mt-5 pt-3">
                    <h2 class="display-6 text-center mb-4">कोण काय करते?</h2>
                    <div class="process-compare">
                        <div class="card shadow-sm">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">🏘️ स्थानिक संघटना</h3>
                                <ul class="mb-0">
                                    <li>स्थानिक नियोजन प्राधिकरण</li>
                                    <li>महानगरपालिका / नगरपरिषद / ग्रामपंचायत</li>
                                    <li>जिल्हा / तालुका कार्यालये</li>
                                    <li>स्थानिक पायाभूत सुविधा</li>
                                    <li>स्थानिक विकास समस्या</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card shadow-sm border-primary">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">🏛️ MBVM — शिखर संघटना</h3>
                                <ul class="mb-0">
                                    <li>राज्य शासनातील प्रश्न</li>
                                    <li>केंद्र शासनातील प्रश्न</li>
                                    <li>संपूर्ण उद्योगाला भेडसावणारे प्रश्न</li>
                                    <li>अनेक जिल्ह्यांना सामाईक प्रश्न</li>
                                    <li>धोरण व नियामक निवेदने</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{-- <p class="text-muted text-center fs-5 mt-4 mb-0 ">
                        संलग्न संघटनांना शासनस्तरावर महासंघ मार्गदर्शन व पाठबळ देतो.
                    </p> --}}
                    <div class="alert alert-light text-center border-start border-4 border-primary fs-5  mt-4 mb-0"
                        role="note">
                        संलग्न संघटनांना शासनस्तरावर महासंघ मार्गदर्शन व पाठबळ देतो.
                    </div>
                </div>
            </div>
        </section>
        <!-- कार्यपद्धती End -->

        <!-- 5. CTA -->
        <section class="membership-cta" aria-labelledby="membership-cta-title">
            <div class="container">
                <div class="membership-cta__inner">
                    <div class="membership-cta__content">
                        <span class="membership-cta__eyebrow">
                            <i class="fas fa-users" aria-hidden="true"></i>
                            महासंघाचे सदस्यत्व
                        </span>
                        <h2 class="membership-cta__title" id="membership-cta-title">आपल्या परिसरातील विकासकांना एकत्र आणा
                        </h2>
                        <p class="membership-cta__description">
                            नोंदणी विनामूल्य आहे. आपल्या परिसरातील विकासकांची संख्या पूर्ण झाल्यावर महासंघ आपल्याशी संपर्क
                            साधून प्रथम बैठकीचे आयोजन करेल.
                        </p>
                    </div>
                    <div class="membership-cta__actions">
                        <a class="membership-cta__button membership-cta__button--primary"
                            href="{{ route('members.create') }}">
                            <i class="fas fa-user-plus" aria-hidden="true"></i>
                            सदस्यत्वासाठी नोंदणी
                        </a>
                        <a class="membership-cta__button membership-cta__button--secondary"
                            href="{{ route('documents.index') }}">
                            <i class="fas fa-file-alt" aria-hidden="true"></i>
                            MoU व घटना पाहा
                        </a>
                    </div>
                </div>
            </div>
        </section>

        @include('partials._local_organizations')



        @include('partials._karya', ['karyaUpdates' => $karyaUpdates])

        @include('partials._sandhi')

        <!-- सेवा Start -->
        <div class="container-fluid logo-bg-dark my-5 py-5" id="seva">
            <div class="container pt-5">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h4 class="section-title">सेवा</h4>
                    <h1 class="display-5 mb-3 mt-4">सदस्य सेवा व शासन समन्वय</h1>
                    <p class="mb-5">महासंघ राज्यभरातील असोसिएशनकडून येणाऱ्या प्रश्नांचे वर्गीकरण करून शासन व संबंधित
                        विभागांकडे एकत्रित पाठपुरावा करतो, तसेच सदस्यांना मार्गदर्शन उपलब्ध करून देतो.

                    </p>
                </div>
                <div class="row g-4 mt-3">

                    <!-- शासन समन्वय -->
                    <div class="col-lg-4 col-md-6">
                        <div class="fact-item text-center bg-light h-100 p-5 pt-0">

                            <div class="fact-icon">
                                <i class="fa-solid fa-building-columns"></i>
                            </div>

                            <h3 class="mb-3">शासन समन्वय</h3>

                            <ul class="list-unstyled feature-list">
                                <li><i class="fa-regular fa-circle-dot me-2"></i> शासनाकडे निवेदन व धोरणात्मक सूचना</li>
                                <li><i class="fa-regular fa-circle-dot me-2"></i> उद्योगांचे एकत्रित प्रतिनिधित्व</li>
                                <li><i class="fa-regular fa-circle-dot me-2"></i> सामाजिक प्रश्नांवर राज्यस्तरीय पाठपुरावा
                                </li>
                                <li><i class="fa-regular fa-circle-dot me-2"></i> शासन निर्णयांचे विश्लेषण</li>
                            </ul>

                        </div>
                    </div>

                    <!-- कायदेशीर मार्गदर्शन -->
                    <div class="col-lg-4 col-md-6  ">
                        <div class="fact-item text-center bg-light h-100 p-5 pt-0">

                            <div class="fact-icon">
                                <i class="fa-solid fa-scale-balanced"></i>
                            </div>

                            <h3 class="mb-3">कायदेशीर मार्गदर्शन</h3>

                            <ul class="list-unstyled feature-list">
                                <li><i class="fa-regular fa-circle-dot me-2"></i> RERA मार्गदर्शन</li>
                                <li><i class="fa-regular fa-circle-dot me-2"></i> UDCPR अध्ययावत माहिती</li>
                                <li><i class="fa-regular fa-circle-dot me-2"></i> MRTP विषयक माहिती</li>
                                <li><i class="fa-regular fa-circle-dot me-2"></i> Development Permissions</li>
                            </ul>

                        </div>
                    </div>

                    <!-- माहिती व नेटवर्किंग -->
                    <div class="col-lg-4 col-md-6  ">
                        <div class="fact-item text-center bg-light h-100 p-5 pt-0">

                            <div class="fact-icon">
                                <i class="fa-solid fa-globe"></i>
                            </div>

                            <h3 class="mb-3">माहिती व नेटवर्किंग</h3>

                            <ul class="list-unstyled feature-list">
                                <li><i class="fa-regular fa-circle-dot me-2"></i> शासन निर्णय (GR) लायब्ररी</li>
                                <li><i class="fa-regular fa-circle-dot me-2"></i> पर्यावरण विषयक मार्गदर्शन</li>
                                <li><i class="fa-regular fa-circle-dot me-2"></i> प्रशिक्षण व कार्यशाळा</li>
                                <li><i class="fa-regular fa-circle-dot me-2"></i> व्यवसाय नेटवर्किंग</li>
                            </ul>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- सेवा End -->

        <!-- Appointment Start -->
        @include('contact')
        <!-- Appointment End -->

        <!-- संपर्क Start -->
        <div class="container-fluid logo-bg-dark my-5 py-5" id="sampark">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h4 class="section-title">संपर्क</h4>
                    <h1 class="display-5 mb-3 mt-4">आमची कार्यालये</h1>

                </div>
                <div class="row g-4">

                    <!-- Registered Office -->
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-lg h-100 " style="border-radius: 18px;">

                            <div class="card-header bg-primary text-white text-center py-4 rounded-top-4 border-0"
                                style="border-radius: 18px;">
                                <i class="fa-solid fa-building fa-2x mb-3"></i>
                                <h3 class="mb-1 text-white">नोंदणीकृत कार्यालय</h3>
                                <small><i class="fa-solid fa-location-dot me-1"></i> वाशी, नवी मुंबई</small>
                            </div>

                            <div class="card-body p-4">

                                <div class="d-flex align-items-start">
                                    <div class="me-3">
                                        <i class="fa-solid fa-map-location-dot text-primary fs-2"></i>
                                    </div>

                                    <div>
                                        <h5 class="fw-bold mb-3">पत्ता</h5>

                                        <p class="text-muted mb-4">
                                            १७०२, हावरे इन्फोटेक पार्क,
                                            प्लॉट क्र. ३९–०३,
                                            फोर पॉईंट हॉटेलसमोर,
                                            सेक्टर–३०ए, वाशी,
                                            नवी मुंबई – ४०० ७०५.
                                        </p>

                                        <a href="https://maps.app.goo.gl/9s1qmKS3w3kvSVYCA"
                                            class="btn btn-outline-primary rounded-pill" target="_blank">
                                            <i class="fa-solid fa-location-arrow me-2"></i>
                                            नकाशावर पहा
                                        </a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <!-- Pune Office -->
                    <div class="col-lg-6 ">
                        <div class="card border-0 shadow-lg h-100 " style="border-radius: 18px;">

                            <div class="card-header bg-primary text-white text-center py-4 rounded-top-4 border-0"
                                style="border-radius: 18px;">
                                <i class="fa-solid fa-briefcase fa-2x mb-3"></i>
                                <h3 class="mb-1 text-white">कार्यालय</h3>
                                <small><i class="fa-solid fa-location-dot me-1"></i> पुणे</small>
                            </div>

                            <div class="card-body p-4">

                                <div class="d-flex align-items-start">
                                    <div class="me-3">
                                        <i class="fa-solid fa-map-location-dot text-primary fs-2"></i>
                                    </div>

                                    <div>
                                        <h5 class="fw-bold mb-3">पत्ता</h5>

                                        <p class="text-muted mb-4">
                                            ऑफिस क्र. २०१, २रा मजला,
                                            प्रो–वन बिझनेस सेंटर,
                                            रत्ना हॉस्पिटलसमोर,
                                            सेनापती बापट रोड,
                                            पुणे – ४११ ०१६.
                                        </p>

                                        <a href="https://maps.app.goo.gl/fSTqoMu316xnjyah9"
                                            class="btn btn-outline-primary rounded-pill" target="_blank">
                                            <i class="fa-solid fa-location-arrow me-2"></i>
                                            नकाशावर पहा
                                        </a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
        <!-- संपर्क End -->

        <!-- Testimonial Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h4 class="section-title">अभिप्राय</h4>
                    <h1 class="display-5 mb-3 mt-4"> आमच्याबद्दलच्या प्रतिक्रिया</h1>
                </div>
                <div class="owl-carousel testimonial-carousel ">
                    <div class="testimonial-item text-center"
                        data-dot="<img class='img-fluid' src='https://placehold.co/500x500?text=No+Image' alt=''>">
                        <p class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed
                            sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum
                            justo sea clita.</p>
                        <h3>भालचंद्र गायकवाड </h3>
                        <span class="text-primary">व्यवसाय</span>
                    </div>
                    <div class="testimonial-item text-center"
                        data-dot="<img class='img-fluid' src='https://placehold.co/500x500?text=No+Image' alt=''>">
                        <p class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed
                            sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum
                            justo sea clita.</p>
                        <h3>नेहा चौहान</h3>
                        <span class="text-primary">व्यवसाय</span>
                    </div>
                    <div class="testimonial-item text-center"
                        data-dot="<img class='img-fluid' src='https://placehold.co/500x500?text=No+Image' alt=''>">
                        <p class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed
                            sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum
                            justo sea clita.</p>
                        <h3>राहुल पाटील</h3>
                        <span class="text-primary">व्यवसाय</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->



        {{-- सदस्यत्व नोंदणी --}}
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-2 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h4 class="section-title">सदस्यत्व नोंदणी</h4>
                    <p class="footcolor">जवळच्या नियोजित संघटनेचे सदस्य होण्यासाठी आजच फॉर्म भरा!</p>
                </div>
                <div class="text-center">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=140x140&data={{ urlencode(route('members.create')) }}"
                        alt="Scan to add member" class="mb-3 bg-white p-2 rounded" width="140" height="140">

                    {{-- <div>
                        <a href="{{ route('members.create') }}" class="btn btn-primary px-4">
                            <i class="fa fa-user-plus me-2"></i>Add Member
                        </a>
                    </div> --}}

                </div>
            </div>
        </div>

    </div>
@endsection
