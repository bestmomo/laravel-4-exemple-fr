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
        padding-top: 10px;
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

    <header class="container">
        {{ HTML::image('assets/img/banniere.jpg')}}
    </header>

    <div class="container">
      <div class="navbar">
        <div id="nav" class="navbar-inner">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="divider-vertical"></li>
              <li {{ Request::is('/') ? 'class="active"' : '' }}>
                <a href="{{ url() }}">
                  <i class="icon-home"></i>
                  Accueil
                </a>
              </li>
              @foreach ($sections as $section)
	              <li class="divider-vertical"></li>
	              <li {{ (isset($section_active) and $section_active->id == $section->id) ? 'class="active"' : '' }}>
                  <a href="{{ url('nav/section/'.$section->id) }}">
  	                <i class="icon-file"></i>
  	                {{ $section->titre }}
	                </a>
                </li>				
			        @endforeach
              <li class="divider-vertical"></li>
              <li {{ Request::is('pages/about') ? 'class="active"' : '' }}>
                <a href="{{ url('pages/about') }}">
                  <i class="icon-question-sign"></i>
                  A propos
                </a>
              </li>
              <li class="divider-vertical"></li>
              <li {{ Request::is('pages/contact') ? 'class="active"' : '' }}>
                <a href="{{ url('pages/contact') }}">
                  <i class="icon-pencil"></i>
                  Contact
                </a>
              </li>
              <li class="divider-vertical"></li>
              @if (Auth::check())
                <li>
                  <a href="{{ url('auth/logout') }}">
                    <i class="icon-remove-sign"></i>
                    Déconnexion
                  </a>
                </li>
                <li class="divider-vertical"></li>
                @if (User::admin())
                  <li>
                    <a href="{{ url('admin') }}">
                      <i class="icon-briefcase"></i>
                      Administration
                    </a>
                  </li>
                  <li class="divider-vertical"></li>
                @elseif (User::redactor())
                  <li>
                    <a href="{{ url('articles') }}">
                      <i class="icon-pencil"></i>
                      Rédaction
                    </a>
                  </li>
                  <li class="divider-vertical"></li>
                @endif
              @else
                <li {{ Request::is('auth/login') ? 'class="active"' : '' }}>
                  <a href="{{ url('auth/login') }}">
                    <i class="icon-ok-sign"></i>
                    Connexion
                  </a>
                </li>
                <li class="divider-vertical"></li>
              @endif
            </ul>
            {{ Form::open(array('url' => 'nav/find', 'method' => 'POST', 'class' => 'navbar-search pull-right')) }}
            {{ Form::text('find', '', array('class' => 'search-query input-medium', 'placeholder' => 'Recherche')) }}
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>

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
