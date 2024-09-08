@include('components.guestvisibility')
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
        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
    </div>

    <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i>Home</a></li>
            <li><a href="#about"><i class="bi bi-person navicon"></i> About</a></li>
            <li><a href="#resume"><i class="bi bi-file-earmark-text navicon"></i> Resume</a></li>
            <li><a href="#portfolio"><i class="bi bi-images navicon"></i> Portfolio</a></li>
            <li><a href="#testimonials"><i class="bi bi-hdd-stack navicon"></i> Services</a></li>
            <li><a href="#contact"><i class="bi bi-envelope navicon"></i> Message</a></li>
            <li><a href="{{ url('/bookings/portfolio')}}"><i class="bi bi-arrow-left-circle navicon"></i> Back</a></li>
        </ul>
    </nav>

</header>
<main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
        <img src="{{ asset('storage/' . $portfolio->profile_bg_path) }}" alt="" data-aos="fade-in" class="">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <h2>{{ ucfirst(get_service_providers()->where('id', $portfolio->service_provider_id)->first()->name)}}</h2>
            <p>I'm <span class="typed" data-typed-items="{{ ucfirst(get_categories()->where('id', $portfolio->category_id)->first()->name)}}, Professional, Freelancer, An Expert"></span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>About</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4 justify-content-center">
                <div class="col-lg-4">
                    <img src="assets.portfolio/img/my-profile-img.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 content">
                    <h2>UI/UX Designer &amp; Web Developer.</h2>
                    <p class="fst-italic py-3">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua.
                    </p>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>1 May 1995</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>www.example.com</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>+123 456 7890</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>New York, USA</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>30</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>Master</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>email@example.com</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span></li>
                            </ul>
                        </div>
                    </div>
                    <p class="py-3">
                        Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
                        Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque.
                    </p>
                </div>
            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item">
                        <i class="bi bi-emoji-smile"></i>
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>Happy Clients</strong> <span>consequuntur quae</span></p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item">
                        <i class="bi bi-journal-richtext"></i>
                        <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>Projects</strong> <span>adipisci atque cum quia aut</span></p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item">
                        <i class="bi bi-headset"></i>
                        <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>Hours Of Support</strong> <span>aut commodi quaerat</span></p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item">
                        <i class="bi bi-people"></i>
                        <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>Hard Workers</strong> <span>rerum asperiores dolor</span></p>
                    </div>
                </div><!-- End Stats Item -->

            </div>

        </div>

    </section><!-- /Stats Section -->

    <!-- Skills Section -->
    <section id="skills" class="skills section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Skills</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row skills-content skills-animation">

                <div class="col-lg-6">

                    <div class="progress">
                        <span class="skill"><span>HTML</span> <i class="val">100%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div><!-- End Skills Item -->

                    <div class="progress">
                        <span class="skill"><span>CSS</span> <i class="val">90%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div><!-- End Skills Item -->

                    <div class="progress">
                        <span class="skill"><span>JavaScript</span> <i class="val">75%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div><!-- End Skills Item -->

                </div>

                <div class="col-lg-6">

                    <div class="progress">
                        <span class="skill"><span>PHP</span> <i class="val">80%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div><!-- End Skills Item -->

                    <div class="progress">
                        <span class="skill"><span>WordPress/CMS</span> <i class="val">90%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div><!-- End Skills Item -->

                    <div class="progress">
                        <span class="skill"><span>Photoshop</span> <i class="val">55%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div><!-- End Skills Item -->

                </div>

            </div>

        </div>

    </section><!-- /Skills Section -->

    <!-- Resume Section -->
    <section id="resume" class="resume section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Resume</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row">
                <iframe src="{{ $mediaItems2 }}" width="100%" height="600px">
                    This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset('path/to/your/file.pdf') }}">Download PDF</a>
                </iframe>


                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="resume-title">Sumary</h3>

                    <div class="resume-item pb-0">
                        <h4>Brandon Johnson</h4>
                        <p><em>Innovative and deadline-driven Graphic Designer with 3+ years of experience designing and developing user-centered digital/print marketing material from initial concept to final, polished deliverable.</em></p>
                        <ul>
                            <li>Portland par 127,Orlando, FL</li>
                            <li>(123) 456-7891</li>
                            <li>alice.barkley@example.com</li>
                        </ul>
                    </div><!-- Edn Resume Item -->

                    <h3 class="resume-title">Education</h3>
                    <div class="resume-item">
                        <h4>Master of Fine Arts &amp; Graphic Design</h4>
                        <h5>2015 - 2016</h5>
                        <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
                        <p>Qui deserunt veniam. Et sed aliquam labore tempore sed quisquam iusto autem sit. Ea vero voluptatum qui ut dignissimos deleniti nerada porti sand markend</p>
                    </div><!-- Edn Resume Item -->

                    <div class="resume-item">
                        <h4>Bachelor of Fine Arts &amp; Graphic Design</h4>
                        <h5>2010 - 2014</h5>
                        <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
                        <p>Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis et quis Eius vel ratione eius unde vitae rerum voluptates asperiores voluptatem Earum molestiae consequatur neque etlon sader mart dila</p>
                    </div><!-- Edn Resume Item -->

                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="resume-title">Professional Experience</h3>
                    <div class="resume-item">
                        <h4>Senior graphic design specialist</h4>
                        <h5>2019 - Present</h5>
                        <p><em>Experion, New York, NY </em></p>
                        <ul>
                            <li>Lead in the design, development, and implementation of the graphic, layout, and production communication materials</li>
                            <li>Delegate tasks to the 7 members of the design team and provide counsel on all aspects of the project. </li>
                            <li>Supervise the assessment of all graphic materials in order to ensure quality and accuracy of the design</li>
                            <li>Oversee the efficient use of production project budgets ranging from $2,000 - $25,000</li>
                        </ul>
                    </div><!-- Edn Resume Item -->

                    <div class="resume-item">
                        <h4>Graphic design specialist</h4>
                        <h5>2017 - 2018</h5>
                        <p><em>Stepping Stone Advertising, New York, NY</em></p>
                        <ul>
                            <li>Developed numerous marketing programs (logos, brochures,infographics, presentations, and advertisements).</li>
                            <li>Managed up to 5 projects or tasks at a given time while under pressure</li>
                            <li>Recommended and consulted with clients on the most appropriate graphic design</li>
                            <li>Created 4+ design presentations and proposals a month for clients and account managers</li>
                        </ul>
                    </div><!-- Edn Resume Item -->

                </div>

            </div>

        </div>

    </section><!-- /Resume Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-product">Product</li>
                    <li data-filter=".filter-branding">Branding</li>
                    <li data-filter=".filter-books">Books</li>
                </ul><!-- End Portfolio Filters -->
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
{{--                                    <!-- Link to more details -->--}}
{{--                                    <a href="{{ route('portfolio.details', ['id' => $media->id]) }}" title="More Details" class="details-link">--}}
{{--                                        <i class="bi bi-link-45deg"></i>--}}
{{--                                    </a>--}}
                                </div>
                            </div>
                        </div><!-- End Portfolio Item -->
                    @endforeach
                </div><!-- End Portfolio Container -->
            </div>

        </div>

    </section><!-- /Portfolio Section -->

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
                        "delay": 5000
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
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                            <img src="assets.portfolio/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                            <h3>Saul Goodman</h3>
                            <h4>Ceo &amp; Founder</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                            <img src="assets.portfolio/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                            <h3>Sara Wilsson</h3>
                            <h4>Designer</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                            <img src="assets.portfolio/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                            <h3>Jena Karlis</h3>
                            <h4>Store Owner</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                            <img src="assets.portfolio/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                            <h3>Matt Brandon</h3>
                            <h4>Freelancer</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                            <img src="assets.portfolio/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                            <h3>John Larson</h3>
                            <h4>Entrepreneur</h4>
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
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-5">
                    <div class="text-center">
                        <a href="{{ route('chat.show', ['chat' => $chats->first()->id]) }}">
                            <button type="submit" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-2xl border border-transparent bg-black text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Message</button>
                        </a>
                    </div>

                </div>
                <div class="col-lg-7">
                    <!-- End Card Blog -->
                    <div class="text-center">
                        <form action="{{ route('bookings.book') }}" method="GET">
                            <button type="submit" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-2xl border border-transparent bg-black text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Book Now
                            </button>
                        </form>
                    </div>
                </div><!-- End Contact Form -->
            </div>
        </div>
    </section><!-- /Contact Section -->
</main><!-- End #main -->
<footer id="footer" class="footer position-relative light-background">

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
