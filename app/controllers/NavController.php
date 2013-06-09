<?php

class NavController extends BaseController {

    /**
     * Affiche les catégories de la section
     *
     * @param  int  $id
     * @return Response
     */
    public function getSection($section_id)
    {
        // Section sélectionnée
        $section = Section::find($section_id);

        // Catégories de la section
        $categories = $section->categories;

        return View::make('frontend.nav.section', array(
            'sections' => Section::all(),
            'section_active' => $section,
            'categories' => $categories
        ));
    }

    /**
     * Affiche les articles de la catégorie
     *
     * @param  int  $id
     * @return Response
     */
    public function getCategorie($categorie_id)
    {
        // Catégorie sélectionnée
        $categorie = Categorie::find($categorie_id);

        // Section de cette catégorie
        $section = $categorie->section;

        // Catégories de la section
        $categories = $section->categories;

        // Articles de la categorie
        $articles = Categorie::find($categorie_id)
            ->articles()
            ->where('state', '=', 1)
            ->select('id','titre','intro')
            ->paginate(4);

        return View::make('frontend.nav.categorie', array(
            'sections' => Section::all(),
            'section_active' => $section,
            'categorie_active' => $categorie,
            'categories' => $categories,
            'articles' => $articles
        ));
    }

    /**
     * Affiche l'article
     *
     * @param  int  $article_id
     * @return Response
     */
    public function getArticle($article_id)
    {
        // Article sélectionné
        $article = Article::find($article_id);

        // Catégorie de cet article
        $categorie = $article->categorie;

        // Section de cette catégorie
        $section = $categorie->section;

        // Catégories de la section
        $categories = $section->categories;

        // Rédacteur
        $redacteur = $article->user;

        return View::make('frontend.nav.article', array(
            'sections' => Section::all(),
            'section_active' => $section,
            'categorie_active' => $categorie,
            'categories' => $categories,
            'article' => $article,
            'redacteur' => $redacteur
        ));
    }

    /**
     * Affiche le résultat d'une recherche
     *
     * @param  int  $id
     * @return Response
     */
    public function postFind()
    {
        $match = e(Input::get('find'));

        if($match)
        {
            // Recherhe des articles
            $articles = Article::select('id', 'intro')
                        ->orderBy('created_at', 'desc')
                        ->where('intro', 'like', '%'.$match.'%')
                        ->orwhere('texte', 'like', '%'.$match.'%')
                        ->take(20)
                        ->get();

            // Message
            Session::flash('flash_notice', 'Résultats pour la recherche du terme '.$match);

            return View::make('frontend.nav.find', array(
                'sections' => Section::all(),
                'articles' => $articles
            ));
        }

        return Redirect::home()->with('flash_error', 'Il faudrait entrer un terme pour la recherche !');
    }

}