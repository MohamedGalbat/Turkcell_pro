<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Turkcell FRD Manager</title>
    <!-- Bootstrap core CSS -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/css/mdb.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cinzel|Encode+Sans+Expanded:400,500,600,700|Lora:700i"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded:400,500,600,700|Great+Vibes|Lora:700i"
          rel="stylesheet">

    <style>
        html,
        body,
        header,
        #intro {
            height: 100%;
        }
        #intro {
            background: url("http://vfx.animaistanbul.com/wp-content/uploads/2017/05/Emocan_dergi_ilan_zemin.png") no-repeat center center fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
<header>
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="/"><img
                    src="https://scontent-vie1-1.xx.fbcdn.net/v/t1.0-0/29067260_1449630771832685_8530329405233299456_o.png?oh=b159ab5bbdba942305c070b8e1004327&oe=5B3F6761"
                    alt="" style="height: 45px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                aria-controls="navbarSupportedContent-4" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse show" id="navbarSupportedContent-4" style="">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item ">
                        <a class="nav-link waves-effect waves-light" href="{{ route('login') }}">
                            <i class="fa fa-sign-in mr-1"></i>Login</a>
                    </li>
                @else
                    @Manager
                    <li class="nav-item ">
                        <a class="nav-link waves-effect waves-light" href="/">
                            <i class="fa fa-home mr-1"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="/pendingReq">
                            <i class="fa fa-archive mr-1"></i>Pending Req.</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="/viewedReq">
                            <i class="fa fa-address-card mr-1"></i>Viewed Req.</a>
                    </li>
                    <li class="nav-item avatar dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src=" {{ Auth::user()->profile_pic}}" class="rounded-circle z-depth-0 "
                                 alt="Profile Pic" style="height: 35px;">
                            {{ Auth::user()->surname}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-secondary"
                             aria-labelledby="navbarDropdownMenuLink-5">
                            <a class="dropdown-item waves-effect waves-light" href="/profile">My Profile</a>
                            <a class="dropdown-item waves-effect waves-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endManager
                    @Normal
                    <li class="nav-item ">
                        <a class="nav-link waves-effect waves-light" href="/">
                            <i class="fa fa-home mr-1"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="/myrequests">
                            <i class="fa fa-address-card mr-1"></i>My Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="/search">
                            <i class="fa fa-archive mr-1"></i>Requests</a>
                    </li>
                    <li class="nav-item avatar dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src=" {{ Auth::user()->profile_pic}}" class="rounded-circle z-depth-0 "
                                 alt="Profile Pic" style="height: 35px;">
                            {{ Auth::user()->surname}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-secondary"
                             aria-labelledby="navbarDropdownMenuLink-5">
                            <a class="dropdown-item waves-effect waves-light" href="/profile">My Profile</a>
                            <a class="dropdown-item waves-effect waves-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endNormal

                @endguest

            </ul>
        </div>
    </nav>
    @Normal

    <div id="intro" class="view">
        <div class="full-bg-img">
            <div class="mask rgba-black-strong">
                <div class="container-fluid d-flex align-items-center justify-content-center h-100">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-12 col-sm-10 col-xs-10 col-md-12">
                            <h1 class="display-3 white-text" style="font-family: 'Cinzel', serif;, cursive;">
                                Welcome</h1>
                            <hr class="hr-dark">
                            <h1 class="h2-responsive white-text" style="font-family: 'Cinzel', serif;">Your Opinion
                                Matters!</h1>
                            <h1 class="h2-responsive white-text">Share Your Request With Your Managers</h1>
                            <a href="/ReqCreate">
                                <button class="btn bg-primary  btn-lg ">Create Request</button>
                            </a>
                            <a href="/search">
                                <button class="btn bg-success btn-lg">View Existing</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endNormal

    @Manager
    <div id="intro" class="view">
        <div class="full-bg-img">
            <div class="mask rgba-black-strong">
                <div class="container-fluid d-flex align-items-center justify-content-center h-100">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-12 col-sm-10 col-xs-10 col-md-12">
                            <h1 class="display-3 white-text" style="font-family: 'Cinzel', serif;, cursive;">
                                Communicating</h1>
                            <h1 class="display-5 white-text" style="font-family: 'Cinzel', serif;, cursive;"> with your Employees is more funnier now!</h1>
                            <hr class="hr-dark">
                            <a href="/pendingReq">
                                <button class="btn bg-success  btn-lg ">view Pending Requests</button>
                            </a>
                            <a href="/viewedReq">
                                <button class="btn bg-primary btn-lg">View old requests</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endManager
    <!--/.Mask-->
</header>

<!-- SCRIPTS -->
<!-- JQuery -->

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/js/mdb.min.js"></script>

</body>

</html>
