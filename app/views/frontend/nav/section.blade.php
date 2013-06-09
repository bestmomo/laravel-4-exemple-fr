@extends('frontend/layouts/default')

@section('content')

	@include('frontend/nav/menu')

	<section class="span10">
	  <div class="row-fluid">
	    <div class="module">
	      <header>
	        <h3 class="nav-header">{{ $section_active->titre }}</h3>
	      </header>
	      <p class="module_content">{{ $section_active->description }}</p>
	    </div>
	  </div>
	</section>

@stop