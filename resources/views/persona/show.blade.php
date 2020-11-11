@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">persona {{ $persona->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/persona') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        @if(Auth::user()->rol=="administrador")
                        <a href="{{ url('/persona/' . $persona->id . '/edit') }}" title="Edit persona"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('persona' . '/' . $persona->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete persona" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        @endif
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $persona->id }}</td>
                                    </tr>
                                    <tr><th> Nombre </th><td> {{ $persona->nombre }} </td></tr>
                                    <tr><th> Apellido </th><td> {{ $persona->apellido }} </td></tr>
                                    <tr><th> Genero </th><td> {{ $persona->genero }} </td></tr>
                                    <tr><th> Fecha de nacimiento </th><td> {{ $persona->fecha_nacimiento }} </td></tr>
                                    <tr><th> Correo </th><td> {{ $persona->correo }} </td></tr>
                                    @foreach($data[0] as $d)
                                    @if($persona->id==$d->persona)
                                <tr><th> Carnet </th><td>{{$d->carnet}} @if(Auth::user()->rol=="administrador") <a href="{{url('/alumno/'.$d->id.'/edit')}}"> editar</a>@endif </td></tr>
                                    <tr><th> Favorito </th><td>@if($d->favorito==1) Si @else No @endif </td></tr>
                                    @endif
                                    @endforeach
                                    @foreach($data[1] as $d)
                                    @if($persona->id==$d->persona)
                                    <tr><th> Tipo </th><td>{{$d->ttipo}} @if(Auth::user()->rol=="administrador") <a href="{{url('/tipotelefono/'.$d->ttid.'/edit')}}"> editar</a> @endif</td></tr>
                                    <tr><th> Numero </th><td>{{$d->numero}} Predeterminado:@if($d->predeterminado==1) Si @else No @endif 
                                        <a href="{{url('/telefonoalumno/'.$d->taid.'/edit')}}"> editar</a></td></tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
