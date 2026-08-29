<!-- Topbar Start -->
{{-- <div class="container-fluid bg-dark p-0 wow fadeIn" data-wow-delay="0.1s">
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
</div> --}}
<!-- Topbar End -->

<!-- Navbar Start -->
{{-- <div class="container">
     <div class="col-md-12">
            <a href="{{ route('home') }}" class="navbar-brand ms-4 ms-lg-0 active p-3">
                <h1 class="text-primary m-0 d-flex align-items-center">
                    <img src="{{ asset('images/logo-mbvm.png') }}" width="100" alt="Icon" class="me-2">
                    <span style="color:#d45d2c;">मराठी
                        बांधकाम व्यावसायिक महासंघ</span>
                </h1>
            </a>
        </div>
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5 wow fadeIn"
        data-wow-delay="0.1s">
       
        <div class="col-md-12">
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="#parichay" class="nav-item nav-link">परिचय</a>
                    <a href="#sadasyatva" class="nav-item nav-link">सदस्यत्व</a>
                    <a href="#jilha-asociation" class="nav-item nav-link">जिल्हा असोसिएशन</a>
                    <a href="#karyakarini" class="nav-item nav-link">कार्यकारिणी</a>
                    <a href="#seva" class="nav-item nav-link">सेवा</a>
                    <a href="#sampark" class="nav-item nav-link">संपर्क</a>
                </div>
                <a href="#contact" class="btn btn-primary py-2 px-4 d-none d-lg-block">सदस्य
                    व्हा</a>
             
            </div>
        </div>
    </nav>
</div> --}}

<!-- Logo Section -->
{{-- <div class="container">
    <div class="row">
        <div class="col-12 text-center pt-3">
            <a href="{{ route('home') }}" class="navbar-brand m-0">
                <h1 class="text-primary m-0 d-flex justify-content-center align-items-center">
                    
                    <span style="color:#d45d2c;">
                        मराठी बांधकाम व्यावसायिक महासंघ
                    </span>
                </h1>
            </a>
        </div>
    </div>
</div> --}}

<!-- Navigation -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top shadow-sm wow fadeIn" data-wow-delay="0.1s">

    <div class="container">
        <div class="d-flex align-items-center justify-content-between w-100 flex-wrap">

            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center m-0 me-auto">
                <img src="{{ asset('images/logo-mbvm.png') }}" width="60" alt="Logo" class="me-2 img-fluid">
                <span style="color:#d45d2c; font-size:1.15rem; line-height:1.2;">
                    <b>मराठी बांधकाम व्यावसायिक<br>महासंघ</b>
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse flex-grow-0 w-100" id="navbarCollapse">

                <div class="navbar-nav mx-auto py-3 py-lg-0 text-center text-lg-start">
                    <a href="#parichay" class="nav-item nav-link">परिचय</a>
                    <a href="#sadasyatva" class="nav-item nav-link">सदस्यत्व</a>
                    <a href="#jilha-asociation" class="nav-item nav-link">जिल्हा असोसिएशन</a>
                    <a href="#karyakarini" class="nav-item nav-link">कार्यकारिणी</a>
                    <a href="#seva" class="nav-item nav-link">सेवा</a>
                    <a href="#sampark" class="nav-item nav-link">संपर्क</a>
                </div>

                <div class="d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center gap-2 pb-3 pb-lg-0">
                    @guest
                        <a href="{{ route('login.show') }}" class="btn btn-outline-primary">लॉगिन</a>
                        <a href="{{ route('register.show') }}" class="btn btn-primary">नोंदणी करा</a>
                    @else
                        <a href="{{ route('members.index') }}" class="btn btn-outline-primary">सदस्य यादी</a>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline m-0">
                            @csrf
                            <button type="submit" class="btn btn-primary">लॉगआऊट</button>
                        </form>
                    @endguest

                    <a href="{{ route('members.create') }}" class="btn btn-primary">
                        सदस्य व्हा
                    </a>
                </div>

            </div>
        </div>
    </div>

</nav>
<!-- Navbar End -->