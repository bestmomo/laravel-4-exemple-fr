<?php

class ArticleController extends BaseController {

    /**
     * Dépôt
     *
     * @var Article
     */
    protected $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Affiche les articles d'une catégorie
     *
     * @return Response
     */
    public function index()
    {
        // Première section
        $section = Section::all()->first();

        // id de la première catégorie de cette section
        $categorie_id = $section->categories->first()->id;

        return Redirect::route('articles.show', array($categorie_id));
    }

    /**
     * Affiche les articles au changement de section
     *
     * @return Response
     */
    public function postShowSec()
    {
        // id de la section
        $section_id = Input::get('sections');

        // Section
        $section = Section::find($section_id);

        // id de la première catégorie de cette section
        $categorie_id = $section->categories->first()->id;

        return Redirect::route('articles.show', array($categorie_id));
    }

    /**
     * Affiche les articles au changement de catégorie
     *
     * @return Response
     */
    public function postShowCat()
    {
        // id de la section
        $categorie_id = Input::get('categories');

        return Redirect::route('articles.show', array($categorie_id));
    }

    /**
     * Affichage du formulaire de création d'article
     *
     * @var categorie_id
     * @return Response
     */
    public function getCreate($categorie_id)
    {
        // Sections
        $sections = Section::all();

        // Catégorie
        $categorie = Categorie::find($categorie_id);

        // Section de cette catégorie
        $section = $categorie->section;

        // Vue
        $cible = User::admin() ? 'backend' : 'frontend';

        return View::make($cible . '.articles.create', array(
            'sections' => $sections,
            'categorie_id' => $categorie_id,
            'categorie_titre' => $categorie->titre,
            'section_titre' => $section->titre
        ));
    }

    /**
     * Enregistre l'article créé
     *
     * @return Response
     */
    public function store()
    {
        $article = new Article(Input::all());

        if($article->save())
        {
            return Redirect::route('articles.show', array(Input::get('categorie_id')));
        }

        return Redirect::back()->withInput()->withErrors($article->errors);
    }

    /**
     * Affiche les articles d'une catégorie
     *
     * @param  int  $categorie_id
     * @return Response
     */
    public function show($categorie_id)
    {
        // Sections
        $sections = Section::all();

        // Id de la section de la catégorie
        $section = Categorie::find($categorie_id)->section;
        $section_id = $section->id;

        // Catégories de la section 
        $categories = Section::find($section_id)->categories;

        // Articles de la catégorie limité à ses articles pour le rédacteur
        if(User::admin())
        {
            $cible = 'backend';
            $articles = Categorie::find($categorie_id)
                ->articles()
                ->select('id','titre','state')
                ->paginate(10);
        } else {
            $cible = 'frontend';
            $articles = Categorie::find($categorie_id)
                ->articles()
                ->select('id','titre','state')
                ->where('user_id', '=', Auth::user()->id)
                ->paginate(10);
        }

        return View::make($cible . '.articles.index', array(
            'sections' => $sections, 
            'categories' => $categories,
            'categorie_id' => $categorie_id,
            'section_id' => $section->id,
            'articles' => $articles
        )); 
    }

    /**
     * Affiche le formulaire pour la modification d'un article
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // Sections
        $sections = Section::all();

        $article = $this->article->find($id);

        if (is_null($article))
        {
            return Redirect::route('articles.index');
        }

        // Catégorie de cet article
        $categorie = $article->categorie;

        // Section de cette catégorie
        $section = $categorie->section;

        // Vue
        $cible = User::admin() ? 'backend' : 'frontend';

        return View::make($cible . '.articles.edit', array(
            'sections' => $sections,
            'article' => $article,
            'categorie_titre' => $categorie->titre,
            'section_titre' => $section->titre
        ));
    }

    /**
     * Modifie l'article
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $article = $this->article->find($id);

        $input = array_except(Input::all(), '_method');

        if($article->update($input))
        {
            return Redirect::to('articles/'.$article->categorie_id);
        }

        return Redirect::back()->withInput()->withErrors($article->errors);
    }

    /**
     * Supprime un article
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->article->find($id)->delete();

        return Redirect::route('articles.index');
    }

}