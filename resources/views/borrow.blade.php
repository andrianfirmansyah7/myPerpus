<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="/css/style.css">
    <title>MyPerpus</title>
    <style type="text/css">
        table{
            font-size: 10px;
        }
    </style>
</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <div class="header-1">

        <a href="/" class="logo"> <i class="fas fa-book"></i> MyPerpus </a>

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
        <input type="submit" value="Sign In" class="btn">
        <p>forget password ? <a href="#">click here</a></p>
        <p>don't have an account ? <a href="#">create one</a></p>
    </form>

</div>

<!-- home section starts  -->
    <div class="container">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Nama Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Batas Akhir</th>
                <th>Keterangan</th>
            </tr>
        <?php $i = 1 ?>
        @forelse($data as $dt)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $dt->buku }}</td>
                <td>{{ $dt->awal_peminjaman }}</td>
                <td>{{ $dt->akhir_peminjaman }}</td>
                <td>
                    <?php
                    if($dt->status == "Belum ACC"){
                    ?>
                    <label class="btn btn-warning">{{ $dt->status }}</label>
                <?php }else if($dt->status == "Peminjaman Diterima"){ ?>
                    <a href="/member/readBook/{{ $dt->id }}">Baca Buku</a>
                <?php } ?>    
                </td>
            </tr>    

        @empty
        Kosong        
        @endforelse
        </table>
        </div>
</div>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>