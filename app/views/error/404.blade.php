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

	<title>Erreur 404</title>
	<body>
	  <div class="hero-unit center">
	  	<hr>
	    <h1>Page non trouvée <small><font face="Tahoma" color="red">Erreur 404</font></small></h1>
	    <br>
	    <p>La page que vous demandez n'a pas pu être trouvée, contactez l'administrateur du site ou essayez à nouveau.</p>
	    <p>Utilisez votre bouton de navigation pour retrouver la page où vous étiez précédemment.</p>
	    <p><b>Vous pouvez aussi juste cliquer sur ce petit bouton :</b></p>
	    <hr>
	    <a href="{{ url() }}" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Chemin vers l'accueil</a>
	  	<hr>
	  </div>
  </body>
</html>  
    
