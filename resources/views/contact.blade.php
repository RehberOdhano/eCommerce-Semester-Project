<?php
use App\Http\Controllers\ProductController;
Session();
$totalItems = 0;
if (Session()->has('user')) {
    $totalItems = ProductController::itemsInCart();
}
?>

@extends('Layouts.header')

@section('title', 'Contact Us')

@section('content')

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/contact-us.css">
    <script src="https://maps.googleapis.com/maps/api/js?{{ env('API_KEY') }}&callback=myMap"></script>

@endsection

<body>

    <!-- Nav Bar -->
    <section class="colored-section" id="title">

        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand brand btn-link" href="/home">eCommerce</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/products">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cart-count" href="/cart">
                                @if ($totalItems == 0)
                                    Cart <span></span>
                                @else
                                    Cart <span class="badge bg-danger">{{ $totalItems }}</span>
                                @endif
                            </a>
                        </li>
                        @if (Session()->has('user'))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Session()->get('user')['first_name'] . ' ' . Session()->get('user')['last_name'] }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li class="my_nav_item">
                                        <a class="dropdown-item my_nav_item_text" href="/profile">Profile</a>
                                    </li>
                                    <li class="my_nav_item">
                                        <a class="dropdown-item my_nav_item_text" href="/logout">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Login</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>

    </section>

    <!-- Contact Us -->
    <section class="white-section">

        <div class="container">

            <div class="contact-form">
                <h1 class="title">Contact Us</h1>
                <h2 class="subtitle">If you've any query, then don't hesitate to contact us.</h2>

                <form action="/msg_sent" method="POST">

                    @csrf
                    <input type="text" name="name" placeholder="Your Name" onkeyup="validate(this)">
                    <input type="email" name="email" placeholder="Your E-mail Adress" onkeyup="validate(this)">
                    <input type="tel" name="phone" placeholder="Your Phone Number" onkeyup="validate(this)">

                    <textarea name="text" id="message" rows="8" placeholder="Your Message"></textarea>
                    <p id="num_of_chars"> out of 150</p>
                    <button class="btn btn-primary btn-send" type="submit">Send Message</button>
                </form>

            </div>

        </div>

        <div class="container-fluid">
            {{-- <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3321.20590545812!2d73.15440461466193!3d33.65182628071686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38dfea4aee5bdf8f%3A0xe6b55e05d462beb1!2sCOMSATS%20University%20Islamabad!5e0!3m2!1sen!2s!4v1622454855994!5m2!1sen!2s"
                    width="100%" height="650px" frameborder="0" style="border:0" allowfullscreen>
                </iframe>
            </div> --}}
            <div id="googleMap" style="width:100%; height:700px;"></div>
        </div>

    </section>

    <!-- Footer -->

    <footer class="white-section" id="footer">

        <div class="container-fluid">
            <span><a class="social-link" href="https://twitter.com/?lang=en"><i
                        class="fab fa-twitter fa-2x icon-3"></i></a></span>
            <span><a class="social-link" href="https://www.facebook.com/"><i
                        class="fab fa-facebook-f fa-2x icon-3"></i></a></span>
            <span><a class="social-link" href="https://www.instagram.com/"><i
                        class="fab fa-instagram fa-2x icon-3"></i></a></span>
            <span><a class="social-link"
                    href="https://accounts.google.com/signin/v2/identifier?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin"><i
                        class="fas fa-envelope fa-2x icon-3"></i></a></span>
            <br><br><br><br>

            <span>
                <a class="links" href="/index.html">Home</a>
                <a class="links" href="/about-us.html">About Us</a>
                <a class="links" href="/products.html">Products</a>
                <a class="links" href="/Contact.html">Contact</a>
            </span>

            <br><br><br>
        </div>

    </footer>

    <script src="{{ asset('/js/contact.js') }}"></script>
    <script src="{{ asset('/js/map_api.js') }}"></script>
</body>

</html>
