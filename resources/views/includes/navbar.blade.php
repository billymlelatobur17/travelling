<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{route('home')}}">
            <img alt="logo" src="{{asset('frontend/images/output-onlinepngtools.png')}}">
        </a>
        <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler navbar-toggler-right"
                data-target="#navb" data-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item active">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Paket Travel</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="" id="navbardrop">Services</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="">Link</a>
                        <a class="dropdown-item" href="">Link</a>
                        <a class="dropdown-item" href="">Link</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Testimonial</a>
                </li>
            </ul>
            @guest
                <!--Mobile Button-->
                <form class="form-inline d-sm-block d-md-none">
                    <button class="btn btn-login my-2 my-sm-0" type="button"
                            onclick="event.preventDefault();location.href='{{url('login')}}';">Masuk
                    </button>
                </form>

                <!--Desktop Button-->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button"
                            onclick="event.preventDefault();location.href='{{url('login')}}';">Masuk
                    </button>
                </form>
            @endguest

            @auth
                <!--Mobile Button-->
                <form class="form-inline d-sm-block d-md-none" action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn btn-login my-2 my-sm-0" type="submit">
                        Keluar
                    </button>
                </form>

                <!--Desktop Button-->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
                        Keluar
                    </button>
                </form>
            @endauth
        </div>
    </nav>
</div>
