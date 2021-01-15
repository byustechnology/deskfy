<?php

namespace Deskfy\Http\Controllers;

use App\Http\Controllers\Controller;
use Deskfy\Models\Remessa;
use Deskfy\Models\CobrancaBoleto;
use Deskfy\Filters\RemessaFilters;
use Deskfy\Http\Requests\RemessaRequest;
use Illuminate\Http\Request;

class RemessaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Deskfy\Filters\RemessaFilters
     * @return \Illuminate\Http\Response
     */
    public function index(RemessaFilters $filters)
    {
        $remessas = Remessa::withCount('boletos')->filter($filters)->paginate();
        return view('deskfy::remessa.index', compact('remessas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deskfy::remessa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Deskfy\Http\Requests\RemessaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RemessaRequest $request)
    {
        $remessa = (new Remessa)->fill($request->all());
        $remessa->save();

        session()->flash('flash_success', 'Remessa <a href="' . url($remessa->path()) . '">' . $remessa->titulo . '</a> criada com sucesso!');
        return redirect($remessa->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \Deskfy\Models\Remessa  $remessa
     * @return \Illuminate\Http\Response
     */
    public function show(Remessa $remessa)
    {
        $boletos = CobrancaBoleto::naoPossuiRemessaAtribuida()->orderBy('id', 'desc')->limit(50)->get();
        return view('deskfy::remessa.show', compact('remessa', 'boletos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Deskfy\Models\Remessa  $remessa
     * @return \Illuminate\Http\Response
     */
    public function edit(Remessa $remessa)
    {
        return view('deskfy::remessa.edit', compact('remessa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Deskfy\Http\Requests\RemessaRequest  $request
     * @param  \Deskfy\Models\Remessa  $remessa
     * @return \Illuminate\Http\Response
     */
    public function update(RemessaRequest $request, Remessa $remessa)
    {
        $remessa->fill($request->all());
        $remessa->update();

        session()->flash('flash_success', 'Remessa <a href="' . url($remessa->path()) . '">' . $remessa->titulo . '</a> alterada com sucesso!');
        return redirect($remessa->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Deskfy\Models\Remessa  $remessa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Remessa $remessa)
    {
        $remessa->delete();
        session()->flash('flash_danger', 'Remessa <a href="' . url($remessa->path()) . '">' . $remessa->titulo . '</a> removida com sucesso!');
        return back();
    }
}
