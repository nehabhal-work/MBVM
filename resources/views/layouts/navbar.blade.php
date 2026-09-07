<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top shadow-sm">
    <div class="container">

        <!-- Logo + Organization Name -->
        <a href="{{ route('home') }}"
           class="navbar-brand d-flex align-items-center m-0 p-0">

            <img src="{{ asset('images/logo-mbvm.png') }}"
                 width="80"
                 alt="MBVM Logo"
                 class="me-2">

            <span class="mbvm-logo-text">
                <b>
                    मराठी बांधकाम व्यावसायिक<br>
                    महासंघ
                </b>
            </span>

        </a>


        <!-- Mobile Toggle -->
        <button type="button"
                class="navbar-toggler"
                data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">

            <span class="navbar-toggler-icon"></span>

        </button>


        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarCollapse">

            <!-- Navigation Links -->
            <div class="navbar-nav ms-auto align-items-lg-center">

                <a href="#parichay" class="nav-item nav-link">
                    परिचय
                </a>

                <a href="#sadasyatva" class="nav-item nav-link">
                    सदस्यत्व
                </a>

                <a href="#jilha-asociation" class="nav-item nav-link">
                    जिल्हा असोसिएशन
                </a>

                <a href="#karyakarini" class="nav-item nav-link">
                    कार्यकारिणी
                </a>

                <a href="#seva" class="nav-item nav-link">
                    सेवा
                </a>

                <a href="#sampark" class="nav-item nav-link">
                    संपर्क
                </a>

            </div>


            <!-- Login / Member Buttons -->
            <div class="navbar-buttons d-flex align-items-center ms-lg-3">

                @guest

                    <a href="{{ route('login.show') }}"
                       class="btn mbvm-btn">
                        लॉगिन
                    </a>

                @else

                    <a href="{{ route('members.index') }}"
                       class="btn mbvm-btn">
                        सदस्य यादी
                    </a>

                    <form method="POST"
                          action="{{ route('logout') }}"
                          class="d-inline m-0">

                        @csrf

                        <button type="submit"
                                class="btn mbvm-btn">
                            लॉगआऊट
                        </button>

                    </form>

                @endguest


                <a href="{{ route('members.create') }}"
                   class="btn mbvm-btn ms-2">
                    सदस्य व्हा
                </a>

            </div>

        </div>

    </div>
</nav>
<!-- Navbar End -->


<style>

/* =========================================
   MBVM NAVBAR
========================================= */

.navbar {
    background: #ffffff !important;
    min-height: 125px;
    padding: 10px 0;
}


/* =========================================
   MAIN NAVBAR CONTAINER
========================================= */

.navbar > .container {
    display: flex;
    align-items: center;
    flex-wrap: nowrap;
}


/* =========================================
   LOGO
========================================= */

.navbar-brand {
    display: flex;
    align-items: center;
    flex-shrink: 0;
    text-decoration: none;
}

.navbar-brand img {
    width: 80px;
    height: auto;
}

.mbvm-logo-text {
    color: #d45d2c;
    font-size: 25px;
    line-height: 1.15;
    white-space: nowrap;
}


/* =========================================
   NAVBAR COLLAPSE
========================================= */

.navbar-collapse {
    display: flex !important;
    align-items: center;
    flex-grow: 1;
}


/* =========================================
   NAVIGATION LINKS
========================================= */

.navbar-nav {
    display: flex;
    flex-direction: row;
    align-items: center;
    flex-wrap: nowrap;
    gap: 5px;
    margin-left: auto;
}

.navbar-nav .nav-link {
    color: #17100d !important;
    font-size: 16px;
    font-weight: 500;

    padding: 10px 8px !important;

    white-space: nowrap;
    text-decoration: none;

    transition: all 0.2s ease;
}

.navbar-nav .nav-link:hover {
    color: #d45d2c !important;
}


/* =========================================
   BUTTON SECTION
========================================= */

.navbar-buttons {
    display: flex;
    align-items: center;
    flex-wrap: nowrap;

    margin-left: 15px;
    flex-shrink: 0;
}


/* =========================================
   ORANGE BUTTON
========================================= */

.mbvm-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    background: #d45d2c !important;
    color: #ffffff !important;

    border: none !important;
    border-radius: 25px;

    padding: 9px 18px;

    font-size: 15px;
    font-weight: 500;

    white-space: nowrap;
    text-decoration: none;

    transition: all 0.2s ease;
}

.mbvm-btn:hover {
    background: #bd4e23 !important;
    color: #ffffff !important;
}


/* =========================================
   LARGE DESKTOP
========================================= */

@media (min-width: 1200px) {

    .navbar > .container {
        max-width: 1250px;
    }

    .navbar-nav {
        gap: 8px;
    }

    .navbar-nav .nav-link {
        font-size: 16px;
        padding-left: 9px !important;
        padding-right: 9px !important;
    }

}


/* =========================================
   MEDIUM DESKTOP / LAPTOP
========================================= */

@media (min-width: 992px) and (max-width: 1199px) {

    .navbar > .container {
        max-width: 100%;
        padding-left: 20px;
        padding-right: 20px;
    }

    .navbar-brand img {
        width: 65px;
    }

    .mbvm-logo-text {
        font-size: 20px;
    }

    .navbar-nav {
        gap: 0;
    }

    .navbar-nav .nav-link {
        font-size: 13px;
        padding-left: 5px !important;
        padding-right: 5px !important;
    }

    .navbar-buttons {
        margin-left: 8px;
    }

    .mbvm-btn {
        padding: 7px 12px;
        font-size: 13px;
    }

}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 991px) {

    .navbar {
        min-height: auto;
        padding: 10px 0;
    }

    .navbar > .container {
        flex-wrap: wrap;
    }

    .navbar-brand img {
        width: 60px;
    }

    .mbvm-logo-text {
        font-size: 18px;
    }

    .navbar-toggler {
        margin-left: auto;
    }

    .navbar-collapse {
        display: none !important;
        width: 100%;
        flex-direction: column;
        align-items: stretch;
    }

    .navbar-collapse.show {
        display: flex !important;
    }

    .navbar-nav {
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
        margin-left: 0;
        margin-top: 15px;
        gap: 0;
    }

    .navbar-nav .nav-link {
        width: 100%;
        padding: 8px 0 !important;
    }

    .navbar-buttons {
        width: 100%;
        margin-left: 0;
        margin-top: 10px;
        padding-bottom: 10px;

        justify-content: flex-start;
        flex-wrap: wrap;
    }

}


/* =========================================
   VERY SMALL MOBILE
========================================= */

@media (max-width: 480px) {

    .navbar-brand img {
        width: 50px;
    }

    .mbvm-logo-text {
        font-size: 15px;
    }

    .mbvm-btn {
        padding: 7px 12px;
        font-size: 13px;
    }

}

</style>