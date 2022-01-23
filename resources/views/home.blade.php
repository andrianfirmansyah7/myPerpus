<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="/css/style.css">
    <title>MyPerpus</title>
</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <div class="header-1">

        <a href="#" class="logo"> <i class="fas fa-book"></i> MyPerpus </a>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-shopping-cart"></a>
            <div id="login-btn" class="fas fa-user"></div>
        </div>

    </div>

    <div class="header-2">
        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#featured">New Arrivals</a>
            <a href="#arrivals">Books</a>
        </nav>
    </div>

</header>

<!-- header section ends -->


<!-- login form  -->

<div class="login-form-container">

    <div id="close-login-btn" class="fas fa-times"></div>

    <form method="POST" action="{{ route('login') }}">
      @csrf
        <h3>Login</h3>
        <span>Email</span>
        <input type="email" name="email" class="box" placeholder="enter your email" id="">
        <span>Password</span>
        <input type="password" name="password" class="box" placeholder="enter your password" id="">
        <div class="checkbox">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me"> remember me</label>
        </div>
        <input type="submit" value="Sign In" class="btns">
        <p>forget password ? <a href="#">click here</a></p>
        <p>don't have an account ? <a href="#">create one</a></p>
    </form>

</div>

<!-- home section starts  -->

<section class="home" id="home">

    <div class="row">

        <div class="content">
            <h3>MyPerpus</h3>
            <p>Fully online, Library integrated with delivery service. </p>
        </div>

    </div>

</section>

<!-- home section ense  -->

<!-- icons section starts  -->

<section class="icons-container">

    <div class="icons">
        <i class="fas fa-shipping-fast"></i>
        <div class="content">
            <h3>Deliver from Nearest Store!</h3>
            <p>with multiple services</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-redo-alt"></i>
        <div class="content">
            <h3>Easy returns</h3>
            <p>delivery or check in options</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-headset"></i>
        <div class="content">
            <h3>24/7 support</h3>
            <p>call us anytime</p>
        </div>
    </div>

</section>

<!-- icons section ends -->

<!-- arrival section starts  -->

<section class="featured" id="featured">

    <h1 class="heading"> <span>New Arrivals</span> </h1>

    <div class="swiper featured-slider">

        <div class="swiper-wrapper">

            @forelse($data as $dt)
            <div class="swiper-slide box">
                <div class="image">
                    <img src="/buku/cover/{{ $dt->cover_buku }}" alt="">
                </div>
                <div class="content">
                    <h3></h3>
                    <div class="price">{{ $dt->nama_buku }}</div>
                    <div class="price">{{ $dt->penulis }}</div>
                    <a href="/home/detailBook/{{ $dt->id }}" class="btn btn-primary">Pinjam</a>
                </div>
            </div>
            @empty
            Kosong
            @endforelse

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

</section>

<!-- arrival section ends -->

<!-- Books section starts  -->

<section class="arrivals" id="arrivals">

    <h1 class="heading"> <span>Books</span> </h1>

    <div class="swiper arrivals-slider">

        <div class="swiper-wrapper">
    @forelse ($dati as $d)

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="/buku/cover/{{ $d->cover_buku }}" alt="">
                </div>
                <div class="content">
                    <h3>{{ $d->nama_buku }}</h3>
                    <div class="price">{{ $d->penulis }}</div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>
    @empty
    Kosong
    @endforelse
        </div>

    </div>
</section>

<!-- arrivals section ends -->


<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>our locations</h3>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Bekasi </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Bandung </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Medan </a>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="#"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> featured </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> arrivals </a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#"> <i class="fas fa-arrow-right"></i> account info </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> ordered items </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> our serivces </a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#"> <i class="fas fa-phone"></i> +621-985-9310 </a>
            <a href="#"> <i class="fas fa-phone"></i> +621-529-2391 </a>
            <a href="#"> <i class="fas fa-envelope"></i> myPerpus@gmail.com </a>
        </div>
        
    </div>

    <div class="share">
    </div>

</section>

<!-- footer section ends -->

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>