<!doctype html>
<html>
    <head>
        <title>Sistem Pakar</title>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>


        <link href="{{ ('css/agency.css') }}" rel="stylesheet">
        
    </head>
    @if (count($errors)>0)
    <script>
    $(document).ready(function(){
    $("#daftar").trigger("click");
    });
    </script>
    @endif
    
    <body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/">Sistem Pakar</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" data-toggle="modal" data-target="#modalAbout" href="">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" data-toggle="modal" data-target="#modalTeam" href="">Team</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" data-toggle="modal" data-target="#modalContact" href="">Contact</a>
            </li>
            @if(Auth::user())
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ route('logout') }}">Keluar</a>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Selamat Datang Di Sistem Pakar</div>
          <div class="intro-heading">Prediksi Serangan Hama Padi</div>
          @guest
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" data-toggle="modal" data-target="#modalMasuk" >Masuk</a>
          <a class="btn btn-warning btn-xl text-uppercase js-scroll-trigger" id="daftar" data-toggle="modal" data-target="#modalDaftar" >Daftar</a>
          @else
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="{{ route('pakarPeriode') }}" >Prediksi Hama(Periode)</a>
          <a class="btn btn-warning btn-xl text-uppercase js-scroll-trigger" href="{{ route('pakarHarian') }}" >Prediksi Hama(Harian)</a>
          @endguest
        </div>
      </div>
    </header>
    <!-- Modal -->
    <div class="modal fade" id="modalMasuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 style="margin:auto;" class="modal-title" id="exampleModalLongTitle">Formulir Masuk</h5>
        </div>
        <div class="modal-body">
        <form class="form-signin" action="{{ route('signin') }}" method="post">
      <h6 style="text-align:center;">Silahkan Masuk Menggunakan Email Dan Password</h6>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
      <!-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
      <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
      <p style="text-align:center;" class="mt-5 mb-3 text-muted">&copy; 2018</p>
      {{ csrf_field() }}
    </form>
        </div>
        </div>
    </div>
    </div>

        <div class="modal fade" id="modalDaftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 style="margin:auto;" class="modal-title" id="exampleModalLongTitle">Formulir Daftar</h5>
        </div>
        <div class="modal-body">
        <form class="form-signin" action="{{ route('signup') }}" method="post">
        @if (count($errors)>0)
        <h6 style="text-align:center; color:red;">Email Sudah Terdaftar Silahkan Gunakan Email Lain</h6>
        @else
        <h6 style="text-align:center;">Silahkan Masukkan Data Yang Diperlukan</h6>
        @endif
      <label for="email" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
      <label for="nama" class="sr-only">Nama Pengguna</label>
      <input type="nama" id="inputNama" class="form-control" placeholder="Nama Pengguna" name="nama" required autofocus>
      <label for="password" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Daftar</button>
      <p style="text-align:center;" class="mt-5 mb-3 text-muted">&copy; 2018</p>
      {{ csrf_field() }}
    </form>
        </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="modalAbout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">About</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Aplikasi Web ini bertujuan untuk melakukan prediksi serangan hama pada tanaman padi di Kabupaten Malang
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalTeam" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Team</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Aplikasi Web ini dibangun oleh kelompok magang KC2 di dinas TPHP Malang
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Contact</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Silahkan Hubungi Email Berikut:</label>
                <input type="text" class="form-control" id="recipient-name" value="kelompokkc2@example.com">
              </div>
              <!-- <div class="form-group">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control" id="message-text"></textarea>
              </div> -->
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Send message</button> -->
          </div>
        </div>
      </div>
    </div>
    </body>
</html>
