@extends('layout.baseview')
@section('title', 'Login')
@section('style')
    <style>
        .navbar-brand img {
            width: 60px;
        }

        .navbar-nav {
            align-items: center;
        }

        .navbar .navbar-nav .nav-link {
            font-size: 1.1em;
            padding: 0.5em 1em;
        }

        footer {
            background-color: #212529;
            color: #fff;
        }

        footer a {
            color: #f8f9fa;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        .section-title {
            font-weight: 700;
            color: #2c3e50;
        }

        .icon-style {
            font-size: 2rem;
            color: #0d6efd;
        }

        .team-card img {
            border-radius: 50%;
            object-fit: cover;
            height: 200px;
            width: 200px;
            margin: 0 auto;
        }

        @media screen and (min-width: 768px) {
            .navbar-brand img {
                width: 80px;
            }

            .navbar-brand {
                margin-right: 0;
                padding: 0 1em;
            }
        }
    </style>
@endsection
@section('content')

    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
                <div class="container-fluid">
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar1">
                        <i class="bi bi-list"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar1">
                        <div class="navbar-nav mx-auto text-black">
                            <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                            <a href="#" class="navbar-brand d-none d-md-block">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="Brand Logo">
                            </a>
                            @foreach($pages as $page)
                                <a href="{{ url('page/' . $page->slug) }}"
                                    class="nav-item nav-link text-black">{{ $page->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </nav>
            <div id="carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://dummyimage.com/1200x500/2c3e50/ffffff&text=Welcome+to+BookingPro"
                            class="d-block w-100" alt="Slide 1">
                    </div>
                    <div class="carousel-item">
                        <img src="https://dummyimage.com/1200x500/2980b9/ffffff&text=Effortless+Booking+Experience"
                            class="d-block w-100" alt="Slide 2">
                    </div>
                    <div class="carousel-item">
                        <img src="https://dummyimage.com/1200x500/16a085/ffffff&text=Trusted+by+Thousands"
                            class="d-block w-100" alt="Slide 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </header>
        <main class="m-5">
            <section class="container py-5" id="about-us">
                <h2 class="text-center section-title mb-4">Our Mission & Vision</h2>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <img src="https://dummyimage.com/600x400/0e76a8/fff&text=Our+Story" class="img-fluid rounded shadow"
                            alt="About Us">
                    </div>
                    <div class="col-md-6">
                        <p class="text-muted">At BookingPro, we believe simplicity breeds efficiency. We’re on a mission to
                            revolutionize the way people book and manage appointments — offering a seamless, secure, and
                            scalable platform tailored to businesses of every size.</p>
                        <p class="text-muted">From healthcare to hospitality, our vision is to be the most reliable digital
                            bridge between customers and service providers.</p>
                        <ul>
                            <li>Real-time booking analytics</li>
                            <li>Cross-platform accessibility</li>
                            <li>Customizable workflows</li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="container py-5" id="team">
                <h2 class="text-center section-title mb-4">Meet Our Visionary Team</h2>
                <div class="row text-center">
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow team-card">
                            <img src="https://dummyimage.com/300x300/111/fff&text=Alex" alt="Alex">
                            <div class="card-body">
                                <h5 class="card-title">Alex Ray</h5>
                                <p class="card-text">Co-Founder & CEO — Strategist passionate about intelligent automation
                                    and customer-first experiences.</p>
                                <div>
                                    <i class="bi bi-facebook mx-1"></i>
                                    <i class="bi bi-instagram mx-1"></i>
                                    <i class="bi bi-linkedin mx-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow team-card">
                            <img src="https://dummyimage.com/300x300/222/fff&text=Jamie" alt="Jamie">
                            <div class="card-body">
                                <h5 class="card-title">Jamie Lee</h5>
                                <p class="card-text">Lead Developer — Builds intuitive and high-performance systems with
                                    scalable architectures.</p>
                                <div>
                                    <i class="bi bi-facebook mx-1"></i>
                                    <i class="bi bi-instagram mx-1"></i>
                                    <i class="bi bi-linkedin mx-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow team-card">
                            <img src="https://dummyimage.com/300x300/333/fff&text=Sam" alt="Sam">
                            <div class="card-body">
                                <h5 class="card-title">Samira Khan</h5>
                                <p class="card-text">UI/UX Designer — Crafts digital experiences that delight users through
                                    beautiful design.</p>
                                <div>
                                    <i class="bi bi-facebook mx-1"></i>
                                    <i class="bi bi-instagram mx-1"></i>
                                    <i class="bi bi-linkedin mx-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="contact-section py-5 bg-light" id="contact">
                <div class="container">
                    <div class="text-center mb-5">
                        <h2 class="fw-bold">Get in Touch</h2>
                        <p class="text-muted">Have questions or feedback? We'd love to hear from you.</p>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <form action="{{ route('contact.submit') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Your Name</label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Your Message</label>
                                    <textarea name="message" class="form-control" id="message" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary px-4">Send Message</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="p-4 bg-white shadow rounded h-100">
                                <h5 class="fw-bold">Contact Information</h5>
                                <p><i class="bi bi-envelope"></i> support@bookingpro.com</p>
                                <p><i class="bi bi-phone"></i> +91 98765 43210</p>
                                <p><i class="bi bi-geo-alt"></i> 123 Booking Lane, New Delhi, India</p>
                                <div class="mt-3">
                                    <a href="#" class="text-decoration-none me-3"><i class="bi bi-facebook"></i></a>
                                    <a href="#" class="text-decoration-none me-3"><i class="bi bi-twitter-x"></i></a>
                                    <a href="#" class="text-decoration-none"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer class="bg-dark text-white pt-5 pb-3 mt-5">
            <div class="container">
                <div class="row">
                    <!-- Logo and Description -->
                    <div class="col-md-6 mb-4">
                        <div class="d-flex align-items-start">
                            <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="Logo"
                                class="bg-white p-1 rounded me-3">
                            <p>
                                BookingPro is a smart and secure platform designed to streamline your appointment,
                                reservation, and event management experience. Fast, reliable, and user-first.
                            </p>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-md-6 mb-4">
                        <h5>Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="#about-us" class="text-white text-decoration-none">About Us</a></li>
                            <li><a href="#team" class="text-white text-decoration-none">Our Team</a></li>
                            <li><a href="#contact" class="text-white text-decoration-none">Contact Us</a></li>
                            <li><a href="{{ url('/terms') }}" class="text-white text-decoration-none">Terms of Service</a>
                            </li>
                            <li><a href="{{ url('/privacy') }}" class="text-white text-decoration-none">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Footer Bottom -->
                <div class="row">
                    <div class="col text-center border-top pt-3">
                        <p class="mb-0">
                            &copy; {{ date('Y') }} BookingPro. All rights reserved. Powered by
                            <a href="#" class="text-white text-decoration-underline" target="_blank">Dhruv</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>

@endsection
    @section('customjs')
        <script>
        </script>
    @endsection