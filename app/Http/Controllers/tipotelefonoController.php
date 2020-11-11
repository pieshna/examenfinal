<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\tipotelefono;
use Illuminate\Http\Request;

class tipotelefonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $tipotelefono = tipotelefono::where('tipo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $tipotelefono = tipotelefono::latest()->paginate($perPage);
        }

        return view('tipotelefono.index', compact('tipotelefono'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tipotelefono.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        tipotelefono::create($requestData);

        return redirect('tipotelefono')->with('flash_message', 'tipotelefono added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $tipotelefono = tipotelefono::findOrFail($id);

        return view('tipotelefono.show', compact('tipotelefono'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $tipotelefono = tipotelefono::findOrFail($id);

        return view('tipotelefono.edit', compact('tipotelefono'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $tipotelefono = tipotelefono::findOrFail($id);
        $tipotelefono->update($requestData);

        return redirect('tipotelefono')->with('flash_message', 'tipotelefono updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        tipotelefono::destroy($id);

        return redirect('tipotelefono')->with('flash_message', 'tipotelefono deleted!');
    }
}
