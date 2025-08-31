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
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
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
        </header>

        <main class="m-5">
            {!! isset($data->html) ? $data->html : 'Page Not Found' !!}
        </main>

        <footer class="pt-4 pb-3 mt-5">
            <div class="container">
                <div class="row">
                    <!-- Branding -->
                    <div class="col-md-4 mb-4">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" height="40"
                            class="bg-white p-1 rounded">
                        <p class="mt-2">BookingPro – Your trusted platform for efficient booking and scheduling management.
                        </p>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-md-4 mb-4">
                        <h6>Quick Links</h6>
                        <ul class="list-unstyled">
                            <li><a href="{{ url('/about') }}">About Us</a></li>
                            <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                            <li><a href="{{ url('/terms') }}">Terms of Service</a></li>
                            <li><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div class="col-md-4 mb-4">
                        <h6>Contact</h6>
                        <p>Email: support@bookingpro.com</p>
                        <p>Phone: +91-98765-43210</p>
                        <p>Address: 123 Tech Street, New Delhi, India</p>
                    </div>
                </div>

                <div class="text-center pt-3 border-top border-secondary mt-3">
                    <small>&copy; {{ date('Y') }} BookingPro. All rights reserved. Powered by <a href="https://1stop.ai"
                            target="_blank">1Stop.ai</a></small>
                </div>
            </div>
        </footer>
@endsection

    @section('customjs')
        <script>
            // Custom JS if needed
        </script>
    @endsection