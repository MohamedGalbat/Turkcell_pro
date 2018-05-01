<ul class="navbar-nav ml-auto">
    <nav class="navbar navbar-light bg-dark ">
        <ul class="nav nav-pills float-left">
            <a href="/" class="btn btn-primary btn-lg">Back to home</a>

        </ul>
        @Normal
        <form class="form-inline" method="POST" action="/search">
            <input class="form-control mr-sm-2" name="search" type="text" placeholder="FRD ID">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            @csrf
        </form>
        @endNormal
        @Manager
        <form class="form-inline" method="POST" action="/searchMan">
            <input class="form-control mr-sm-2" name="search" type="text" placeholder="FRD ID">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            @csrf
        </form>
        @endManager
    </nav>
</ul>
