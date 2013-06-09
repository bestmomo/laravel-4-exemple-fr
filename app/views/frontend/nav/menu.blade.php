	<div class="span2">
	  <div id="menu" class="well sidebar-nav">
	    <ul class="nav nav-tabs nav-stacked">
	    	<li class="nav-header">Catégories</li>
	    	@foreach ($categories as $categorie)
				<li {{ (isset($categorie_active) and $categorie_active->id == $categorie->id) ? 'class="active"' : '' }}>
					{{ HTML::link('nav/categorie/'.$categorie->id, $categorie->titre) }}
				</li>
			@endforeach
	    </ul>
	  </div>
	</div>