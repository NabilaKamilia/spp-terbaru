
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        {{--  <a href="index.html" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
            <h2 class="m-0"><i class="fa fa-car text-primary me-2"></i>Drivin</h2>
        </a>  --}}
        <div class="logo_container">
            <div class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
                <a href="" class="m-0 text-primary md"><img src="../images/LOGO.png" width="170px" alt="">MI AL-HUDA KOTA MALANG</a></div>
        </div>
        <button type="button" class="navbar-toggler me-4 " data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="" class="nav-item nav-link active"></a>
                <a href="" class="nav-item nav-link"></a>
                <a href="" class="nav-item nav-link"></a>
                <a href="" class="nav-item nav-link"></a>
            </div>

            @guest
            <!-- <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Login</a> -->
            <form class="form-inline my-2 my-lg-0 d-none d-md-block">
        <button class="btn btn-primary py-4 px-lg-5 d-none d-lg-block" type="button"
                onclick="event.preventDefault(); location.href='{{url('login')}}';">
          Login
        </button>
      </form>
      @endguest

      @auth
      <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{  url('logout') }}" method="POST">
            @csrf
            <button class="btn btn-primary py-4 px-lg-5 d-none d-lg-block" type="submit">
                Logout
            </button>
        </form>
      @endauth
        </div>
    </nav>
    <!-- Navbar End -->