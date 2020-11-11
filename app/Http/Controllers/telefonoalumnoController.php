<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\telefonoalumno;
use Illuminate\Http\Request;

class telefonoalumnoController extends Controller
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
            $telefonoalumno = telefonoalumno::where('numero', 'LIKE', "%$keyword%")
                ->orWhere('predeterminado', 'LIKE', "%$keyword%")
                ->orWhere('tipo', 'LIKE', "%$keyword%")
                ->orWhere('persona', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $telefonoalumno = \DB::table('telefonoalumnos')->orderBy('id','desc')->paginate($perPage);
        }

        return view('telefonoalumno.index', compact('telefonoalumno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $persona=\DB::select('select * from personas');
        $tipo=\DB::select('select * from tipotelefonos');
        $data['data']=[$tipo,$persona];
        return view('telefonoalumno.create',$data);
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
        
        telefonoalumno::create($requestData);

        return redirect('telefonoalumno')->with('flash_message', 'telefonoalumno added!');
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
        $telefonoalumno = telefonoalumno::findOrFail($id);

        return view('telefonoalumno.show', compact('telefonoalumno'));
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
        $telefonoalumno['telefonoalumno'] = telefonoalumno::findOrFail($id);
        $persona=\DB::select('select * from personas');
        $tipo=\DB::select('select * from tipotelefonos');
        $data['data']=[$tipo,$persona];

        return view('telefonoalumno.edit',$telefonoalumno,$data);
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
        
        $telefonoalumno = telefonoalumno::findOrFail($id);
        $telefonoalumno->update($requestData);

        return redirect('telefonoalumno')->with('flash_message', 'telefonoalumno updated!');
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
        telefonoalumno::destroy($id);

        return redirect('telefonoalumno')->with('flash_message', 'telefonoalumno deleted!');
    }
}
