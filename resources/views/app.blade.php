<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', $title)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{Asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{Asset('css/bootstrap-icons.css')}}">

    <link rel="stylesheet" href="{{Asset('css/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{Asset('css/owl.theme.default.min.css')}}">

    <link href="{{Asset('css/templatemo-pod-talk.css')}}" rel="stylesheet">

    <!--

TemplateMo 584 Pod Talk

https://templatemo.com/tm-584-pod-talk

-->
</head>

<body>

    <main>

        <nav class="navbar navbar-expand-lg">
        <button class="btn btn-danger" aria-current="page" href="" onclick="myFunction()">Logout</button>
            <div class="container">
                <a class="navbar-brand me-lg-5 me-0" href="/">
                    <img src="{{Asset('images/pod-talk-logo.png')}}" class="logo-image img-fluid" alt="templatemo pod talk">
                </a>

                <form action="#" method="get" class="custom-form search-form flex-fill me-3" role="search">
                    <div class="input-group input-group-lg">
                        <input name="search" type="search" class="form-control" id="search" placeholder="Search Podcast"
                            aria-label="Search">

                        <button type="submit" class="form-control" id="submit">
                            <i class="bi-search"></i>
                        </button>
                    </div>
                </form>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('positions.index')}}">position</a>
                        </li>

                        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('departements.index')}}">departemen</a>
        </li>        
      </ul>
                    </ul>
                </div>
            </div>  
        </nav>
        
</main>

<br><br><br><br><br>
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h1 class="card-title">@yield('title', $title)</h1>
              @yield('content')
              </div>
            </div>
          </div>
        </div>
<br><br>

        <footer class="site-footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    <div class="subscribe-form-wrap">
                        <h6>Kirim Pesan Lewat Gmail</h6>

                        <form class="custom-form subscribe-form" action="#" method="get" role="form">
                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                class="form-control" placeholder="Email Address" required="">
                                <textarea id="message" name="message" class="form-control" placeholder="Messages" required=""></textarea>

                            <div class="col-lg-12 col-12">
                                <button type="submit" class="form-control" id="submit" onclick="sendEmail()">Send</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-md-0 mb-lg-0">
                    <h6 class="site-footer-title mb-3">Contact</h6>

                    <p class="mb-2"><strong class="d-inline me-2">Phone:</strong> 010-020-0340</p>

                    <p>
                        <strong class="d-inline me-2">Email:</strong>
                        <a href="#">inquiry@pod.co</a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <h6 class="site-footer-title mb-3">Download Mobile</h6>

                    <div class="site-footer-thumb mb-4 pb-2">
                        <div class="d-flex flex-wrap">
                            <a href="#">
                                <img src="{{Asset('images/app-store.png')}}" class="me-3 mb-2 mb-lg-0 img-fluid" alt="">
                            </a>

                            <a href="#">
                                <img src="{{Asset('images/play-store.png')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>

                    <h6 class="site-footer-title mb-3">Social</h6>

                    <ul class="social-icon">
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-instagram"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-twitter"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-whatsapp"></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="container pt-5">
            <div class="row align-items-center">

                <div class="col-lg-2 col-md-3 col-12">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{Asset('images/pod-talk-logo.png')}}" class="logo-image img-fluid" alt="templatemo pod talk">
                    </a>
                </div>

                <div class="col-lg-7 col-md-9 col-12">
                    <ul class="site-footer-links">
                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Homepage</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Browse episodes</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Help Center</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Contact Us</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-12">
                    <p class="copyright-text mb-0">Copyright © 2036 Talk Pod Company
                        <br><br>
                        Design: <a rel="nofollow" href="https://templatemo.com/page/1" target="_parent">TemplateMo</a>
                    </p> Distribution: <a rel="nofollow" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </div>
            </div>
        </div>
    </footer>


    <!-- JAVASCRIPT FILES -->
    <script src="{{Asset('js/jquery.min.js')}}"></script>
    <script src="{{Asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{Asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{Asset('js/custom.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

</body>
<script language="javascript">
function myFunction() {
  if (confirm("Anda yakin ingin logout?") == true) {
    // Hapus session yang tersimpan (jika ada)
    sessionStorage.clear();
    // Redirect ke halaman login
    window.location.replace("login");
  } else {
    // Batalkan aksi logout
    return false;
  }
}

// Cegah pengguna untuk menavigasi kembali ke halaman utama setelah logout
if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}
</script>
<script>
  function sendEmail() {
    const emailInput = document.getElementById("email");
    const email = emailInput.value;
    const messageInput = document.getElementById("message");
    const message = messageInput.value;
    const emailUrl = `mailto:${email}?subject=Pesan dari Website&body=${message}`;
    window.location.href = emailUrl;
  }
</script>
</html>