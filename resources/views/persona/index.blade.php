@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Persona</div>
                    <div class="card-body">
                        @if(Auth::user()->rol=="administrador")
                        <a href="{{ url('/persona/create') }}" class="btn btn-success btn-sm" title="Add New persona">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        @endif

                        <form method="GET" action="{{ url('/persona') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Nombre</th><th>Apellido</th><th>Fecha Nacimiento</th><th>Genero</th><th>Correo</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($persona as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                    <td>{{ $item->nombre }}</td><td>{{ $item->apellido }}</td><td>{{$item->fecha_nacimiento}}</td><td>{{ $item->genero }}</td><td>{{$item->correo}}</td>
                                        <td>
                                            <a href="{{ url('/persona/' . $item->id) }}" title="View persona"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            @if(Auth::user()->rol=="administrador")
                                            <a href="{{ url('/persona/' . $item->id . '/edit') }}" title="Edit persona"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/persona' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete persona" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $persona->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
