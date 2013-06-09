@extends('frontend/layouts/default')

@section('content')

	@include('frontend/nav/menu')
	
	<section class="span10">
	  <div class="row-fluid">
	    <div class="module">
	      <header>
	        <h3 class="nav-header">{{ $article->titre }}
		        <em class="pull-right">
	                Ecrit par {{ $redacteur->username }} le {{date('d-m-Y',strtotime($article->created_at)) }}
	            </em>
        	</h3>
	      </header>
	      <p class="module_content">{{ $article->texte }}</p>
	    </div>
	  </div>
	<a href="javascript:history.back()" class="btn"><i class="icon-backward"></i> Retour</a>
	</section>

@stop