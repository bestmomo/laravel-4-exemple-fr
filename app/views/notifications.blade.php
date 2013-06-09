<div class="span12">  

	@if (Session::has('errors'))
        <div class="alert alert-error alert-block">
        	<button type="button" class="close" data-dismiss="alert">&times;</button>
            Veuillez s'il vous plait corriger vos saisies dans le formulaire
        </div>
    @endif

	@if (Session::has('flash_error'))
	    <div class="alert alert-error alert-block">
	    	<button type="button" class="close" data-dismiss="alert">&times;</button>
	        {{ Session::get('flash_error') }}
	    </div>
	@endif

	@if (Session::has('flash_notice'))
	    <div class="alert alert-info alert-block">
	    	<button type="button" class="close" data-dismiss="alert">&times;</button>
	        {{ Session::get('flash_notice') }}
	    </div>
	@endif

	@if (Session::has('flash_success'))
	    <div class="alert alert-success alert-block">
	    	<button type="button" class="close" data-dismiss="alert">&times;</button>
	        {{ Session::get('flash_success') }}
	    </div>
	@endif

</div>

