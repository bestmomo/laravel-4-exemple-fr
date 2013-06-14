<?php

class SectionController extends BaseController {

    /**
     * Dépôt
     *
     * @var Section
     */
    protected $section;

    public function __construct(Section $section)
    {
        parent::__construct();
        
        $this->section = $section;
    }

    /**
     * Affiche les sections
     *
     * @return Response
     */
    public function index()
    {
        $sections = $this->section->all();

        return View::make('backend.sections.index', compact('sections'));
    }

    /**
     * Affiche le formulaire pour créer une section
     *
     * @return Response
     */
    public function create()
    {
        return View::make('backend.sections.create');
    }

    /**
     * Enregistre la nouvelle section
     *
     * @return Response
     */
    public function store()
    {
        $section = new Section(Input::all());

        if($section->save())
        {
            return Redirect::route('sections.index');
        }

        return Redirect::back()->withInput()->withErrors($section->errors);
    }

    /**
     * Affiche le formulaire de modification d'une section
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $section = $this->section->find($id);

        if (is_null($section))
        {
            return Redirect::route('sections.index');
        }

        return View::make('backend.sections.edit', compact('section'));
    }

    /**
     * Enregistre les modifications dans la section
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {

        $section = $this->section->find($id);

        $input = array_except(Input::all(), '_method');

        if($section->update($input))
        {
            return Redirect::route('sections.index');
        }

        return Redirect::back()->withInput()->withErrors($section->errors);
        
    }

    /**
     * Supprime la section
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->section->find($id)->delete();

        return Redirect::route('sections.index')->with('flash_success', 'Section suppimée');
    }

}