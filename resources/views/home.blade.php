@extends('layouts.master')

@section('content')
    <style>
        .fact-icon {
            width: 90px;
            height: 90px;
            margin: 0 auto 25px;
            border-radius: 50%;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 20px rgba(184, 182, 182, 0.08);
        }

        .fact-icon i {
            font-size: 42px;
            color: #d35400;
        }

        .fact-icon {
            width: 90px;
            height: 90px;
            margin: 0 auto 25px;
            border-radius: 50%;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
        }

        .fact-icon i {
            font-size: 40px;
            color: #d35400;
        }

        .feature-list li {
            margin-bottom: 15px;
            font-size: 17px;
            color: #555;
            display: flex;
            align-items: center;
        }

        .feature-list li i {
            color: #d35400;
            font-size: 12px;
            min-width: 20px;
        }

        .service-item {
            border: 1px solid rgba(255, 255, 255, .12);
            border-radius: 20px;
            transition: .3s;
        }

        .service-item:hover {
            transform: translateY(-6px);
        }

        .membership-badge {
            background: #5d5144;
            color: #dfb269;
            border: 1px solid #a07b47;
            margin-right: 8px;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
        }

        .vote-yes {
            color: #5bad7e;
            font-weight: 600;
            margin-bottom: 0;
        }

        .vote-no {
            color: #d18975;
            font-weight: 600;
            margin-bottom: 0;
        }

        .vote-text i {
            font-size: 10px;
        }

        .service-text h3 {
            font-weight: 700;
        }

        .service-text p {
            line-height: 1.8;
        }

        .executive-note {
            background: #F8F8F8;
            border-left: 4px solid #d39b54;
            padding: 18px 24px;
            font-size: 17px;
            line-height: 1.8;
            border-radius: 0 10px 10px 0;
            margin-top: 2rem;
        }

        .executive-note strong {
            color: #000000;
            font-weight: 700;
        }
    </style>
    <div>
        <!-- Carousel Start -->
        <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative" data-dot="<img src='img/carousel-1.jpg'>">
                    <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                    <div class="owl-carousel-inner">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-1 text-white animated slideInDown">महाराष्ट्रातील मराठी विकासकांना
                                        एकत्र आणणारे व्यासपीठ</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-3">Vero elitr justo clita lorem. Ipsum dolor
                                        at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea
                                        elitr.</p>
                                    <a href="" class="btn btn-primary py-3 px-5 animated slideInLeft">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative" data-dot="<img src='img/carousel-2.jpg'>">
                    <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                    <div class="owl-carousel-inner">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-1 text-white animated slideInDown">मराठी सारे एकत्र येऊ…
                                        सर्वसामान्यांना घर देऊ…</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-3">Vero elitr justo clita lorem. Ipsum dolor
                                        at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea
                                        elitr.</p>
                                    <a href="" class="btn btn-primary py-3 px-5 animated slideInLeft">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative" data-dot="<img src='img/carousel-3.jpg'>">
                    <img class="img-fluid" src="img/carousel-3.jpg" alt="">
                    <div class="owl-carousel-inner">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-1 text-white animated slideInDown">एकत्रित बळ, एकत्रित आवाज
                                    </h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-3">Vero elitr justo clita lorem. Ipsum dolor
                                        at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea
                                        elitr.</p>
                                    <a href="" class="btn btn-primary py-3 px-5 animated slideInLeft">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- परिचय Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img">
                            <img class="img-fluid" src="img/about-1.jpg" alt="">
                            <img class="img-fluid" src="img/about-2.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h4 class="section-title">परिचय</h4>
                        <h1 class="display-5 mb-4">महासंघाबद्दल</h1>
                        <p>मराठी बांधकाम व्यावसायिक महासंघ ही महाराष्ट्रातील मराठी विकासक व बांधकाम क्षेत्राशी संबंधित सर्व
                            घटकांची राज्यस्तरीय शिखर संघटना आहे. प्रत्येक जिल्ह्यात असोसिएशन स्थापन करून सर्व विकासकांना
                            एकत्रित व्यासपीठ देणे आणि शासन व उद्योग यांच्यात प्रभावी समन्वय निर्माण करणे हे महासंघाचे ध्येय
                            आहे.</p>
                        <div class="d-flex align-items-center mb-5">
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center border border-5 border-primary"
                                style="width: 120px; height: 120px;">
                                <h1 class="display-1 mb-n2" data-toggle="counter-up">25</h1>
                            </div>
                            <div class="ps-4">
                                <h3>Years</h3>
                                <h3>Working</h3>
                                <h3 class="mb-0">Experience</h3>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- परिचय End -->

        <!-- उद्देश Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h4 class="section-title">उद्देश</h4>
                        <h1 class="display-5 mb-4">महासंघाचे उद्देश</h1>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam
                            et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat
                            amet</p>
                        <div class="row g-4">
                            <div class="col-12">
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
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <img class="flex-shrink-0" src="img/icons/icon-3.png" alt="Icon">
                                    <div class="ms-4">
                                        <h3>प्रोत्साहन देणे</h3>
                                        <p class="mb-0">सर्वसामान्यांना परवडणारी घरे उपलब्ध करून देण्यासाठी प्रयत्न करणे
                                            आणि परवडणारी घरे बांधणाऱ्या मराठी व्यावसायिकांना प्रोत्साहन देणे.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
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
                            <div class="col-12">
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
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="feature-img">
                            <img class="img-fluid" src="img/about-2.jpg" alt="">
                            <img class="img-fluid" src="img/about-1.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- उद्देश End -->

        <!-- सदस्यत्व Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h4 class="section-title">सदस्यत्व</h4>
                    <h1 class="display-5 mb-4">सदस्यत्वाचे प्रकार</h1>
                    <p class="mb-5">नियमावलीनुसार महासंघात खालील प्रकारचे सभासद असतात. प्रत्येक प्रकारासाठी वेगळी
                        पात्रता, शुल्क व अधिकार आहेत.
                    </p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item d-flex position-relative text-center h-100">
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
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
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
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
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
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
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
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
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
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
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
                <div class="executive-note wow fadeInUp" data-wow-delay="0.1s">
                    कार्यकारी मंडळाची मुदत <strong>२ वर्षे</strong> असून दर दोन वर्षांनी वार्षिक सर्वसाधारण सभेत गुप्त मतदान
                    पद्धतीने नवीन कार्यकारिणीची निवड केली जाते.
                </div>
            </div>
        </div>
        <!-- सदस्यत्व End -->


        <!-- सेवा Start -->
        <div class="container-xxl py-5">
            <div class="container pt-5">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h4 class="section-title">सेवा</h4>
                    <h1 class="display-5 mb-3">सदस्य सेवा व शासन समन्वय</h1>
                    <p class="mb-5">महासंघ राज्यभरातील असोसिएशनकडून येणाऱ्या प्रश्नांचे वर्गीकरण करून शासन व संबंधित
                        विभागांकडे एकत्रित पाठपुरावा करतो, तसेच सदस्यांना मार्गदर्शन उपलब्ध करून देतो.

                    </p>
                </div>
                <div class="row g-4 mt-3">

                    <!-- शासन समन्वय -->
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
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
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
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
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
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




        <!-- Project Start -->
        <div class="container-xxl project py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h4 class="section-title">Our Projects</h4>
                    <h1 class="display-5 mb-4">Visit Our Latest Projects And Our Innovative Works</h1>
                </div>
                <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="col-lg-4">
                        <div class="nav nav-pills d-flex justify-content-between w-100 h-100 me-4">
                            <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4 active"
                                data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                                <h3 class="m-0">01. Modern Complex</h3>
                            </button>
                            <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4"
                                data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                                <h3 class="m-0">02. Royal Hotel</h3>
                            </button>
                            <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4"
                                data-bs-toggle="pill" data-bs-target="#tab-pane-3" type="button">
                                <h3 class="m-0">03. Mexwel Buiding</h3>
                            </button>
                            <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-0"
                                data-bs-toggle="pill" data-bs-target="#tab-pane-4" type="button">
                                <h3 class="m-0">04. Shopping Complex</h3>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="tab-content w-100">
                            <div class="tab-pane fade show active" id="tab-pane-1">
                                <div class="row g-4">
                                    <div class="col-md-6" style="min-height: 350px;">
                                        <div class="position-relative h-100">
                                            <img class="position-absolute img-fluid w-100 h-100" src="img/project-1.jpg"
                                                style="object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 class="mb-3">25 Years Of Experience In Architecture Industry</h1>
                                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit.
                                            Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem
                                            sit clita duo justo magna dolore erat amet</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Design Approach</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Innovative Solutions</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Project Management</p>
                                        <a href="" class="btn btn-primary py-3 px-5 mt-3">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-pane-2">
                                <div class="row g-4">
                                    <div class="col-md-6" style="min-height: 350px;">
                                        <div class="position-relative h-100">
                                            <img class="position-absolute img-fluid w-100 h-100" src="img/project-2.jpg"
                                                style="object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 class="mb-3">25 Years Of Experience In Architecture Industry</h1>
                                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit.
                                            Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem
                                            sit clita duo justo magna dolore erat amet</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Design Approach</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Innovative Solutions</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Project Management</p>
                                        <a href="" class="btn btn-primary py-3 px-5 mt-3">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-pane-3">
                                <div class="row g-4">
                                    <div class="col-md-6" style="min-height: 350px;">
                                        <div class="position-relative h-100">
                                            <img class="position-absolute img-fluid w-100 h-100" src="img/project-3.jpg"
                                                style="object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 class="mb-3">25 Years Of Experience In Architecture Industry</h1>
                                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit.
                                            Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem
                                            sit clita duo justo magna dolore erat amet</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Design Approach</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Innovative Solutions</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Project Management</p>
                                        <a href="" class="btn btn-primary py-3 px-5 mt-3">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-pane-4">
                                <div class="row g-4">
                                    <div class="col-md-6" style="min-height: 350px;">
                                        <div class="position-relative h-100">
                                            <img class="position-absolute img-fluid w-100 h-100" src="img/project-4.jpg"
                                                style="object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 class="mb-3">25 Years Of Experience In Architecture Industry</h1>
                                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit.
                                            Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem
                                            sit clita duo justo magna dolore erat amet</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Design Approach</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Innovative Solutions</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Project Management</p>
                                        <a href="" class="btn btn-primary py-3 px-5 mt-3">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Project End -->


        <!-- Team Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h4 class="section-title">Team Members</h4>
                    <h1 class="display-5 mb-4">We Are Creative Architecture Team For Your Dream Home</h1>
                </div>
                <div class="row g-0 team-items">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item position-relative">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/team-1.jpg" alt="">
                                <div class="team-social text-center">
                                    <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="bg-light text-center p-4">
                                <h3 class="mt-2">Architect Name</h3>
                                <span class="text-primary">Designation</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item position-relative">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/team-2.jpg" alt="">
                                <div class="team-social text-center">
                                    <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="bg-light text-center p-4">
                                <h3 class="mt-2">Architect Name</h3>
                                <span class="text-primary">Designation</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item position-relative">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/team-3.jpg" alt="">
                                <div class="team-social text-center">
                                    <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="bg-light text-center p-4">
                                <h3 class="mt-2">Architect Name</h3>
                                <span class="text-primary">Designation</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item position-relative">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="team-social text-center">
                                    <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="bg-light text-center p-4">
                                <h3 class="mt-2">Architect Name</h3>
                                <span class="text-primary">Designation</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->


        <!-- Appointment Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h4 class="section-title">सदस्य नोंदणी</h4>
                        <h1 class="display-5 mb-4">आजच महासंघाशी जोडा</h1>
                        <p class="mb-4">खालील माहिती भरा. नोंदणीनंतर महासंघाकडून तुमच्याशी संपर्क साधला जाईल आणि तुमच्या
                            जिल्ह्यातील स्थापना प्रक्रियेची माहिती दिली जाईल.</p>
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="d-flex">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-light"
                                        style="width: 65px; height: 65px;">
                                        <i class="fa fa-2x fa-phone-alt text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="mb-2">Call Us Now</p>
                                        <h3 class="mb-0">+012 345 6789</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-light"
                                        style="width: 65px; height: 65px;">
                                        <i class="fa fa-2x fa-envelope-open text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="mb-2">Mail Us Now</p>
                                        <h3 class="mb-0">info@example.com</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control" placeholder="पूर्ण नाव"
                                    style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control" placeholder="तुमचा ई-मेल"
                                    style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control" placeholder="तुमचा मोबाइल"
                                    style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <select class="form-select" style="height: 55px;">
                                    <option selected>जिल्हा</option>
                                    <option value="1">जिल्हा 1</option>
                                    <option value="2">जिल्हा 2</option>
                                    <option value="3">जिल्हा 3</option>
                                </select>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="field">
                                    <select class="form-select" style="height: 55px;">
                                        <option value="">— निवडा सदस्यत्व प्रकार —</option>
                                        <option>संस्थात्मक सभासद (असोसिएशन)</option>
                                        <option>विशेष सभासद</option>
                                        <option>हितचिंतक सभासद</option>
                                        <option>सह्योगी सभासद</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="field">
                                    <select class="form-select" style="height: 55px;">
                                        <option value="">— निवडा व्यवसाय / भूमिका —</option>
                                        <option>विकासक / बिल्डर</option>
                                        <option>लँड डेव्हलपर</option>
                                        <option>अभियंता</option>
                                        <option>वास्तुविशारद</option>
                                        <option>कंत्राटदार</option>
                                        <option>पुरवठादार</option>
                                        <option>इतर</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <textarea class="form-control" rows="5"
                                    placeholder="संदेश (ऐच्छिक) - तुमच्या जिल्ह्यातील असोसिएशनबद्दल किंवा इतर माहिती"></textarea>
                            </div>

                            <div class="form-foot">
                                <p class="privacy-mini">नोंदणीतील वैयक्तिक माहिती फक्त महासंघाच्या कामकाजासाठी वापरली जाईल
                                    व संमतीशिवाय
                                    सार्वजनिक केली जाणार नाही.</p>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">नोंदणी पाठवा →</button>
                                </div>
                            </div>
                            <div class="ok-msg" id="okMsg">✓ तुमची नोंदणी नोंदवली गेली आहे. महासंघाकडून लवकरच
                                तुमच्याशी संपर्क साधला जाईल.
                                <em style="color:#8fbfa3">(हा नमुना फॉर्म आहे — प्रत्यक्ष नोंदणीसाठी बॅकएंड जोडावे
                                    लागेल.)</em>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Appointment End -->


        <!-- Testimonial Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h4 class="section-title">Testimonial</h4>
                    <h1 class="display-5 mb-4">Thousands Of Customers Who Trust Us And Our Services</h1>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item text-center"
                        data-dot="<img class='img-fluid' src='img/testimonial-1.jpg' alt=''>">
                        <p class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed
                            sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum
                            justo sea clita.</p>
                        <h3>Client Name</h3>
                        <span class="text-primary">Profession</span>
                    </div>
                    <div class="testimonial-item text-center"
                        data-dot="<img class='img-fluid' src='img/testimonial-2.jpg' alt=''>">
                        <p class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed
                            sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum
                            justo sea clita.</p>
                        <h3>Client Name</h3>
                        <span class="text-primary">Profession</span>
                    </div>
                    <div class="testimonial-item text-center"
                        data-dot="<img class='img-fluid' src='img/testimonial-3.jpg' alt=''>">
                        <p class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed
                            sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum
                            justo sea clita.</p>
                        <h3>Client Name</h3>
                        <span class="text-primary">Profession</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
    </div>
@endsection
