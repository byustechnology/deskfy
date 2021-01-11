<?php

namespace Deskfy\Http\Controllers;

use App\Http\Controllers\Controller;
use Deskfy\Models\Entidade;
use Deskfy\Filters\EntidadeFilters;
use Deskfy\Http\Requests\EntidadeRequest;
use Illuminate\Http\Request;

class EntidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Deskfy\Filters\EntidadeFilters
     * @return \Illuminate\Http\Response
     */
    public function index(EntidadeFilters $filters)
    {
        $entidades = Entidade::filter($filters)->paginate();
        return view('deskfy::entidade.index', compact('entidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deskfy::entidade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Deskfy\Http\Requests\EntidadeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EntidadeRequest $request)
    {
        $entidade = (new Entidade)->fill($request->all());
        $entidade->save();

        session()->flash('flash_success', 'Entidade <a href="' . url($entidade->path()) . '">' . $entidade->titulo . '</a> criada com sucesso!');
        return redirect($entidade->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \Deskfy\Models\Entidade  $entidade
     * @return \Illuminate\Http\Response
     */
    public function show(Entidade $entidade)
    {
        return view('deskfy::entidade.show', compact('entidade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Deskfy\Models\Entidade  $entidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Entidade $entidade)
    {
        return view('deskfy::entidade.edit', compact('entidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Deskfy\Http\Requests\EntidadeRequest  $request
     * @param  \Deskfy\Models\Entidade  $entidade
     * @return \Illuminate\Http\Response
     */
    public function update(EntidadeRequest $request, Entidade $entidade)
    {
        $entidade->fill($request->all());
        $entidade->update();

        session()->flash('flash_success', 'Entidade <a href="' . url($entidade->path()) . '">' . $entidade->titulo . '</a> alterada com sucesso!');
        return redirect($entidade->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Deskfy\Models\Entidade  $entidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entidade $entidade)
    {
        $entidade->delete();
        session()->flash('flash_danger', 'Entidade <a href="' . url($entidade->path()) . '">' . $entidade->titulo . '</a> removida com sucesso!');
        return back();
    }
}
