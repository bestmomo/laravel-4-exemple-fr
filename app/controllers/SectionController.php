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
        $input = Input::all();

        $validation = Validator::make($input, Section::$rules_create);

        if ($validation->passes())
        {
            $this->section->create($input);

            return Redirect::route('sections.index');
        }

        return Redirect::back()->withInput()->withErrors($validation);
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
        $input = array_except(Input::all(), '_method');

        $validation = Validator::make($input, Section::$rules_edit);

        if ($validation->passes())
        {
            $section = $this->section->find($id);
            $section->update($input);

            return Redirect::route('sections.index');
        }

        return Redirect::back()->withInput()->withErrors($validation);
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