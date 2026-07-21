<div id="contact" class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="wow fadeInUp" data-wow-delay="0.1s">

                    <h4 class="section-title">सदस्य नोंदणी</h4>
                    <h1 class="display-5 mb-3 mt-4">आजच महासंघाशी जोडा</h1>
                    <p class="mb-4">खालील माहिती भरा. नोंदणीनंतर महासंघाकडून तुमच्याशी संपर्क साधला जाईल आणि तुमच्या
                        जिल्ह्यातील स्थापना प्रक्रियेची माहिती दिली जाईल.</p>
                </div>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-light"
                                style="width: 65px; height: 65px;">
                                <i class="fa fa-2x fa-phone-alt text-primary"></i>
                            </div>
                            <div class="ms-4">
                                <p class="mb-2">आता कॉल करा</p>
                                <h3 class="mb-0">+०१२ ३४५ ६७८९
                                </h3>
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
                                <p class="mb-2">आता मेल करा</p>
                                <h3 class="mb-0">info@example.com</h3>
                            </div>
                        </div>
                    </div>

                    {!! QrCode::size(150)->generate('https://mbvm.in/#contact') !!}
                </div>
            </div>
            <div class="col-lg-6 ">
                <div class="row g-3">
                    <div class="col-12 col-sm-6">
                        <input type="text" class="form-control" placeholder="पूर्ण नाव" style="height: 55px;">
                    </div>
                    <div class="col-12 col-sm-6">
                        <input type="email" class="form-control" placeholder="तुमचा ई-मेल" style="height: 55px;">
                    </div>
                    <div class="col-12 col-sm-6">
                        <input type="text" class="form-control" placeholder="तुमचा मोबाइल" style="height: 55px;">
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
