<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Portfolio</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('images/favicon.ico')}}" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets.portfolio/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets.portfolio/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets.portfolio/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets.portfolio/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets.portfolio/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{asset('assets.portfolio/css/main.css')}}" rel="stylesheet">

</head>

<body class="index-page">

<header id="header" class="header dark-background d-flex flex-column">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <div class="profile-img">
        <img src="{{ ucfirst(get_service_providers()->where('id', $portfolio->service_provider_id)->first()->profile_photo_url)}}" alt="" class="img-fluid rounded-circle">
    </div>

    <a href="#" class="logo d-flex align-items-center justify-content-center">
        <h1 class="sitename">{{ ucfirst(get_service_providers()->where('id', $portfolio->service_provider_id)->first()->name)}}</h1>
    </a>

    <div class="social-links text-center">
        <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=someone@example.com" class="twitter"><i class="bi bi-envelope"></i></a>
        <a href="tel:" class="facebook"><i class="bi bi-telephone"></i></a>
        <a href="#" class="instagram"><i class="bi bi-whatsapp"></i></a>
        <a href="#" class="google-plus"><i class="bi bi-facebook"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
    </div>

    <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i>Home</a></li>
            <li><a href="#about"><i class="bi bi-person navicon"></i> About</a></li>
            <li><a href="#resume"><i class="bi bi-file-earmark-text navicon"></i>Certificate</a></li>
            <li><a href="#portfolio"><i class="bi bi-images navicon"></i>Projects</a></li>
            <li><a href="#testimonials"><i class="bi bi-star navicon"></i>Review</a></li>
            <li><a href="#contact"><i class="bi bi-envelope navicon"></i> Message</a></li>
            <li><a href="{{ url('/bookings/portfolio')}}"><i class="bi bi-arrow-left-circle navicon"></i> Back</a></li>
        </ul>
    </nav>

</header>
<main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
        <img src="{{ asset('storage/' . $portfolio->profile_bg_path) }}" alt="" data-aos="fade-in" class="">
        <div class="container bg-black bg-opacity-50" data-aos="fade-up" data-aos-delay="100">
            <h2>{{ ucfirst(get_service_providers()->where('id', $portfolio->service_provider_id)->first()->name)}}</h2>
            <p>I'm <span class="typed" data-typed-items="{{ ucfirst(get_categories()->where('id', $portfolio->category_id)->first()->name)}}, Professional, Freelancer, An Expert"></span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section dark-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>About</h2>
            <p>{{$portfolio->personal_summary}}</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4 justify-content-center">
                <div class="col-lg-4">
                    <img src="{{get_service_providers()->where('id', $portfolio->service_provider_id)->first()->profile_photo_url}}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 content pb-2">
                    <h1>{{ ucfirst(get_categories()->where('id', $portfolio->category_id)->first()->name)}}</h1>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>Experience Years:</strong> <span>{{$portfolio->experience_years}}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Hourly Rate:</strong> <span>{{$portfolio->hourly_rate}}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>Maharagama</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>30</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{get_service_providers()->where('id', $portfolio->service_provider_id)->first()->email}}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span></li>
                            </ul>
                        </div>
                    </div>
                    <p class="py-3">
                        {{$portfolio->work_experience}}
                    </p>
                </div>
            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section ">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item">
                        <i class="bi bi-emoji-smile"></i>
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>Happy Clients</strong>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item">
                        <i class="bi bi-journal-richtext"></i>
                        <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>Projects</strong>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item">
                        <i class="bi bi-headset"></i>
                        <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>Hours Of Support</strong>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item">
                        <i class="bi bi-people"></i>
                        <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>Hard Workers</strong>
                    </div>
                </div><!-- End Stats Item -->

            </div>

        </div>

    </section><!-- /Stats Section -->

    <!-- Resume Section -->
    <section id="resume" class="resume section dark-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Certificate</h2>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row">
                <iframe src="{{ $mediaItems2 }}" width="100%" height="600px">
                </iframe>
            </div>
        </div>
    </section><!-- /Resume Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Project Images</h2>
            <p>These are the service providers who offer a variety of professional services tailored to your needs. Each image showcases their
                expertise, experience, and the quality of work they deliver. From skilled artisans to dedicated professionals, our platform connects
                you with trusted service providers, making it easier for you to find the right fit for your project. Explore their portfolios, read reviews,
                and start collaborating on your next project with confidence.</p>
        </div><!-- End Section Title -->
        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach($mediaItems as $media)
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <div class="portfolio-content h-100">
                                <!-- Use the media URL to display the image -->
                                <img src="{{ $media->getUrl() }}" class="img-fluid" alt="Project Image">
                                <div class="portfolio-info">
                                    <h4>{{ $media->name }}</h4> <!-- Media name -->
                                    <p>{{ $media->custom_properties['description'] ?? 'No description available' }}</p> <!-- Optional description -->

                                    <!-- Lightbox preview link -->
                                    <a href="{{ $media->getUrl() }}" title="{{ $media->name }}" data-gallery="portfolio-gallery-app" class="glightbox preview-link">
                                        <i class="bi bi-zoom-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div><!-- End Portfolio Item -->
                    @endforeach
                </div><!-- End Portfolio Container -->
            </div>
        </div>
    </section><!-- /Portfolio Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section dark-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Reviews</h2>
            <p>Our review section highlights feedback from clients who have worked with our service providers. These reviews offer valuable insights into the quality,
                professionalism, and reliability of the services delivered. Whether it's a quick job or a long-term project, honest client experiences help you make informed
                decisions when choosing a service provider.
                Explore real testimonials and ratings to ensure your next project is in trusted hands.</p>
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
                    @foreach($reviews as $review)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>{{$review->comment}}</span>
                                <span>
                                @php
                                    $rate= number_format(get_reviews('service_provider_id', $review->service_provider_id), 1) ?? 'No reviews yet'
                                @endphp
                                <span class="text-md-center text-gray-500">{{$rate}}</span>
                                    </span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                            <img src="{{get_users()->where('id', $review->user_id)->first()->profile_photo_url}}" class="testimonial-img" alt="">
                            <h3>{{get_users()->where('id', $review->user_id)->first()->name}}</h3>
                        </div>
                    </div><!-- End testimonial item -->
                    @endforeach
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
        </div><!-- End Section Title -->


        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4 justify-content-center">
                <div class="col-lg-5">
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('chat.show', ['chat' => $chats->first()->id]) }}">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 py-3">
                                Message
                            </button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="d-flex justify-content-center">
                        <form action="{{ route('bookings.portfolio.book', ['id' => $portfolio->id]) }}" method="GET">
                            <button type="submit" class="btn btn-success btn-lg rounded-pill px-5 py-3">
                                Book Now
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
<footer id="footer" class="footer position-relative dark-background">

    <div class="container">
        <div class="copyright text-center ">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">ServiceHub</strong> <span>All Rights Reserved</span></p>
        </div>
        <div class="credits">

        </div>
    </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{asset('assets.portfolio/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets.portfolio/vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('assets.portfolio/vendor/aos/aos.js')}}"></script>
<script src="{{asset('assets.portfolio/vendor/typed.js/typed.umd.js')}}"></script>
<script src="{{asset('assets.portfolio/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('assets.portfolio/vendor/waypoints/noframework.waypoints.js')}}"></script>
<script src="{{asset('assets.portfolio/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets.portfolio/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('assets.portfolio/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets.portfolio/vendor/swiper/swiper-bundle.min.js')}}"></script>

<!-- Main JS File -->
<script src="{{asset('assets.portfolio/js/main.js')}}"></script>

</body>
</html>
