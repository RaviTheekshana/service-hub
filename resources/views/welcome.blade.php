<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Service Hub</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{asset('images/favicon.ico')}}" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>

</head>

<body class="index-page">

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a>
            <img src="{{asset('images/logo2.jpg')}}" width="80" alt="">
        </a>
        <a href="#" class=" logo d-flex align-items-center me-auto">
            <h1 class="sitename">{{ _t('Service Hub') }}</h1>
        </a>
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#" class="active">{{ _t('Home') }}</a></li>
                <li class="dropdown"><a href="{{ url('/bookings/our-service') }}"><span>{{ _t('Our Services') }}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">{{ _t('Electrician') }}</a></li>
                    {{--<ul> <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>--}}
                        <li><a href="#">{{ _t('Plumber') }}</a></li>
                        <li><a href="#">{{ _t('Gardner') }}</a></li>
                        <li><a href="#">{{ _t('Welder') }}</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/job') }}">
                       {{ _t('Booking') }}
                    </a></li>
                <li><a href="{{ url('/bookings/portfolio') }}">
                       {{ _t('Service Providers') }}
                    </a></li>
                <li><a href="{{ url('/review-page') }}">
                       {{ _t('Reviews') }}
                    </a></li>
                <li><a href="{{ url('/contact') }}">
                       {{ _t('Contact Us') }}
                    </a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        @auth
            <a class="btn-getstarted" href="{{ route('dashboard') }}">{{ _t('Dashboard') }}</a>
        @else
        <a class="btn-getstarted" href="{{ route('login') }}">{{ _t('Login') }}</a>
        <a class="btn-getstarted" href="{{ route('register') }}">{{ _t('Register') }}</a>
        @endauth
    </div>
</header>

<main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="hero-bg">
            <img src="{{asset('assets/img/hero-bg-light.webp')}}" alt="">
        </div>
        <div class="container text-center">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h1 data-aos="fade-up">Welcome to <span>Service Hub</span></h1>
                <p data-aos="fade-up" data-aos-delay="100">Join hands with us and Choose Better Live Better<br></p>
                <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{ route('register') }}" class="btn-get-started">Get Started</a>
                    <a href="https://www.youtube.com/watch?v=gH31612GS9k" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
                </div>
                <img src="{{asset('assets/img/hero.png')}}" width="" class="pt-2" alt="" data-aos="zoom-out" data-aos-delay="300">
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section light-background">

        <div class="container">

            <div class="row gy-4">

                <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
                        <div>
                            <h4 class="title"><a href="#" class="stretched-link">Reliable Professionals</a></h4>
                            <p class="description">Our platform is home to a wide range of verified and trusted service providers.
                                From electricians to gardeners, we connect you with the best in the business</p>
                        </div>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
                        <div>
                            <h4 class="title"><a href="#" class="stretched-link">Convenient Booking</a></h4>
                            <p class="description">Booking a service has never been easier. With our user-friendly interface,
                                you can schedule an appointment at a time that suits you.</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-bar-chart"></i></div>
                        <div>
                            <h4 class="title"><a href="#" class="stretched-link">Affordable Services </a></h4>
                            <p class="description">We work with providers who deliver exceptional value for your money, ensuring you get the best deal every time.</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>

    </section><!-- /Featured Services Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    <p class="who-we-are">Who We Are</p>
                    <h3>Connecting People with Trusted Services</h3>
                    <p class="fst-italic">
                        At Service Hub, we understand the challenges of managing a household or business while balancing a busy schedule.
                        That's why we created a platform that seamlessly connects homeowners,
                        business owners, and individuals with skilled service providers who can take care of their daily tasks.
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> <span>Whether you need a gardener to maintain your lawn</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>A plumber to fix a leak</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>An electrician to ensure your wiring is safe, Service Hub is your go-to solution.</span></li>
                    </ul>
                    <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                </div>

                <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
                    <div class="row gy-4">
                        <div class="col-lg-6">
                            <img src="{{asset('assets/img/about-1.jpg')}}" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="row gy-4">
                                <div class="col-lg-12">
                                    <img src="{{asset('assets/img/about-3.jpg')}}" class="img-fluid" alt="">
                                </div>
                                <div class="col-lg-12">
                                    <img src="{{asset('assets/img/about-2.jpg')}}" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section><!-- /About Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section">

        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{asset('assets/img/clients/c1.png')}}" class="img-fluid" alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{asset('assets/img/clients/c2.png')}}" class="img-fluid" alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{asset('assets/img/clients/c3.png')}}" class="img-fluid" alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{asset('assets/img/clients/c4.png')}}" class="img-fluid" alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{asset('assets/img/clients/c-5.png')}}" class="img-fluid" alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{asset('assets/img/clients/c6.png')}}" class="img-fluid" alt="">
                </div><!-- End Client Item -->

            </div>

        </div>

    </section><!-- /Clients Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Features</h2>
            <p>We bring you a platform designed with convenience and reliability at its core, offering features that make finding and booking services simpler than ever</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row justify-content-between">

                <div class="col-lg-5 d-flex align-items-center">

                    <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
                        <li class="nav-item">
                            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                                <i class="bi bi-binoculars"></i>
                                <div>
                                    <h4 class="d-none d-lg-block">Verified Service Providers</h4>
                                    <p>
                                        At Service Hub, We prioritize your safety and satisfaction. That's why every service provider We check qualifications, experience and reviews
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                                <i class="bi bi-box-seam"></i>
                                <div>
                                    <h4 class="d-none d-lg-block">Detailed Portfolios</h4>
                                    <p>
                                        We believe in transparency and helping you make informed decisions. Each service provider has a comprehensive portfolio showcasing their skills,
                                        past projects, and customer reviews.
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-4">
                                <i class="bi bi-brightness-high"></i>
                                <div>
                                    <h4 class="d-none d-lg-block">Convenient Messaging System</h4>
                                    <p>
                                        Effective communication is key to a successful service experience. Our platform offers a seamless messaging system that allows you to discuss details, ask questions,
                                        and clarify any concerns with your chosen service provider.
                                    </p>
                                </div>
                            </a>
                        </li>
                    </ul><!-- End Tab Nav -->

                </div>

                <div class="col-lg-6">

                    <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                        <div class="tab-pane fade active show" id="features-tab-1">
                            <img src="{{asset('assets/img/tabs-1.jpg')}}" alt="" class="img-fluid">
                        </div><!-- End Tab Content Item -->

                        <div class="tab-pane fade" id="features-tab-2">
                            <img src="{{ asset('assets/img/tabs-2.jpg') }}" alt="" class="img-fluid">
                        </div><!-- End Tab Content Item -->

                        <div class="tab-pane fade" id="features-tab-4">
                            <img src="{{ asset('assets/img/tabs-3.png') }}" alt="" class="img-fluid">
                        </div><!-- End Tab Content Item -->

                    </div>


                </div>

            </div>

        </div>

    </section><!-- /Features Section -->

    <!-- Features Details Section -->
    <section id="features-details" class="features-details section">

        <div class="container">

            <div class="row gy-4 justify-content-between features-item">

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{asset('assets/img/about-1.jpg')}}" width="400" class="img-fluid" alt="">
                </div>

                <div class="col-lg-5 d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <h3>Electrician</h3>
                        <p>
                            Certified electricians for safe and efficient electrical work
                        </p>
                        <ul>
                            <li><i class="bi bi-lightning-fill flex-shrink-0"></i>Installation of new electrical systems and components</li>
                            <li><i class="bi bi-plug-fill flex-shrink-0"></i>Expert troubleshooting and repairs for electrical faults</li>
                            <li><i class="bi bi-lightbulb-fill flex-shrink-0"></i>Upgrading lighting systems for energy efficiency</li>
                        </ul>
                        <p>
                            Reliable and certified electricians for all your electrical needs
                        </p>
                        <a href="#" class="btn more-btn">Learn More</a>
                    </div>
                </div>

            </div><!-- Features Item -->

            <div class="row gy-4 justify-content-between features-item">

                <div class="col-lg-5 d-flex align-items-center order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">

                    <div class="content">
                        <h3>Plumber</h3>
                        <p>
                            Expert Plumbers for installations, repairs, and maintenance
                        </p>
                        <ul>
                            <li><i class="bi bi-droplet-half flex-shrink-0"></i>💧 Ensuring efficient water systems in your home or office</li>
                            <li><i class="bi bi-water flex-shrink-0"></i>🌊 Handling emergency leaks and pipe bursts with care.</li>
                            <li><i class="bi bi-tools flex-shrink-0"></i>🛠 Reliable solutions for any plumbing needs.</li>
                        </ul>
                        <p>Count on us for
                            and dependable plumbing services that you can trust</p>
                        <a href="#" class="btn more-btn">Learn More</a>
                    </div>

                </div>

                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{asset('images/Plumber.jpg')}}" class="img-fluid" alt="">
                </div>

            </div><!-- Features Item -->
            <div class="row gy-4 justify-content-between features-item">

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{asset('images/gardener.jpg')}}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-5 d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <h3>Gardener</h3>
                        <p>
                            Professional gardeners for beautiful and well-maintained gardens
                        </p>
                        <ul>
                            <li><i class="bi bi-yelp flex-shrink-0"></i>🌿 Regular maintenance and seasonal planting</li>
                            <li><i class="bi bi-flower3 flex-shrink-0"></i>🌳 Tree pruning and lawn care services</li>
                            <li><i class="bi bi-tree-fill flex-shrink-0"></i>🌸 Creating and maintaining stunning garden landscapes</li>
                        </ul>
                        <p>Enjoy a well-maintained garden all year round with our expert care</p>
                        <a href="#" class="btn more-btn">Learn More</a>
                    </div>
                </div>

            </div><!-- Features Item -->
            <div class="row gy-4 justify-content-between features-item">

                <div class="col-lg-5 d-flex align-items-center order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">

                    <div class="content">
                        <h3>Welder</h3>
                        <p>
                            Skilled welders for strong and durable metalwork
                        </p>
                        <ul>
                            <li><i class="bi bi-tools flex-shrink-0"></i>🔧 Precision welding for custom fabrication projects</li>
                            <li><i class="bi bi-bar-chart-steps flex-shrink-0"></i>🏗 Structural repairs and installations with high-quality materials</li>
                            <li><i class="bi bi-ev-front flex-shrink-0"></i>🚧 Mobile welding services available for on-site jobs</li>
                        </ul>
                        <p>Count on us for
                            and dependable plumbing services that you can trust</p>
                        <a href="#" class="btn more-btn">Learn More</a>
                    </div>

                </div>

                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{asset('images/welder.jpg')}}" class="img-fluid" alt="">
                </div>

            </div><!-- Features Item -->
        </div>

    </section><!-- /Features Details Section -->

    <!-- Services Section -->
    <section id="services" class="services section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Services</h2>
            <p>Electric gardening plumbing services ensure efficient water management and electrical safety in garden maintenance,
                combining expertise in irrigation systems, lighting, and power tools for optimal garden care.</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row g-5">

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item item-cyan position-relative">
                        <i class="bi bi-lightning-charge-fill icon"></i>
                        <div>
                            <h3>Home Wiring & Rewiring</h3>
                            <p>Our experienced electricians handle all types of home wiring and rewiring projects, ensuring your electrical systems are safe, efficient, and up to code</p>
                            <a href="#" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item item-orange position-relative">
                        <i class="bi bi-lightbulb-fill icon"></i>
                        <div>
                            <h3>Lighting Installation & Upgrades</h3>
                            <p>Upgrade your home’s lighting with our expert installation services. Whether it’s indoor lighting, outdoor lighting, or smart home lighting systems, we’ve got you covered</p>
                            <a href="#" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item item-teal position-relative">
                        <i class="bi bi-droplet-half icon"></i>
                        <div>
                            <h3>Emergency Leak Repairs</h3>
                            <p>Our skilled plumbers are available 24/7 for emergency leak repairs. Whether it’s a burst pipe or a dripping faucet, we’ll fix it promptly to prevent further damage</p>
                            <a href="#" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item item-red position-relative">
                        <i class="bi bi-tools icon"></i>
                        <div>
                            <h3>Bathroom & Kitchen Installations</h3>
                            <p>From installing new sinks and toilets to full bathroom and kitchen plumbing systems, our plumbers ensure all installations are done to the highest standards</p>
                            <a href="#" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item item-indigo position-relative">
                        <i class="bi bi-flower3 icon"></i>
                        <div>
                            <h3>Planting & Landscaping</h3>
                            <p>Transform your outdoor space with our expert planting and landscaping services. Whether you need a complete garden redesign or seasonal planting, our gardeners have you covered</p>
                            <a href="#" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item item-pink position-relative">
                        <i class="bi bi-tree-fill icon"></i>
                        <div>
                            <h3>Lawn Care & Maintenance</h3>
                            <p>Our professional gardeners provide comprehensive lawn care services, including mowing, trimming, and fertilization, ensuring your garden remains lush and healthy year-round</p>
                            <a href="#" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>

    </section><!-- /Services Section -->

    <!-- More Features Section -->
    <section id="more-features" class="more-features section">

        <div class="container">

            <div class="row justify-content-around gy-4">

                <div class="col-lg-6 d-flex flex-column justify-content-center order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                    <h3>Your All-in-One Service Hub</h3>
                    <p>Streamline your business operations with our comprehensive service hub platform designed to meet all your needs</p>

                    <div class="row">

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-sliders flex-shrink-0"></i>
                            <div>
                                <h4>🖥 Unified Dashboard</h4>
                                <p>Access all your essential tools and services from a single, intuitive interface, simplifying the management of your business operations</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-database-lock flex-shrink-0"></i>
                            <div>
                                <h4>🔒 Robust Security Measures</h4>
                                <p>Protect your business and customer data with state-of-the-art security protocols, including encryption, multi-factor authentication, and regular security audits</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-chat-left-text flex-shrink-0"></i>
                            <div>
                                <h4>💬 Integrated Communication</h4>
                                <p>Facilitate seamless communication within your team and with clients using built-in messaging, video conferencing, and file-sharing features</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-lg-6 icon-box d-flex">
                            <i class="bi bi-telephone-outbound-fill flex-shrink-0"></i>
                            <div>
                                <h4>📞 24/7 Support Access</h4>
                                <p>Offer round-the-clock support to your customers through various channels, including live chat, email, and phone, ensuring their needs are always met</p>
                            </div>
                        </div><!-- End Icon Box -->

                    </div>

                </div>

                <div class="features-image col-lg-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{asset('images/servicehub.jpg')}}" alt="">
                </div>

            </div>

        </div>

    </section><!-- /More Features Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Frequently Asked Questions</h2>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

                    <div class="faq-container">

                        <div class="faq-item faq-active">
                            <h3>Why should I hire a professional electrician instead of doing the work myself?</h3>
                            <div class="faq-content">
                                <p>Hiring a professional electrician ensures that electrical work is done safely and meets all regulatory standards. DIY electrical work can be dangerous and may lead to serious hazards such as fires or electrocution if not handled correctly.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>When should I call a plumber for a leaking pipe?</h3>
                            <div class="faq-content">
                                <p>It's essential to call a plumber as soon as you notice a leak to prevent water damage, mold growth, and increased water bills. A professional plumber can quickly identify and repair the source of the leak.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>How often should I schedule gardening maintenance for my lawn and plants?</h3>
                            <div class="faq-content">
                                <p>Regular gardening maintenance, ideally on a weekly or bi-weekly basis, is important to keep your lawn and plants healthy. Professional gardeners can provide tailored care based on the specific needs of your garden, ensuring it thrives year-round.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>What are the benefits of hiring a professional welder for my project?</h3>
                            <div class="faq-content">
                                <p>Professional welders have the expertise to ensure strong, durable, and precise welds. They use specialized equipment and techniques to handle various materials and complex projects, providing a safe and reliable outcome that meets industry standards.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>What are the signs that my home needs an electrical inspection?</h3>
                            <div class="faq-content">
                                <p>If you notice flickering lights, frequently tripped breakers, or outlets that are warm to the touch, it's time for an electrical inspection. Regular inspections ensure your home’s electrical system is safe and up to code.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Can regular plumbing maintenance help prevent major issues?</h3>
                            <div class="faq-content">
                                <p>Yes, regular plumbing maintenance can identify potential problems before they become major issues, saving you from costly repairs and inconvenience. Routine checks and cleaning keep your plumbing system in good working order.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                    </div>

                </div><!-- End Faq Column-->

            </div>

        </div>

    </section><!-- /Faq Section -->


    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Testimonials</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                    {
                      "loop": true,
                      "speed": 600,
                      "autoplay": {
                        "delay": 4000
                      },
                      "slidesPerView": "auto",
                      "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                      },
                      "breakpoints": {
                        "320": {
                          "slidesPerView": 1,
                          "spaceBetween": 40
                        },
                        "1200": {
                          "slidesPerView": 3,
                          "spaceBetween": 1
                        }
                      }
                    }
                </script>
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{asset('assets/img/testimonials/testimonials-1.jpg')}}" class="testimonial-img" alt="">
                                <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{asset('assets/img/testimonials/testimonials-2.jpg')}}" class="testimonial-img" alt="">
                                <h3>Sara Wilsson</h3>
                                <h4>Designer</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{asset('assets/img/testimonials/testimonials-3.jpg')}}" class="testimonial-img" alt="">
                                <h3>Jena Karlis</h3>
                                <h4>Store Owner</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{asset('assets/img/testimonials/testimonials-4.jpg')}}" class="testimonial-img" alt="">
                                <h3>Matt Brandon</h3>
                                <h4>Freelancer</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{asset('assets/img/testimonials/testimonials-5.jpg')}}" class="testimonial-img" alt="">
                                <h3>John Larson</h3>
                                <h4>Entrepreneur</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section><!-- /Testimonials Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-geo-alt"></i>
                        <h3>Address</h3>
                        <p>A108 Adam Street, New York, NY 535022</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-telephone"></i>
                        <h3>Call Us</h3>
                        <p>+1 5589 55488 55</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-envelope"></i>
                        <h3>Email Us</h3>
                        <p>info@example.com</p>
                    </div>
                </div><!-- End Info Item -->

            </div>

            <div class="row gy-4 mt-1">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.765612991609!2d79.85865397558716!3d6.918600618444676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2596d3cb8fe07%3A0x2b0ae2edd563a661!2sAsia%20Pacific%20Institute%20of%20Information%20Technology%20(APIIT)!5e0!3m2!1sen!2slk!4v1725131579511!5m2!1sen!2slk" style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><!-- End Google Maps -->

                <div class="col-lg-6">
                    <form action="" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="400">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit">Send Message</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->

</main>
<footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="#" class="logo d-flex align-items-center">
                    <span class="sitename">Service Hub</span>
                </a>
                <div class="footer-contact pt-3">
                    <p>A108 union Place</p>
                    <p>Colombo 02, NY 535022</p>
                    <p class="mt-3"><strong>Phone:</strong> <span>+94 5589 8855</span></p>
                    <p><strong>Email:</strong> <span>info@example.com</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Terms of service</a></li>
                    <li><a href="#">Privacy policy</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Our Services</h4>
                <ul>
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Web Development</a></li>
                    <li><a href="#">Product Management</a></li>
                    <li><a href="#">Marketing</a></li>
                    <li><a href="#">Graphic Design</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-12 footer-newsletter">
                <h4>Our Newsletter</h4>
                <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                <form action="{{asset('forms/newsletter.php')}}" method="post" class="php-email-form">
                    <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                </form>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4c py-6">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">2024 ServiceHub</strong><span>All Rights Reserved</span></p>
    </div>
</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

<!-- Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>


</body>
</html>


