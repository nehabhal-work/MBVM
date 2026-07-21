@extends('layouts.master')

@section('content')
    <div>
        <!-- Carousel Start -->
        <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative" data-dot="<img src='img/carousel-1.jpg'>">
                    <img class="img-fluid" src="img/IMG_7893.jpg" alt="" height="600px">
                    <div class="owl-carousel-inner">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8 homebannerhead">
                                    <h4 class="display-1 text-white animated slideInDown ">महाराष्ट्रातील मराठी विकासकांना
                                        एकत्र आणणारे व्यासपीठ </h4>
                                    {{-- <p class="fs-5 fw-medium text-white mb-4 pb-3">Vero elitr justo clita lorem. Ipsum dolor
                                        at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea
                                        elitr.</p>--}}
                                    <a href="" class="btn btn-primary py-3 mt-3 px-5 animated slideInLeft">सदस्य व्हा</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative" data-dot="<img src='img/carousel-2.jpg'>">
                    <img class="img-fluid" src="img/IMG_7741.jpg" alt="" height="600px">
                    <div class="owl-carousel-inner">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8 homebannerhead">
                                    <h4 class="display-1 text-white animated slideInDown">मराठी सारे एकत्र येऊ…
                                        सर्वसामान्यांना घर देऊ…  </h4>
                                    {{-- <p class="fs-5 fw-medium text-white mb-4 pb-3">Vero elitr justo clita lorem. Ipsum dolor
                                        at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea
                                        elitr.</p> --}}
                                    <a href="" class="btn btn-primary py-3 mt-3 px-5 animated slideInLeft">सदस्य व्हा</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative" data-dot="<img src='img/carousel-3.jpg'>">
                    <img class="img-fluid" src="img/IMG_7932.jpg" alt="" height="600px">
                    <div class="owl-carousel-inner">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8 homebannerhead">
                                    <h4 class="display-1 text-white animated slideInDown">एकत्रित बळ, एकत्रित आवाज
                                    </h4>
                                    {{-- <p class="fs-5 fw-medium text-white mb-4 pb-3">Vero elitr justo clita lorem. Ipsum dolor
                                        at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea
                                        elitr.</p> --}}
                                    <a href="" class="btn btn-primary py-3 mt-3 px-5 animated slideInLeft">सदस्य व्हा</a>
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
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h4 class="section-title">उद्देश</h4>
                        <h1 class="display-5 mb-4">महासंघाचे उद्देश</h1>

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
                            <img class="img-fluid" src="img/IMG_7940.jpg" alt="">
                            <img class="img-fluid" src="img/IMG_7880.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- उद्देश End -->

        <!-- सदस्यत्व Start -->
        <div class="container-xxl py-5" id="sadasyatva">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h4 class="section-title">सदस्यत्व</h4>
                    <h1 class="display-5 mb-4">सदस्यत्वाचे प्रकार</h1>
                    <p class="mb-5">नियमावलीनुसार महासंघात खालील प्रकारचे सभासद असतात. प्रत्येक प्रकारासाठी वेगळी
                        पात्रता, शुल्क व अधिकार आहेत.
                    </p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6  wow fadeInUp" data-wow-delay="0.1s">
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




        <!-- जिल्हा असोसिएशन Start -->

        <div class="container-fluid logo-bg-dark py-5" id="jilha-asociation">
            <div class="container">

                <div class="row align-items-center mb-5">

                    <div class="col-lg-8">

                        <h4 class="section-title">जिल्हा असोसिएशन</h4>
                        <h1 class="display-5 mb-3">तुमच्या जिल्ह्यात असोसिएशन स्थापना करा</h1>
                        <p class="mb-5"> महासंघ ही असोसिएशनची शिखर संघटना आहे. तुमच्या जिल्ह्यातील
                            मराठी व्यावसायिकांची असोसिएशन महासंघाशी संलग्न करता येते.
                            संलग्नता महासंघाच्या मंजुरीनंतर अधिकृत होते.

                        </p>
                    </div>

                    {{-- <div class="col-lg-4 text-center">
                        <i class="fa-solid fa-building-circle-check section-icon"></i>
                    </div> --}}

                </div>


                <!-- Statistics -->

                <div class="row g-4 mb-5">

                    <div class="col-md-4">
                        <div class="info-card text-center">
                            <i class="fa-solid fa-city stat-icon"></i>
                            <h2>५०:२</h2>
                            <p>पुणे · मुंबई · नागपूर यांसारखी मोठी शहरे</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="info-card text-center">
                            <i class="fa-solid fa-users stat-icon"></i>
                            <h2>२५+</h2>
                            <p>महानगरपालिका / जिल्हा ठिकाणी सदस्य २५ किंवा अधिक</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="info-card text-center">
                            <i class="fa-solid fa-user-group stat-icon"></i>
                            <h2>१५+</h2>
                            <p>नगरपालिका / तालुका ठिकाणी सदस्य १५ किंवा अधिक</p>
                        </div>
                    </div>

                </div>


                <!-- Timeline -->

                <div class="row text-center process-row">

                    <div class="col-lg-3 process-box">

                        <div class="circle">
                            <i class="fa-solid fa-file-signature"></i>
                        </div>

                        <h6>पायरी ०१</h6>

                        <h4>नोंदणी</h4>

                        <p>
                            तुमच्या जिल्ह्यात असोसिएशन नसल्यास
                            महासंघाकडे नोंदणी करा.
                        </p>

                    </div>

                    <div class="col-lg-3 process-box">

                        <div class="circle">
                            <i class="fa-solid fa-users"></i>
                        </div>

                        <h6>पायरी ०२</h6>

                        <h4>सदस्यसंख्या</h4>

                        <p>
                            आवश्यक सदस्यसंख्या पूर्ण झाल्यावर
                            पुढील प्रक्रिया सुरू होते.
                        </p>

                    </div>

                    <div class="col-lg-3 process-box">

                        <div class="circle">
                            <i class="fa-solid fa-handshake"></i>
                        </div>

                        <h6>पायरी ०३</h6>

                        <h4>संलग्नता करार</h4>

                        <p>
                            संविधान व नियमांनुसार
                            अधिकृत मंजुरी.
                        </p>

                    </div>

                    <div class="col-lg-3 process-box">

                        <div class="circle">
                            <i class="fa-solid fa-building"></i>
                        </div>

                        <h6>पायरी ०४</h6>

                        <h4>स्थापना</h4>

                        <p>
                            पदाधिकारी निवड,
                            कार्यकारिणी रचना व उद्घाटन.
                        </p>

                    </div>

                </div>


                <!-- Note -->

                <div class="note-box mt-5">

                    <i class="fa-solid fa-circle-info me-2"></i>

                    <strong>महत्त्वाची सूचना :</strong>

                    संलग्न होणाऱ्या असोसिएशनमधील सर्व सदस्य मराठी असावेत.
                    तसेच महासंघाची नियमावली पाळणे आवश्यक आहे.

                </div>

            </div>
        </div>
        <!-- जिल्हा असोसिएशन End -->




        <!-- कार्यकारिणी Start -->
        <div class="container my-5 py-5" id="karyakarini">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h4 class="section-title">कार्यकारिणी</h4>
                    <h1 class="display-5 mb-4">विद्यमान कार्यकारी मंडळ</h1>
                    <p class="mb-5">संस्था नोंदणी अधिनियम १८६० अन्वये नोंदणीकृत पहिले कार्यकारी मंडळ. कार्यकाळ — २ वर्षे.
                    </p>
                </div>
                <div class="row g-4">
                    <!-- Leadership Card -->
                    <div class="col-lg-6">
                        <div class="card shadow border-1 h-100" style="border-radius: 15px;">
                            <div class="card-header  text-center py-3">
                                <h3 class="mb-0">नेतृत्व</h3>
                                <small>महासंघाचे प्रमुख पदाधिकारी</small>
                            </div>

                            <div class="card-body ">

                                <div class="row g-4">

                                    <div class="col-md-7 text-center mx-auto">
                                        <div class="team-item executive-team0 position-relative">

                                            <!-- Placeholder Image -->
                                            <img src="https://placehold.co/500x500?text=No+Image"
                                                class="img-fluid rounded" alt="No Image Available">

                                            <div class="bg-light text-center p-3">
                                                <h5 class="mb-1">श्री. प्रविण दरेकर</h5>
                                                <span class="text-primary">संरक्षक</span>
                                                <p>आमदार, विधानपरिषद · अध्यक्ष, मुंबई बँक</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="team-item executive-team0 position-relative">
                                            <img src="https://placehold.co/500x500?text=No+Image"
                                                class="img-fluid rounded" alt="No Image Available">

                                            <div class="bg-light text-center p-3">
                                                <h5 class="mb-1">श्री. गजानन कीर्तिकर</h5>
                                                <span class="text-primary">प्रमुख मार्गदर्शक</span>
                                                <p>महासंघ मार्गदर्शक</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mx-auto">
                                        <div class="team-item executive-team0  position-relative">
                                            <img src="https://placehold.co/500x500?text=No+Image"
                                                class="img-fluid rounded" alt="No Image Available">
                                            <div class="bg-light text-center p-3">
                                                <h5 class="mb-1">श्री. सतीश मगर</h5>
                                                <span class="text-primary">सल्लागार</span>
                                                <p>महासंघ सल्लागार</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Executive Members Card -->
                    <div class="col-lg-6">
                        <div class="card shadow border-1 h-100" style="border-radius: 15px;">

                            <div class="card-header  text-center py-3">
                                <h3 class="mb-0">कार्यकारिणी सदस्य</h3>
                                <small>महासंघाच्या विद्यमान कार्यकारिणीचे पदाधिकारी</small>
                            </div>

                            <div class="card-body">

                                <div class="row g-3">

                                    <div class="col-md-6">
                                        <div class="team-item executive-team">
                                            <div class="bg-light p-3 d-flex align-items-center">
                                                {{-- <img src="img/team-1.jpg" class="rounded-circle me-3" width="65"
                                                    height="65" style="object-fit:cover;" alt="Member"> --}}
                                                <img src="https://placehold.co/500x500?text=No+Image" width="65"  height="65"
                                                    class="rounded-circle me-3" alt="No Image Available" >

                                                <div>
                                                    <h6 class="mb-1">श्री. सुरेश कारसिनाथ हावरे</h6>
                                                    <span class="text-primary">अध्यक्ष</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="team-item executive-team">
                                            <div class="bg-light p-3 d-flex align-items-center">
                                                <img src="https://placehold.co/500x500?text=No+Image" width="65"  height="65"
                                                    class="rounded-circle me-3" alt="No Image Available" >
                                                <div>
                                                    <h6 class="mb-1">श्री. संजय रामचंद्र कुलकर्णी</h6>
                                                    <span class="text-primary">कार्याध्यक्ष</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="team-item executive-team">
                                            <div class="bg-light p-3 d-flex align-items-center">
                                                <img src="https://placehold.co/500x500?text=No+Image" width="65"  height="65"
                                                    class="rounded-circle me-3" alt="No Image Available" >
                                                <div>
                                                    <h6 class="mb-1">श्री. अजित श्रीराम मराठे</h6>
                                                    <span class="text-primary">उपाध्यक्ष</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="team-item executive-team">
                                            <div class="bg-light p-3 d-flex align-items-center">
                                                <img src="https://placehold.co/500x500?text=No+Image" width="65"  height="65"
                                                    class="rounded-circle me-3" alt="No Image Available" >
                                                <div>
                                                    <h6 class="mb-1">श्री. गजेन्द्र दत्तात्रय पवार</h6>
                                                    <span class="text-primary">उपाध्यक्ष</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="team-item executive-team">
                                            <div class="bg-light p-3 d-flex align-items-center">
                                                <img src="https://placehold.co/500x500?text=No+Image" width="65"  height="65"
                                                    class="rounded-circle me-3" alt="No Image Available" >
                                                <div>
                                                    <h6 class="mb-1">श्री. प्रकाश भीमराव बाविस्कर</h6>
                                                    <span class="text-primary">महासचिव</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="team-item executive-team">
                                            <div class="bg-light p-3 d-flex align-items-center">
                                                <img src="https://placehold.co/500x500?text=No+Image" width="65"  height="65"
                                                    class="rounded-circle me-3" alt="No Image Available" >
                                                <div>
                                                    <h6 class="mb-1">श्री. संदीप मुकुंद कोलटकर</h6>
                                                    <span class="text-primary">सहसचिव</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="team-item executive-team">
                                            <div class="bg-light p-3 d-flex align-items-center">
                                                <img src="https://placehold.co/500x500?text=No+Image" width="65"  height="65"
                                                    class="rounded-circle me-3" alt="No Image Available" >
                                                <div>
                                                    <h6 class="mb-1">श्री. कल्याण बाबूराव तावरे</h6>
                                                    <span class="text-primary">सहसचिव</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="team-item executive-team">
                                            <div class="bg-light p-3 d-flex align-items-center">
                                                <img src="https://placehold.co/500x500?text=No+Image" width="65"  height="65"
                                                    class="rounded-circle me-3" alt="No Image Available" >
                                                <div>
                                                    <h6 class="mb-1">श्री. बाबासाहेब महादेव भोसले</h6>
                                                    <span class="text-primary">खजिनदार</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="team-item executive-team">
                                            <div class="bg-light p-3 d-flex align-items-center">
                                                <img src="https://placehold.co/500x500?text=No+Image" width="65"  height="65"
                                                    class="rounded-circle me-3" alt="No Image Available" >
                                                <div>
                                                    <h6 class="mb-1">श्री. प्रमोद पुरुषोत्तम पाटील</h6>
                                                    <span class="text-primary">सहखजिनदार</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="team-item executive-team">
                                            <div class="bg-light p-3 d-flex align-items-center">
                                                <img src="https://placehold.co/500x500?text=No+Image" width="65"  height="65"
                                                    class="rounded-circle me-3" alt="No Image Available" >
                                                <div>
                                                    <h6 class="mb-1">श्री. संजय सदाशिव देसले</h6>
                                                    <span class="text-primary">सदस्य</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="team-item executive-team">
                                            <div class="bg-light p-3 d-flex align-items-center">
                                                <img src="https://placehold.co/500x500?text=No+Image" width="65"  height="65"
                                                    class="rounded-circle me-3" alt="No Image Available" >
                                                <div>
                                                    <h6 class="mb-1">श्री. मधु दौलतराव पाटील</h6>
                                                    <span class="text-primary">सदस्य</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="note-box mt-3 shadow ">

                    <i class="fa-solid fa-circle-info me-2"></i>
                    कार्यकारी मंडळाची निवड दर दोन वर्षांनी वार्षिक सर्वसाधारण सभेत गुप्त मतदान पद्धतीने होते. रिक्त पदे
                    राहिलेल्या सदस्यांकडून बहुमताने भरली जातात व त्याची नोंद सहाय्यक धर्मादाय आयुक्त, ठाणे यांच्याकडे केली
                    जाते.

                </div>
            </div>

            <div class="container py-5">

                <!-- Section Heading -->
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h4 class="section-title">जिल्हानिहाय स्थिती</h4>
                    <h1 class="display-5 mb-4">राज्यभरातील वाटचाल</h1>
                    <p class="mb-5">महाराष्ट्रातील विविध जिल्ह्यांमध्ये महासंघाचा विस्तार
                    </p>
                </div>
                <div class="row align-items-center g-5">

                    <!-- Left Side : Maharashtra Map -->
                    <div class="col-lg-7">

                        <div class="map-box text-center">

                            <img src="img/image.png" class="img" alt="Maharashtra Map">

                            <div class="mt-4">
                                <span class="badge bg-success px-3 py-2 me-2">
                                    <i class="fa-solid fa-circle me-1"></i> कार्यरत जिल्हे
                                </span>

                                <span class="badge bg-warning text-dark px-3 py-2">
                                    <i class="fa-solid fa-circle me-1"></i> प्रस्तावित जिल्हे
                                </span>
                            </div>

                        </div>

                    </div>

                    <!-- Right Side : Statistics -->
                    <div class="col-lg-5">

                        <div class="row g-4">

                            <div class="col-6">
                                <div class="stats-card shadow">
                                    <i class="fa-solid fa-map-location-dot"></i>
                                    <h2>३६</h2>
                                    <p>एकूण जिल्हे</p>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="stats-card shadow">
                                    <i class="fa-solid fa-building"></i>
                                    <h2>२४</h2>
                                    <p>कार्यरत असोसिएशन</p>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="stats-card shadow">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <h2>०८</h2>
                                    <p>प्रस्तावित असोसिएशन</p>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="stats-card shadow">
                                    <i class="fa-solid fa-users"></i>
                                    <h2>५५०+</h2>
                                    <p>नोंदणीकृत सदस्य</p>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!-- कार्यकारिणी End -->

        <!-- सेवा Start -->
        <div class="container-fluid logo-bg-dark my-5 py-5" id="seva">
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
                    <div class="col-lg-4 col-md-6 wow  fadeInUp" data-wow-delay="0.1s">
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

        <!-- Appointment Start -->
        @include('contact')
        <!-- Appointment End -->

        <!-- संपर्क Start -->
        <div class="container-fluid logo-bg-dark my-5 py-5" id="sampark">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h4 class="section-title">संपर्क</h4>
                    <h1 class="display-5 mb-4">आमची कार्यालये</h1>

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
                    <h1 class="display-5 mb-4"> आमच्याबद्दलच्या प्रतिक्रिया</h1>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
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
                        <h3>राहुल  पाटील</h3>
                        <span class="text-primary">व्यवसाय</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
    </div>
@endsection
