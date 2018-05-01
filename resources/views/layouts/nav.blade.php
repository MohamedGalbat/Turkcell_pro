<nav class="mb-1 navbar navbar-expand-lg navbar-dark bg-dark">
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
                @endNormal
            @endguest
        </ul>
    </div>
</nav>