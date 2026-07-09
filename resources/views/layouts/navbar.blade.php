<!-- Topbar Start -->
<div class="container-fluid bg-dark p-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="row gx-0 d-none d-lg-flex">
        <div class="col-lg-7 px-5 text-start">
            <div class="h-100 d-inline-flex align-items-center py-3 me-3">
                <a class="text-body px-2" href="tel:+0123456789"><i class="fa fa-phone-alt text-primary me-2"></i>+012 345
                    6789</a>
                <a class="text-body px-2" href="mailto:info@example.com"><i
                        class="fa fa-envelope-open text-primary me-2"></i>info@example.com</a>
            </div>
        </div>
        <div class="col-lg-5 px-5 text-end">
            <div class="h-100 d-inline-flex align-items-center py-3 me-2">
                <a class="text-body px-2" href="">Terms</a>
                <a class="text-body px-2" href="">Privacy</a>
            </div>
            <div class="h-100 d-inline-flex align-items-center">
                <a class="btn btn-sm-square btn-outline-body me-1" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-sm-square btn-outline-body me-1" href=""><i class="fab fa-twitter"></i></a>
                <a class="btn btn-sm-square btn-outline-body me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-sm-square btn-outline-body me-0" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <a href="{{ route('home') }}" class="navbar-brand ms-4 ms-lg-0 active">
        <h1 class="text-primary m-0"><img class="me-3" src="{{ asset('images/logo-mbvm.png') }}" width="100"
                alt="Icon">मराठी बांधकाम व्यावसायिक महासंघ</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            {{-- <a href="{{ route('home') }}" class="nav-item nav-link ">Home</a> --}}
            <a href="#parichay" class="nav-item nav-link">परिचय</a>
            <a href="#sadasyatva" class="nav-item nav-link">सदस्यत्व</a>
            <a href="#jilha-asociation" class="nav-item nav-link">जिल्हा असोसिएशन</a>
            <a href="#karyakarini" class="nav-item nav-link">कार्यकारिणी</a>
            <a href="#seva" class="nav-item nav-link">सेवा</a>
            <a href="#sampark" class="nav-item nav-link">संपर्क</a>
        </div>
        <a href="#" class="btn btn-primary py-2 px-4 d-none d-lg-block">सदस्य
            व्हा</a>
        {{-- <a href="https://htmlcodex.com/downloading/?item=2328" class="btn btn-primary py-2 px-4 d-none d-lg-block">सदस्य
            व्हा</a> --}}
    </div>
</nav>

<!-- Navbar End -->
