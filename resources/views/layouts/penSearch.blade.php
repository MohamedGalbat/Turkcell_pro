<ul class="navbar-nav ml-auto">
    <nav class="navbar navbar-light bg-dark ">
        <ul class="nav nav-pills float-left">
            <a href="/" class="btn btn-primary btn-lg">Back to home</a>
        </ul>
        @Manager
        <form class="form-inline" method="POST" action="/searchPend">
            <input class="form-control mr-sm-2" name="search" type="text" placeholder="FRD ID">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            @csrf
        </form>
        @endManager
        @Normal
        <form class="form-inline" method="POST" action="/MySearch">
            <input class="form-control mr-sm-2" name="search" type="text" placeholder="FRD ID">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            @csrf
        </form>
        @endNormal
    </nav>
</ul>
