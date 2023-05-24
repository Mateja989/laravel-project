<!-- Start Navbar Area -->
<div class="navbar-area">
    <div class="mobile-responsive-nav">
        <div class="container">
            <div class="mobile-responsive-menu">
                <div class="logo">
                    <a href="index.html">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="desktop-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a href="/" class="nav-link active">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/about" class="nav-link">
                                About Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/contact" class="nav-link">Contact Us</a>
                        </li>


                    </ul>

                    <div class="others-options">
                        <ul>

                            @guest
                            <li>
                                <a href="/login" class="active">
                                    Log in
                                </a>
                            </li>
                            <li>
                                <a href="/register">
                                    Register
                                </a>
                            </li>
                            @endguest
                            @auth
                                <li>
                                    <div class="dropdown">
                                        <button type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="{{ asset(auth()->user()->avatar) }} " alt="Image">
                                            <span>{{ auth()->user()->username }}</span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                            <li>
                                                <a href="/users/{{ auth()->user()->username }}">
                                                    <i class="ri-user-line"></i>
                                                    User profile
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <i class="ri-settings-2-line"></i>
                                                    Edit profile
                                                </a>
                                            </li>
                                            <li>
                                                <a href="user-groups.html">
                                                    <i class="ri-group-line"></i>
                                                    My followers
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/questions/create">
                                                    <i class="ri-questionnaire-line"></i>
                                                    Ask questions
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <form method="POST" action="/logout">
                                                        @csrf
                                                        <button type="submit">
                                                            <i class="ri-logout-box-r-line"></i>
                                                            Log out
                                                        </button>
                                                    </form>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="others-option-for-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>
                </div>
            </div>

            <div class="container">
                <div class="option-inner">
                    <div class="others-options justify-content-center d-flex align-items-center">
                        <ul>

                            <li>
                                <a href="/login" data-bs-toggle="modal"  class="active">
                                    Log in
                                </a>
                            </li>
                            <li>
                                <a href="/register" data-bs-toggle="modal" data-bs-target="#exampleModal-4">
                                    Register
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Navbar Area -->
