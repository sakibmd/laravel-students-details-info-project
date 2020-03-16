<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Student Management</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark m-0 fixed-top">
            <a class="navbar-brand" href="#"><b>Logo</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}"  >Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-menu" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('students.index') }}">Students</a>
                </li>
                
            </ul>
            </div>
    </nav>

    @if (session()->has('status'))
          <div class="alert alert-success" role="alert">
              {{ session()->get('status') }}
          </div>
    @endif


    <div>
        @yield('content')
    </div>

    <section id="footer">
        <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1 class="head">About Us</h1>
                <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
            </div>
    
            <div class="col-md-4">
                <h1 class="head">We Provide</h1>
                 <p><i class="fas fa-check"></i>Fully Responsive</p>
                 <p><i class="fas fa-check"></i>100% Satisfaction</p>
                 <p><i class="fas fa-check"></i>24/7 Support</p>
                 <p><i class="fas fa-check"></i>Highly Reliable</p>
            </div>
    
            <div class="col-md-4">
                <h1 class="head">Our Location</h1>
                <p> <i class="fas fa-map-marker-alt"></i> Housing Estate Sylhet</p>
                <p><i class="fas fa-phone"></i> +88 01612345678</p>
                <p><i class="fas fa-envelope"></i> sakibmd.cse@gmail.com</p>
            </div>
    
        </div>
        <hr>
        <p class="text-center">Credit Goes To <b>Sakib Mohammed</b></p>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>