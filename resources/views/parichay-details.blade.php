@extends('layouts.master')

@section('content')

<style>
    /* =========================
       MBVM DETAILS PAGE
    ========================= */

    .mbvm-details-section {
        padding: 80px 0;
    }

    .mbvm-details-section.bg-soft {
        background: #f9ede7;
    }

    .mbvm-content-box {
        max-width: 1100px;
        margin: 0 auto;
    }

    .mbvm-content-box p {
        font-size: 18px;
        line-height: 1.9;
        color: #444;
        margin-bottom: 22px;
    }

    /* =========================
       PAGE TITLE
    ========================= */

    .mbvm-page-title {
        margin-bottom: 45px;
    }

    .mbvm-page-title .section-title {
        color: #d45d2c;
    }

    .mbvm-page-title .display-5 {
        color: #1d2940;
        font-weight: 700;
    }

    /* =========================
       QR SECTION
    ========================= */

    .mbvm-qr-wrapper {
        background: #fff;
        border-radius: 18px;
        padding: 40px;
        box-shadow: 0 10px 35px rgba(0, 0, 0, .08);
        border: 1px solid #eee;
    }

    .mbvm-qr-content h2 {
        color: #1d2940;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .mbvm-qr-content p {
        font-size: 18px;
        line-height: 1.9;
        color: #444;
    }

    .mbvm-qr-note {
        background: #faf8f6;
        border-left: 4px solid #d45d2c;
        padding: 15px 20px;
        margin-top: 20px;
        font-size: 17px;
        line-height: 1.7;
    }

    .mbvm-qr-note strong {
        color: #d45d2c;
        font-size: 23px;
    }

    .mbvm-qr-box {
        text-align: center;
    }

    .mbvm-qr-frame {
        width: 220px;
        height: 220px;
        padding: 12px;
        margin: auto;
        background: #fff;
        border: 3px solid #d45d2c;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .mbvm-qr-frame img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .mbvm-qr-box h5 {
        color: #1d2940;
        font-weight: 700;
        margin-top: 18px;
    }

    /* =========================
       RESPONSIBILITIES
    ========================= */

    .mbvm-responsibility-card {
        height: 100%;
        background: #fff;
        border-radius: 18px;
        padding: 35px 30px;
        border: 1px solid #eee;
        box-shadow: 0 8px 25px rgba(0, 0, 0, .06);
        border-top: 4px solid #d45d2c;
    }

    .mbvm-responsibility-card h3 {
        color: #1d2940;
        font-weight: 700;
        margin-bottom: 25px;
    }

    .mbvm-responsibility-card ul {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .mbvm-responsibility-card li {
        position: relative;
        padding-left: 25px;
        margin-bottom: 15px;
        font-size: 17px;
        line-height: 1.7;
        color: #444;
    }

    .mbvm-responsibility-card li::before {
        content: "✓";
        position: absolute;
        left: 0;
        top: 0;
        color: #d45d2c;
        font-weight: 700;
    }

    /* =========================
       ORGANISATIONAL STRUCTURE
    ========================= */

    .mbvm-structure-box {
        background: #fff;
        border-radius: 18px;
        padding: 35px;
        border-left: 5px solid #d45d2c;
        box-shadow: 0 8px 25px rgba(0, 0, 0, .06);
    }

    /* =========================
       MISSION
    ========================= */

    .mbvm-mission {
        background: #1d2940;
        padding: 80px 20px;
        text-align: center;
    }

    .mbvm-mission h2 {
        color: #dfb269;
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 30px;
    }

    .mbvm-mission p {
        max-width: 1000px;
        margin: 0 auto;
        color: #fff;
        font-size: 19px;
        line-height: 2;
    }

    .mbvm-mission-logo {
        margin-top: 35px;
    }

    .mbvm-mission-logo img {
        max-width: 150px;
        max-height: 150px;
        object-fit: contain;
    }

    .mbvm-final-line {
        margin-top: 35px;
        padding-top: 25px;
        border-top: 1px solid rgba(255, 255, 255, .2);
        color: #dfb269;
        font-size: 20px;
        font-weight: 700;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 767px) {

        .mbvm-details-section {
            padding: 55px 15px;
        }

        .mbvm-qr-wrapper {
            padding: 25px 20px;
        }

        .mbvm-qr-box {
            margin-top: 30px;
        }

        .mbvm-qr-frame {
            width: 190px;
            height: 190px;
        }

        .mbvm-responsibility-card {
            padding: 28px 22px;
        }

        .mbvm-mission {
            padding: 60px 20px;
        }

        .mbvm-mission h2 {
            font-size: 30px;
        }

        .mbvm-mission p {
            font-size: 17px;
        }
    }
</style>


{{-- =========================================================
     PAGE INTRODUCTION
========================================================= --}}

<div class="container-xxl py-5">

    <div class="container">

        <div class="mbvm-page-title text-center">

            <h4 class="section-title">
                परिचय
            </h4>

            <h1 class="display-5 mt-4">
                महासंघाबद्दल
            </h1>

        </div>


        <div class="mbvm-content-box">

            <p>
                मराठी बांधकाम व्यवसायिक महासंघ (MBVM) ही महाराष्ट्रातील मराठी बांधकाम व्यवसायिकांची राज्यस्तरीय शिखर (Apex) संघटना आहे. महासंघाचा मुख्य उद्देश महाराष्ट्रातील प्रत्येक जिल्ह्यात तसेच CIDCO, NAINA, MMRDA, PMRDA, MIDC आणि इतर विशेष नियोजन प्राधिकरण (Special Planning Authority) क्षेत्रांमध्ये मराठी बांधकाम व्यवसायिक असोसिएशन स्थापन करून सर्व मराठी विकासकांना एका संघटनात्मक व्यासपीठावर आणणे हा आहे.
            </p>

        </div>

    </div>

</div>


{{-- =========================================================
     कार्यपद्धती
========================================================= --}}

<section class="mbvm-details-section bg-soft">

    <div class="container">

        <div class="mbvm-page-title text-center">

            <h4 class="section-title">
                कार्यपद्धती
            </h4>

            <h1 class="display-5 mt-4">
                कार्यपद्धती
            </h1>

        </div>


        <div class="mbvm-content-box">

            <p>
                इच्छुक विकासकांनी वेबसाईटवरील किंवा विविध माध्यमांवरील QR Code स्कॅन करून प्राथमिक नोंदणी फॉर्म भरायचा आहे. संबंधित जिल्हा किंवा विशेष नियोजन प्राधिकरण क्षेत्रात १५ किंवा त्यापेक्षा अधिक विकासकांची नोंदणी झाल्यानंतर महासंघ त्या ठिकाणी विशेष बैठक आयोजित करेल.
            </p>

            <p>
                या बैठकीत स्थानिक असोसिएशनची स्थापना, पदाधिकाऱ्यांची निवड, संविधानाचा स्वीकार, नोंदणी प्रक्रिया आणि महासंघाशी संलग्नतेबाबत निर्णय घेतले जातील.
            </p>

        </div>

    </div>

</section>


{{-- =========================================================
     QR CODE
========================================================= --}}

<section class="mbvm-details-section">

    <div class="container">

        <div class="mbvm-page-title text-center">

            <h4 class="section-title">
                ऑनलाइन नोंदणी
            </h4>

            <h1 class="display-5 mt-4">
                QR Code स्कॅन करा
            </h1>

        </div>


        <div class="mbvm-qr-wrapper">

            <div class="row align-items-center g-5">

                <div class="col-lg-7">

                    <div class="mbvm-qr-content">

                        <h2>
                            प्राथमिक नोंदणीसाठी QR Code स्कॅन करा
                        </h2>

                        <p>
                            इच्छुक विकासकांनी प्राथमिक नोंदणीसाठी खालील QR Code स्कॅन करून नोंदणी फॉर्म भरावा.
                        </p>

                        <div class="mbvm-qr-note">

                            <strong>१५+</strong>

                            विकासकांची नोंदणी पूर्ण झाल्यानंतर संबंधित ठिकाणी विशेष बैठक आयोजित केली जाईल.

                        </div>

                    </div>

                </div>


                <div class="col-lg-5">

                    <div class="mbvm-qr-box">

                        <div class="mbvm-qr-frame">

                            <img
                                src="{{ asset('assets/images/mbvm-qr.png') }}"
                                alt="MBVM QR Code"
                            >

                        </div>

                        <h5>
                            QR Code स्कॅन करून नोंदणी करा
                        </h5>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     महासंघाशी संलग्नता
========================================================= --}}

<section class="mbvm-details-section bg-soft">

    <div class="container">

        <div class="mbvm-page-title text-center">

            <h4 class="section-title">
                महासंघाशी संलग्नता
            </h4>

            <h1 class="display-5 mt-4">
                महासंघाशी संलग्नता
            </h1>

        </div>


        <div class="mbvm-content-box">

            <p>
                असोसिएशनची नोंदणी पूर्ण झाल्यानंतर त्या असोसिएशनचा मराठी बांधकाम व्यवसायिक महासंघाशी Affiliation MoU (सामंजस्य करार) केला जाईल. या करारानुसार सर्व संलग्न असोसिएशन महासंघाचे संविधान, नियमावली आणि धोरणांचे पालन करतील तसेच महासंघाचा अधिकृत लोगो वापरतील.
            </p>

            <p>
                असोसिएशनकडून सदस्य शुल्कातून निश्चित केलेले योगदान महासंघाकडे जमा करण्यात येईल. सदस्यसंख्येच्या प्रमाणात संबंधित असोसिएशनला महासंघामध्ये प्रतिनिधित्व मिळेल.
            </p>

        </div>

    </div>

</section>


{{-- =========================================================
     जबाबदाऱ्यांचे विभाजन
     Responsibilities
========================================================= --}}

<section class="mbvm-details-section">

    <div class="container">

        <div class="mbvm-page-title text-center">

            <h4 class="section-title">
                जबाबदाऱ्यांचे विभाजन
            </h4>

            <h1 class="display-5 mt-4">
                जबाबदाऱ्यांचे विभाजन
            </h1>

        </div>


        <div class="row g-4">

            {{-- स्थानिक असोसिएशन --}}

            <div class="col-lg-6">

                <div class="mbvm-responsibility-card">

                    <h3>
                        स्थानिक असोसिएशन
                    </h3>

                    <ul>

                        <li>
                            स्थानिक सदस्यांचे प्रश्न सोडविणे
                        </li>

                        <li>
                            स्थानिक प्रशासन व प्राधिकरणांशी समन्वय
                        </li>

                        <li>
                            जिल्हास्तरीय कार्यक्रम व सदस्य सेवा
                        </li>

                    </ul>

                </div>

            </div>


            {{-- महासंघ --}}

            <div class="col-lg-6">

                <div class="mbvm-responsibility-card">

                    <h3>
                        मराठी बांधकाम व्यवसायिक महासंघ
                    </h3>

                    <ul>

                        <li>
                            राज्यस्तरीय व सामायिक प्रश्न शासनापुढे मांडणे
                        </li>

                        <li>
                            धोरणात्मक प्रतिनिधित्व
                        </li>

                        <li>
                            कायदेशीर व तांत्रिक मार्गदर्शन
                        </li>

                        <li>
                            प्रशिक्षण, नेटवर्किंग व उद्योग विकास
                        </li>

                        <li>
                            सर्व संलग्न असोसिएशनमध्ये समन्वय राखणे
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     संघटनात्मक रचना
========================================================= --}}

<section class="mbvm-details-section bg-soft">

    <div class="container">

        <div class="mbvm-page-title text-center">

            <h4 class="section-title">
                संघटनात्मक रचना
            </h4>

            <h1 class="display-5 mt-4">
                संघटनात्मक रचना
            </h1>

        </div>


        <div class="mbvm-structure-box">

            <p>
                महासंघ कोणत्याही व्यक्तीला थेट सदस्यत्व देणार नाही. प्रत्येक विकासक हा प्रथम आपल्या जिल्हा किंवा विशेष नियोजन प्राधिकरण क्षेत्रातील असोसिएशनचा सदस्य असेल. त्या सर्व असोसिएशनचे प्रतिनिधित्व करणारी राज्यस्तरीय शिखर संघटना म्हणजे मराठी बांधकाम व्यवसायिक महासंघ असेल.
            </p>

        </div>

    </div>

</section>


{{-- =========================================================
     आमचे ध्येय
========================================================= --}}

<section class="mbvm-mission">

    <div class="container">

        <h2>
            आमचे ध्येय
        </h2>

        <p>
            महाराष्ट्रातील प्रत्येक जिल्ह्यात आणि प्रत्येक विशेष नियोजन प्राधिकरण क्षेत्रात मराठी बांधकाम व्यवसायिक असोसिएशन स्थापन करून, सर्व मराठी विकासकांना एकाच संघटनात्मक छत्राखाली आणणे आणि त्यांच्या स्थानिक व राज्यस्तरीय प्रश्नांसाठी प्रभावी, सक्षम व एकसंध प्रतिनिधित्व निर्माण करणे.
        </p>


        {{-- लोगो --}}

        <div class="mbvm-mission-logo">

            <img
                src="{{ asset('images/logo-mbvm.png') }}"
                alt="मराठी बांधकाम व्यवसायिक महासंघ लोगो"
            >

        </div>


        <div class="mbvm-final-line">
            एक महासंघ • प्रत्येक जिल्ह्यात असोसिएशन • एकच लोगो • एकच ओळख • एकसंध महाराष्ट्र
        </div>

    </div>

</section>


@endsection