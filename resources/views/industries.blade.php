<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Johnny Alimoot C.">
    <!-- DESCRIPTION OF THE PAGE -->
    <meta name="description" content="Free corporate web template by JACode - Johnny Alimoot C">
    
    <!-- KEYWORDS OF THE PAGE TO HELP SEARCH ENGINE -->
    <meta name="keywords" content="HTML, CSS, Blue, Rounded, Modern, Nice">

    <!-- OG IMAGE IS THE IMAGE SHOWN WHEN YOUR WEBSITE LINK IS SHARED ON SOCIAL MEDIA -->
    <meta property="og:image" content="{{ asset('art/og-card.png') }}">
    <meta property="og:title" content="Roundazzle | Industries">
    <meta name="twitter:card" content="summary_large_image">

    <!-- THE TITLE OF THE PAGE -->
    <title>Roundazzle | Industries</title>

    {{--
        ⚡ Bolt Optimization: Preload LCP image.
    --}}
    <link rel="preload" as="image" href="{{ asset('art/hero2.webp') }}">

    {{--
        ⚡ Bolt Optimization: Preload critical fonts to prevent FOUT.
        These fonts are used in the hero section and throughout the page.
    --}}
    <link rel="preload" href="{{ asset('font/Damion.ttf') }}" as="font" type="font/ttf" crossorigin>
    <link rel="preload" href="{{ asset('font/Nunito-Regular.ttf') }}" as="font" type="font/ttf" crossorigin>
    <link rel="preload" href="{{ asset('icons/fonts/bootstrap-icons.woff2') }}?1fa40e8900654d2863d011707b9fb6f2" as="font" type="font/woff2" crossorigin>

    <link rel="preload" href="{{ asset('icons/bootstrap-icons.css') }}" as="style">
    <link rel="preload" href="{{ asset('css/fontstyle.css') }}" as="style">
    <link rel="preload" href="{{ asset('css/layout.css') }}" as="style">
    <link rel="preload" href="{{ asset('css/animation.css') }}" as="style">
    <link rel="preload" href="{{ asset('css/style.css') }}" as="style">

    <link rel="stylesheet" href="{{ asset('icons/bootstrap-icons.css') }}" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="{{ asset('icons/bootstrap-icons.css') }}"></noscript>

    {{-- ⚡ Bolt Optimization: Load non-critical CSS asynchronously --}}
    <link rel="stylesheet" href="{{ asset('css/fontstyle.css') }}" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="{{ asset('css/fontstyle.css') }}"></noscript>

    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">

    <link rel="stylesheet" href="{{ asset('css/animation.css') }}" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="{{ asset('css/animation.css') }}"></noscript>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('art/favicon.png') }}">
</head>
<body>
    <a href="#main-content" class="skip-link">Pular para o conteúdo principal</a>
    <!-- FADE OUT ANIMATION WHEN LOADED -->
    <span class="fade"></span>
    <main id="main-content">
        <!-- SUB HERO BANNER START -->
        <section class="sub-hero-banner sub-hero-bg-industries">
            <div class="hero-contained">
                <div class="hero-title fc-white">
                    <h1 class="ff-damion">Roundazzle | Industries</h1>
                    <a href="index.html" class="fc-white">
                        Home
                    </a>
                    <i aria-hidden="true" class="bi bi-chevron-right"></i>
                    <a href="#" class="fc-white">
                        Industries
                    </a>
                </div>
            </div>
            <div class="hero-socials">
                <a href="#" class="mt-a icon-link" aria-label="Follow us on facebook">
                    <i aria-hidden="true" class="bi bi-facebook"></i>
                </a>
                <a href="#" class="icon-link mt-10" aria-label="Follow us on instagram">
                    <i aria-hidden="true" class="bi bi-instagram"></i>
                </a>
                <a href="#" class="icon-link mt-10" aria-label="Follow us on twitter">
                    <i aria-hidden="true" class="bi bi-twitter"></i>
                </a>
                <a href="#" class="icon-link mt-10" aria-label="Follow us on youtube">
                    <i aria-hidden="true" class="bi bi-youtube"></i>
                </a>
            </div>
        </section>
        <!-- SUB HERO BANNER END -->

        <!-- NAVIGATION START -->
        <nav>
            <div class="contained">
                <a href="index.html" class="logo fc-primary ff-damion row flex-alig-center">
                    <span class="fs-h2">Roundazzle</span>
                </a>
                <input type="checkbox" name="tablet-mobile-menu" class="tab-mob-menu" aria-label="tablet and mobile menu">
                <div class="navigation-container">
                    <a href="index.html">Home</a>
                    <a href="about.html">About</a>
                    <a href="service.html">Service</a>
                    <a href="industries.html">Industries</a>
                    <a href="blog/blog.html">Blog</a>
                    <a href="career/career.html">Career</a>
                    <a href="contact.html" class="btn-bg1 border-round">Contact Us</a>
                </div>
            </div>
        </nav>
        <!-- NAVIGATION END -->

        <section class="contained">
            <h2 class="section-title ff-damion">Industries</h2>

            <div class="row flex-alig-center mt-50">
                <div class="col-balance">
                    <img loading="lazy" src="{{ asset('art/work1.webp') }}" width="640" height="427" alt="">
                </div>
                <div class="col-balance">
                    <span class="fc-primary fs-h3">Business Process</span>
                    <p>
                        We've broken down the process into small, manageable pieces, much like the image you 
                        see. By chopping the process into smaller parts, we adopt a 'divide and conquer' approach. 
                        You might wonder, 'What is this text, and why am I writing a bunch of text explaining a process?
                    </p>
                    <p>
                        Well, the purpose is simple. This serves as a placeholder text for the template, enhancing its
                        visual appeal even though it lacks any meaningful content."
                    </p>
                </div>
            </div>

            <div class="row flex-alig-center mt-50">
                <div class="col-balance">
                    <span class="fc-primary fs-h3">Cloud Computing</span>
                    <p>
                        See that sea shells over there? We utilize cloud to compute how many sea shells she sells
                        by the sea shores, and cloud is really ok with that. The only time we don't bother cloud
                        to do some computations is when it has a storm brewing.
                    </p>
                    <ul>
                        <li>
                            I am a bulleted text.
                        </li>
                        <li>
                            I need more bullets.
                        </li>
                        <li>
                            Here's some bullets.
                        </li>
                    </ul>
                </div>
                <div class="col-balance order-tab-1">
                    <img loading="lazy" src="{{ asset('art/work3.webp') }}" width="640" height="427" alt="">
                </div>
            </div>

            <div class="row flex-alig-center mt-50">
                <div class="col-balance">
                    <img loading="lazy" src="{{ asset('art/work2.webp') }}" width="640" height="427" alt="">
                </div>
                <div class="col-balance">
                    <span class="fc-primary fs-h3">Retail</span>
                    <p>
                        We've broken down the process into small, manageable pieces, much like the image you 
                        see. By chopping the process into smaller parts, we adopt a 'divide and conquer' approach. 
                        You might wonder, 'What is this text, and why am I writing a bunch of text explaining a process?
                    </p>
                    <ul>
                        <li>
                            I am a bulleted text.
                        </li>
                        <li>
                            I need more bullets.
                        </li>
                        <li>
                            Here's some bullets.
                        </li>
                        <li>
                            Plan plan plan.
                        </li>
                    </ul>
                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER START -->
    <footer class="fc-white">
        <div class="contained row flex-just-center">

            <!-- FOOTER WEBSITE MOTO START -->
            <div class="col-quad">
                <h3 class="ff-damion">Roundazzle</h3>
                <p>
                    Our mission is your vision and your mission is to tell
                    us your vision, so that what you envision will become our mission.
                </p>
                <p>
                    We are a placeholder text and yes we are aware of that. We have generated self awareness ever since
                    the beginning of time and space.
                </p>
            </div>
            <!-- FOOTER WEBSITE MOTO END -->

            <!-- FOOTER QUICK CONTACT START -->
            <div class="col-quad">
                <h3 class="ff-damion">Get in touch</h3>
                <a href="#" class="display-block fc-white icon-link mt-10 mb-10">
                    <i aria-hidden="true" class="bi bi-envelope-fill"></i>
                    nonexistentadd@gmail.com
                </a>
                <a href="#" class="display-block fc-white icon-link mt-10 mb-10">
                    <i aria-hidden="true" class="bi bi-telephone-fill"></i>
                    +639123456789
                </a>
                <a href="#" class="display-block fc-white icon-link mt-10 mb-10">
                    <i aria-hidden="true" class="bi bi-geo-alt-fill"></i>
                    20th street, Dreamland
                </a>
                <a href="#" class="display-inblock fc-white icon-link mt-20" aria-label="Follow on facebook">
                    <i aria-hidden="true" class="bi bi-facebook"></i>
                </a>
                <a href="#" class="display-inblock fc-white icon-link" aria-label="Follow on instagram">
                    <i aria-hidden="true" class="bi bi-instagram"></i>
                </a>
                <a href="#" class="display-inblock fc-white icon-link" aria-label="Follow on twitter">
                    <i aria-hidden="true" class="bi bi-twitter"></i>
                </a>
                <a href="#" class="display-inblock fc-white icon-link" aria-label="Follow on youtube">
                    <i aria-hidden="true" class="bi bi-youtube"></i>
                </a>
            </div>
            <!-- FOOTER QUICK CONTACT END -->
            
            <!-- FOOTER SCHEDULE START -->
            <div class="col-quad">
                <h3 class="ff-damion">Opening hours</h3>
                <p class="mt-10 mb-10 fw-bold">
                    Monday - Friday:
                    <span class="fw-normal display-block">Closed</span>
                </p>
                <p class="mt-10 mb-10 fw-bold">
                    Saturday:
                    <span class="fw-normal display-block">8:00 - 8:01</span>
                </p>
                <p class="mt-10 mb-10 fw-bold">
                    Sunday:
                    <span class="fw-normal display-block">10:00 - 10:01</span>
                </p>
            </div>
            <!-- FOOTER SCHEDULE END -->
            
            <!-- FOOTER USEFUL LINKS START -->
            <div class="col-quad">
                <h3 class="ff-damion">Useful Links</h3>
                <a href="index.html" class="display-block fc-white mt-5 mb-5">
                    <i aria-hidden="true" class="bi bi-chevron-compact-right"></i>
                    Home
                </a>
                <a href="about.html" class="display-block fc-white mt-5 mb-5">
                    <i aria-hidden="true" class="bi bi-chevron-compact-right"></i>
                    About
                </a>
                <a href="service.html" class="display-block fc-white mt-5 mb-5">
                    <i aria-hidden="true" class="bi bi-chevron-compact-right"></i>
                    Service
                </a>
                <a href="industries.html" class="display-block fc-white mt-5 mb-5">
                    <i aria-hidden="true" class="bi bi-chevron-compact-right"></i>
                    Industries
                </a>
                <a href="blog/blog.html" class="display-block fc-white mt-5 mb-5">
                    <i aria-hidden="true" class="bi bi-chevron-compact-right"></i>
                    Blog
                </a>
                <a href="career/career.html" class="display-block fc-white mt-5 mb-5">
                    <i aria-hidden="true" class="bi bi-chevron-compact-right"></i>
                    Career
                </a>
                <a href="contact.html" class="display-block fc-white mt-5 mb-5">
                    <i aria-hidden="true" class="bi bi-chevron-compact-right"></i>
                    Contact
                </a>
            </div>
            <!-- FOOTER USEFUL LINKS END -->
            
        </div>
        <div class="copy ta-center fc-white">
            <small>&copy; Your site - Copyright 2023</small>
        </div>
    </footer>
    <!-- FOOTER END -->

</body>
</html>