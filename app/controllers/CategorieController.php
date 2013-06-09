<?php

class CategorieController extends BaseController {

    /**
     * Dépôt
     *
     * @var Category
     */
    protected $categorie;

    public function __construct(Categorie $categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * Affichage des catégories
     *
     * @return Response
     */
    public function index()
    {
        // id de la première section
        $section_id = Section::all()->first()->id;

        return Redirect::route('categories.show', array($section_id));
    }

    /**
     * Affiche les catégories d'une section
     *
     * @return Response
     */
    public function postShow()
    {
        // id de la section
        $section_id = Input::get('sections');

        return Redirect::route('categories.show', array($section_id));
    }

    /**
     * Affichage du formulaire pour créer une catégorie
     *
     * @return Response
     */
    public function create()
    {
        // Sections
        $sections = Section::all();

        return View::make('backend.categories.create', array(
            'sections' => $sections
        ));
    }

    /**
     * Enregistre la catégorie créée
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Categorie::$rules);

        if ($validation->passes())
        {
            $this->categorie->create($input);

            return Redirect::route('categories.show', array(Input::get('section_id')));
        }

        return Redirect::back()->withInput()->withErrors($validation);
    }

    /**
     * Affiche les catégories de la section
     *
     * @param  int  $section_id
     * @return Response
     */
    public function show($section_id)
    {
        // Sections
        $sections = Section::all();

        // Catégories de la section 
        $categories = Section::find($section_id)->categories;

        return View::make('backend.categories.index', array(
            'sections' => $sections, 
            'categories' => $categories,
            'section_id' => $section_id
        ));        
    }

    /**
     * Affiche le formulaire pour modifier la catégorie
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $categorie = $this->categorie->find($id);

        if (is_null($categorie))
        {
            return Redirect::route('categories.index');
        }

        return View::make('backend.categories.edit', compact('categorie'));
    }

    /**
     * Enregistre les changement dans la catégorie
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Categorie::$rules);

        if ($validation->passes())
        {
            $categorie = $this->categorie->find($id);
            $categorie->update($input);

            return Redirect::to('categories/'.$categorie->section_id);
        }

        return Redirect::back()->withInput()->withErrors($validation);
    }

    /**
     * Supprime la catégorie
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->categorie->find($id)->delete();

        return Redirect::route('categories.index')->with('flash_success', 'Catégorie suppimée');
    }

}