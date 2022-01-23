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
        <input type="submit" value="Sign In" class="btn">
        <p>forget password ? <a href="#">click here</a></p>
        <p>don't have an account ? <a href="#">create one</a></p>
    </form>

</div>

<!-- home section starts  -->

        @forelse($data as $dt)
        <div class="container" width="75%">
                  <center>
        <div class="form-group">    
                  <img src="/buku/cover/{{ $dt->cover_buku }}" alt="">
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">Nama Buku</label>
                  <p class="judul">{{ $dt->nama_buku }}</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Penulis
                  </label>
                  <p class="judul">{{ $dt->penulis }}</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Penerbit
                  </label>
                  <p class="judul">{{ $dt->penerbit }}</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Jumlah Halaman
                  </label>
                  <p class="judul">{{ $dt->jumlah_halaman }}</p>
                </div>
                <div class="form-group">
                  <label for="exampleSelectBorder">Ikhtisar</label>
                  <p class="judul">{{ $dt->ikhtisar }}</p>
                </div>
                <div class="form-group">
                  <label for="exampleSelectBorder">Genre</label>
                  <p class="judul">{{ ucfirst($dt->genre) }}</p>
                </div>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Pinjam Buku</a>
            </center>

            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Peminjaman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/member/pinjamBuku">
            @csrf
            <input type="hidden" name="buku" value="{{ $dt->id }}">
            <div class="form-group">
                  <label for="exampleSelectBorder">Tanggal Peminjaman</label>
                  <input type="date" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" name="tanggal" required>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Pinjam Buku">
    </form>
      </div>
    </div>
  </div>
</div>
        @empty
        Kosong        
        @endforelse
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