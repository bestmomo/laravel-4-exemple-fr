<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Mon beau site</title>

    {{ HTML::style('http://fonts.googleapis.com/css?family=Andada') }}
    {{ HTML::style('assets/css/bootstrap.min.css') }}

	<style>
	  .center {text-align: center; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto;}
	</style>

  </head>

  <body>

	<title>Erreur 500</title>
	<body>
	  <div class="hero-unit center">
	  	<hr>
	    <h1>Erreur sur le serveur <small><font face="Tahoma" color="red">Erreur 500</font></small></h1>
	    <br>
	    <p>Une erreur inattendue est survenue sur le serveur.</p>
	    <p>Nous faisons notre possible pour corriger ce défaut rapidement.</p>
	    <hr>
	    <p><b>Vous pouvez cliquer sur ce petit bouton :</b></p>
	    <hr>
	    <a href="{{ url() }}" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Chemin vers l'accueil</a>
	  	<hr>
	  </div>
  </body>
</html>  
    
