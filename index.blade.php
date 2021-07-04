<?php 
use App\Http\Controllers\ProductController;
Session();
$totalItems = 0;
if(Session()->has('user')) {
  $totalItems = ProductController::itemsInCart(); 
}

/*
$expireTime = time() + 60 * 60 * 24; // 24 hours
if(!empty($_POST["RememberMe"])) {
	setcookie ("username", $_POST["username"], $expireTime);
	setcookie ("password",$_POST["password"], $expireTime);
	echo "Cookies Set Successfuly";

} else {
	echo '<script type="text/JavaScript">
        alert("FAILED :(");
      </script>';
}
*/

/* 
$cookie_value = Session()->get('user')['user_name'];
$cookie_name = "User";
$expireTime = time() + 60 * 60 * 24; // 24 hours
setcookie($cookie_name, $cookie_value, $expireTime, '/home');

// retrieve the cookie
$cookie = $_COOKIE[$cookie_name] . " is logged in!";
echo '<script type="text/JavaScript">
        var cookie = "'.$cookie.'"
        alert(cookie);
      </script>';
*/
?>

@extends('Layouts.header')

@section('title', 'Home')

@section('content')

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/styles.css">
  
@endsection


<body>

  <!-- Nav Bar -->
  <section class="colored-section" id="title">

    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand brand btn-link logo-link" href="/home">eCommerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link"
                href="/home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"
                href="/about">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/products">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link cart-count" href="/cart">
                @if($totalItems == 0)
                  Cart <span></span>  
                @else
                  Cart <span class= "badge bg-danger">{{$totalItems}}</span>
                @endif
              </a>
            </li>
              @if(Session()->has('user'))
                <div class="dropdown">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{Session()->get('user')['first_name'] . " " . Session()->get('user')['last_name']}}
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
                </div>
              @else
                <li class="nav-item">
                  <a class="nav-link" href="/login">Login</a>
                </li>
              @endif
          </ul>
        </div>
      </nav>

      <!-- Title -->

      <div class="row">
        <div class="col-lg-6">
          <h1 class="main-heading">Welcome to our shop</h1>
          <button class="btn btn-dark btn-lg nav-btn" type="button"><i class="fas fa-shopping-cart"></i>
            <a class="btn-link" href="/products">Buy Now</a>
          </button>
          <button class="btn btn-outline-light btn-lg nav-btn" type="button"><i class="fab fa-contao"></i>
            <a class="btn-link" href="/contact">Contact Us</a>
          </button>
        </div>
        <div class="col-lg-6">
          <img class="title-img" src="images/drone.png" alt="drone-mockup">
        </div>
      </div>

    </div>

  </section>

  <!-- Features -->
  <section class="white-section" id="features">

    <div class="container-fluid">
      <div class="row">
        <h1 id="features-heading">Why Choose Us</h1>
        <div class="feature-box col-lg-4">
          <i class="fas fa-truck fa-4x icon-2"></i>
          <h3 class="feature-title">Fast Delivery</h3>
          <p>variations of passages of Lorem Ipsum available</p>
        </div>

        <div class="feature-box col-lg-4">
          <i class="fas fa-dolly-flatbed fa-4x icon-2"></i>
          <h3 class="feature-title">Free Shipping</h3>
          <p>variations of passages of Lorem Ipsum available</p>
        </div>

        <div class="feature-box col-lg-4">
          <i class="fas fa-thumbs-up fa-4x icon-2"></i>
          <h3 class="feature-title">Best Quality</h3> 
          <p>variations of passages of Lorem Ipsum available</p>
        </div>
      </div>
    </div>

    <!-- <h3><i class="fas fa-check-circle"></i><br>Easy to use.</h3>
    <p>So easy to use, even your dog could do it.</p>

    <h3><i class="fas fa-bullseye"></i><br>Elite Clientele</h3>
    <p>We have all the dogs, the greatest dogs.</p>

    <h3><i class="fas fa-heart"></i><br>Guaranteed to work.</h3>
    <p>Find the love of your dog's life or your money back.</p> -->

  </section>

  <!-- Testimonials -->

  <section class="colored-section" id="testimonials">

    <div id="testimonial-carousel" class="carousel slide" data-ride="false">
      <div class="carousel-inner">
        <div class="carousel-item active container-fluid">
          <h2 class="testimonial-text">Consectetur minim tempor magna aute dolor consectetur. Reprehenderit reprehenderit</h2>
          <img class="testimonial-img" src="images/client.jpg" alt="profile">
          <em>John, New York</em>
        </div>
        <div class="carousel-item container-fluid">
          <h2 class="testimonial-text">Consectetur minim tempor magna aute dolor consectetur. Reprehenderit reprehenderit</h2>
          <img class="testimonial-img" src="images/lady-img.jpg" alt="lady-profile">
          <em>Beverly, Illinois</em>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#testimonial-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#testimonial-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>

  </section>

  <!-- Products -->

  <section id="pricing">

    <h2 class="section-heading">Our Products</h2>

    <!-- Products using bootstrap cards-->
    <div class="row">

      @foreach($products as $product)
      <div class="pricing-column col-lg-4 col-md-6">
        <div class="card mb-3 text-center">
            <img class="product-image" src="{{$product["image"]}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h2 class="card-title product-text">{{$product["name"]}}</h2>
              <h3 class="card-title price-text">$ {{$product["price"]}}</h3>
              <p class="card-text">{{$product["description"]}}</p>

              {{--  this form is used to add data to the cart  --}}
              <form action="/home/{{$product['id']}}" method="POST" >
			  	      @csrf
			  	      <input type="hidden", name="product_id", value="{{$product["id"]}}">
                <button class="btn btn-outline-dark col-12 mx-auto btn-large" onclick="disable(this)" type="submit">
                  <a class="btn-link">Buy Now</a>
                </button>
              </form>

            </div>
        </div>
      </div>
      @endforeach

      {{--  <div class="pricing-column col-lg-4 col-md-6">
        <div class="card mb-3 text-center">
          <img class="product-image" src="\images\p8.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h2 class="card-title product-text">Product Name</h2>
            <h3 class="card-title price-text">Rs. 999</h3>
            <p class="card-text">Lorem Ipsum Lorem Ipsum Lorem</p>
            <!-- <p><br></p> -->
            <button class="btn btn-outline-dark col-12 mx-auto btn-large" onclick="disable(this)" type="button">
              <a class="btn-link">Buy Now</a>
            </button>
          </div>
        </div>
      </div>

      <div class="pricing-column col-lg-4 col-md-12">
        <div class="card mb-3 text-center">
          <img class="product-image" src="\images\drone.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h2 class="card-title product-text">Product Name</h2>
            <h3 class="card-title price-text">Rs. 999</h3>
            <p class="card-text">Lorem Ipsum Lorem Ipsum Lorem</p>
            <button class="btn btn-outline-dark col-12 mx-auto btn-large" onclick="disable(this)" type="button">
              <a class="btn-link">Buy Now</a>
            </button>
          </div>
        </div>
      </div>

      <div class="pricing-column col-lg-4 col-md-6">
        <div class="card mb-3 text-center">
          <img class="product-image" src="\images\p3.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h2 class="card-title product-text">Product Name</h2>
            <h3 class="card-title price-text">Rs. 999</h3>
            <p class="card-text">Lorem Ipsum Lorem Ipsum Lorem</p>
            <!-- <p><br></p> -->
            <button class="btn btn-outline-dark col-12 mx-auto btn-large" onclick="disable(this)" type="button">
              <a class="btn-link" >Buy Now</a>
            </button>
          </div>
        </div>
      </div>

      <div class="pricing-column col-lg-4 col-md-6">
        <div class="card mb-3 text-center">
          <img class="product-image" src="\images\p4.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h2 class="card-title product-text">Product Name</h2>
            <h3 class="card-title price-text">Rs. 999</h3>
            <p class="card-text">Lorem Ipsum Lorem Ipsum Lorem</p>
            <!-- <p><br></p> -->
            <button class="btn btn-outline-dark col-12 mx-auto btn-large" onclick="disable(this)" type="button">
              <a class="btn-link" >Buy Now</a>
            </button>
          </div>
        </div>
      </div>

      <div class="pricing-column col-lg-4 col-md-6">
        <div class="card mb-3 text-center">
          <img class="product-image" src="\images\p7.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h2 class="card-title product-text">Product Name</h2>
            <h3 class="card-title price-text">Rs. 999</h3>
            <p class="card-text">Lorem Ipsum Lorem Ipsum Lorem</p>
            <!-- <p><br></p> -->
            <button class="btn btn-outline-dark col-12 mx-auto btn-large" onclick="disable(this)" type="button">
              <a class="btn-link">Buy Now</a>
            </button>
          </div>
        </div>
      </div>  --}}

    </div>

  </section>

  <section class="colored-section">

    <div class="container-fluid" id="cta">
      <h3 class="main-heading">Find the best of the best</h3>
      <button class="btn-btn btn btn-dark btn-lg" type="button"><i class="fas fa-shopping-cart"></i> 
        <a class="btn-link" href="/products">Buy Now</a>
      </button>
      <button class="btn-btn btn btn-light btn-lg" type="button"><i class="fab fa-contao"></i> 
        <a class="btn-link" href="/contact">Contact Us</a>
      </button>
    </div>

  </section>


  @extends('Layouts.footer')

  {{-- <script src="{{asset('/js/index.js')}}"></script> --}}
  
</body>
</html>

