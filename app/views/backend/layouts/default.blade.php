<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Mon beau site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    {{ HTML::style('http://fonts.googleapis.com/css?family=Andada') }}
    {{ HTML::style('assets/css/bootstrap.min.css') }}
    {{ HTML::style('assets/css/styles.css') }}
    <style type="text/css">
      body {
        padding-top: 80px;
        padding-bottom: 40px;
      }
    </style>
    {{ HTML::style('assets/css/bootstrap-responsive.min.css') }}

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body>

    <header class="navbar navbar-fixed-top">
      <div id="nav" class="navbar-inner">
        <div class="container">
          <button class="btn btn-navbar collapsed" data-target=".nav-collapse" data-toggle="collapse" type="button">
            <i class="icon-align-justify"></i>
          </button>
          <a class="brand" href="#">Administration</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="divider-vertical"></li>
              <li>
                <a href="{{ url('admin') }}">
                  <i class="icon-home"></i>
                  Accueil
                </a>
              </li>
              <li class="divider-vertical"></li>
              <li>
                <a href="{{ url('sections') }}">
                  <i class="icon-th-list"></i>
                  Sections
                </a>
              </li>   
              <li class="divider-vertical"></li>
              <li>
                <a href="{{ url('categories') }}">
                  <i class="icon-list"></i>
                  Catégories
                </a>
              </li>
              <li class="divider-vertical"></li>
              <li>
                <a href="{{ url('articles') }}">
                  <i class="icon-book"></i>
                  Articles
                </a>
              </li>   
              <li class="divider-vertical"></li>
              <li>
                <a href="{{ url('users') }}">
                  <i class="icon-user"></i>
                  Utilisateurs
                </a>
              </li>  
              <li class="divider-vertical"></li>
              <li>
                <a href="{{ url() }}" target="_blank">
                  <i class="icon-eye-open"></i>
                  Aperçu
                </a>
              </li>  
            <li class="divider-vertical"></li>
              <li>
                <a href="{{ url('auth/logout') }}">
                  <i class="icon-share-alt"></i>
                  Deconnexion
                </a>
              </li>     
              <li class="divider-vertical"></li>
            </ul>
          </div>
        </div>
      </div>
    </header>

    <div class="container">

      <div class="row">

      @include('notifications')

  		@yield('content')
      
      </div>

      <hr>

      <footer>
        <p>&copy; 2013</p>
      </footer>

    </div>

    {{ HTML::script('assets/js/jquery.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    
  </body>
</html>
