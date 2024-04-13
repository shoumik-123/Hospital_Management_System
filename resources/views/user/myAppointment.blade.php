<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>My Appointment</title>

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../assets/css/theme.css">
</head>
<body>
<!-- Back to top button -->
<div class="back-to-top"></div>

<header>
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 text-sm">
                    <div class="site-info">
                        <a href="/"><span class="mai-call text-primary"></span> +8801516016964</a>
                        <span class="divider">|</span>
                        <a href="/"><span class="mai-mail text-primary"></span> shabikyeaminshoumik123@gmail.com</a>
                    </div>
                </div>
                <div class="col-sm-4 text-right text-sm">
                    <div class="social-mini-button">
                        <a href="/"><span class="mai-logo-facebook-f"></span></a>
                        <a href="/"><span class="mai-logo-twitter"></span></a>
                        <a href="/"><span class="mai-logo-dribbble"></span></a>
                        <a href="/"><span class="mai-logo-instagram"></span></a>
                    </div>
                </div>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}"><span class="text-primary">One</span>-Health</a>

            <form action="#">
                <div class="input-group input-navbar">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
                </div>
            </form>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupport">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('aboutUs') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('doctorPage') }}">Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news') }}">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contactUs') }}">Contact</a>
                    </li>



                    @auth

                        <li class="nav-item">
                            <a class="nav-link btn btn-primary text-light mr-4" href="{{ route('myAppointment') }}">My Appointment</a>
                        </li>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="btn btn-danger btn-sm">
                                Log Out
                            </button>
                        </form>

                    @endauth
                </ul>

            </div> <!-- .navbar-collapse -->
        </div> <!-- .container -->
    </nav>
</header>


@if(session('success'))
    <div id="successAlert" class="alert alert-success">
        {{ session('success') }}
        <button id="closeSuccessAlert" type="button" class="close float-end" data-dismiss="alert">
            X
        </button>
    </div>
@endif


<div class="container" style="padding: 45px 0">
    <table class="table">
        <tr>
            <th>Doctor Name</th>
            <th>Date</th>
            <th>Message</th>
            <th>Status</th>
            <th>Cancel Appointment</th>
        </tr>

        @foreach($appoint as $appoints)

            <tr>
                <td>{{$appoints->doctor}}</td>
                <td>{{$appoints->date}}</td>
                <td>{{$appoints->message}}</td>
                <td>{{$appoints->status}}</td>
                <td>
                    <a onclick="return confirm('Are you sure to delete this appointment ???')" class="btn btn-outline-danger" href="{{ route('cancelAppointment' , $appoints->id) }}">Remove</a>
                </td>
            </tr>
        @endforeach


    </table>
</div>



<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>

<script>
    let successAlert = document.getElementById('successAlert');
    setTimeout(function(){
        successAlert.style.display = 'none';
    }, 3000);

    document.querySelector('#successAlert .close').addEventListener('click', function() {
        successAlert.style.display = 'none';
    });
</script>
</body>
</html>
