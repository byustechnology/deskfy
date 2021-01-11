<?php

namespace Deskfy\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StorageController extends Controller
{

    /**
     * Retorna um determinado arquivo 
     * armazenado no storage da aplicação.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return response()->file(storage_path('app/') . $request->arquivo);
    }

}