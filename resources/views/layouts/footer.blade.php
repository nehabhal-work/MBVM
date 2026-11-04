<!-- Footer Start -->
<div class="container-fluid bg-dark text-body footer mt-5 pt-5 px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6 ">
                <h3 class="text-light mb-4">पत्ता</h3>
                <p class="mb-2 footcolor"><i class="fa fa-map-marker-alt text-primary me-3"></i>१७०२, हावरे इन्फोटेक
                    पार्क,
                    सेक्टर ३०ए, वाशी, नवी मुंबई - ४००७०३
                </p>
                <p class="mb-2 footcolor"><i class="fa fa-phone-alt text-primary me-3"></i>+०१२ ३४५ ६७८९</p>
                <p class="mb-2 footcolor"><i class="fa fa-envelope text-primary me-3"></i>info@example.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square btn-outline-body me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-body me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-body me-1" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-outline-body me-0" href=""><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="text-light mb-4">महत्त्वाचे दुवे</h3>
                <a class="btn btn-link" href="{{ route('home') }}#parichay">महासंघाविषयी</a>
                <a class="btn btn-link" href="{{ route('home') }}#karyapaddhati">कार्यपद्धती</a>
                <a class="btn btn-link" href="{{ route('home') }}#jilha-asociation">स्थानिक संघटना</a>
                <a class="btn btn-link" href="{{ route('karya.index') }}">आमचे कार्य</a>
                <a class="btn btn-link" href="{{ route('members.create') }}">नोंदणी करा</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="text-light mb-4">दस्तऐवज व संधी</h3>
                <a class="btn btn-link" href="{{ route('documents.index') }}">मसुदा MoU</a>
                <a class="btn btn-link" href="{{ route('documents.index') }}">मानक घटना</a>
                <a class="btn btn-link" href="{{ route('sandhi.index') }}">JV / JD संधी</a>
                <a class="btn btn-link" href="{{ route('sandhi.index') }}#sandhi-panel-ad">जाहिरात दर</a>
                <a class="btn btn-link" href="{{ route('admin.users.index') }}">प्रशासन</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="text-light mb-4">बातमीपत्र</h3>
                <p class="footcolor">सूचना: या वेबसाइटवरील माहिती केवळ सामान्य माहितीच्या उद्देशाने आहे. अधिकृत माहिती
                    साठी कृपया
                    आमच्याशी संपर्क साधा.</p>
                {{-- <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                        placeholder="तुमचा ई-मेल">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">साइन
                        अप</button>
                </div> --}}
            </div>

        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a href="#">MBVM</a>, सर्व अधिकार सुरक्षित.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** The author’s attribution link must remain intact in the template. ***/-->
                    <!--/*** If you wish to remove this credit link, please purchase the Buy Pro Version . ***/-->
                    Developed By <a href="https://www.nbunify.com/" target="blank">NBUnify</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
