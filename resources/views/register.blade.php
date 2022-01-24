<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap');

*{
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    display: flex;
    justify-content: center;
    align-items: center;
    background:rgba(255,255,255,.9);
}

.main{
    max-width: 550px;
    width: 100%;
    padding: 20px 25px;
    border-radius: 5px;
}

.main .card{
    box-shadow: -4px 8px 16px 0 rgb(25,42,70,0.13);
    margin-bottom: 2.2rem;
    border-radius: 2px;
    padding: 20px;
}

.regis-form-container form{
    background: #fff;
    border: var(--border);
    width: 25rem;
    padding: 2rem;
    box-shadow: var(--box-shadow);
    border-radius: .5rem;
    margin: 2rem;
}

.regis-form-container form h3{
    font-size: 1.5rem;
    text-transform: uppercase;
    color: var(--black);
    text-align: center;
}

.regis-form-container form span{
    font-size: 1rem;
}

.regis-form-container form .box{
    width: 100%;
    margin: .5rem 0;
    font-size: 1rem;
    padding: 0.2rem 0.4rem;
}

.regis-form-container form .btn{
    text-align: center;
    height: 2.4rem;
    width: 30%;
    margin: 1.5rem 0;
    background-color: #666666;
}

.regis-form-container form p{
    padding-top: .4rem;
    color: var(--light-color);
    font-size: 1rem;
}

.regis-form-container form p a{
    color: var(--green);
    text-decoration: underline;
}

.regis-form-container #close-regis-btn{
    position: absolute;
    top: 1.5rem;
    right: 2.5rem;
    font-size: 3.2rem;
    color: var(--black);
    cursor: pointer;
}
</style>

  <title>Registrasi</title>

</head>
<body>
  <div class="main">
        <div class="card">
            <div class="regis-form-container">
                <form action="/member/addRegister" method="post">
                    <h3>Sign Up</h3>
                    @csrf
                    <span>Name</span>
                    <input type="name" name="nama_member" class="box" placeholder="enter your name" id="">
                    <span>Email</span>
                    <input type="email" name="email" class="box" placeholder="enter your email" id="">
                    <span>Phone Number</span>
                    <input type="phone_number" name="no_hp" class="box" placeholder="enter your phone number" id="">
                    <span>Password</span>
                    <input type="password" name="password" class="box" placeholder="enter your password" id="">
                    <span>Confirm Password</span>
                    <input type="password" name="konfir" class="box" placeholder="enter your confirm password" id="">
                    <input type="submit" value="Sign Up" class="btn">
                    <p>Already have an account ? <a href="#">Sign In</a></p>
                </form>
            </div>
        </div>
    </div>

</body>
