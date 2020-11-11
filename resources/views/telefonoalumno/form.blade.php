<div class="form-group {{ $errors->has('numero') ? 'has-error' : ''}}">
    <label for="numero" class="control-label">{{ 'Numero' }}</label>
    <input class="form-control" name="numero" type="text" id="numero" value="{{ isset($telefonoalumno->numero) ? $telefonoalumno->numero : ''}}" >
    {!! $errors->first('numero', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('predeterminado') ? 'has-error' : ''}}">
    <label for="predeterminado" class="control-label">{{ 'Predeterminado' }}</label>
    <div class="radio">
    <label><input name="predeterminado" type="radio" value="1" {{ (isset($telefonoalumno) && 1 == $telefonoalumno->predeterminado) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="predeterminado" type="radio" value="0" @if (isset($telefonoalumno)) {{ (0 == $telefonoalumno->predeterminado) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('predeterminado', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tipo') ? 'has-error' : ''}}">
    <label for="tipo" class="control-label">{{ 'Tipo' }}</label>
    <select class="form-control" name="tipo" id="tipo">
        <option value="" disabled selected>Seleccione el tipo de telefono</option>
        @foreach($data[0] as $t)
        @if(isset($telefonoalumno->tipo))
        @if($t->id==$telefonoalumno->tipo)
        <option value="{{$t->id}}" selected>{{$t->tipo}}</option>
        @else
        <option value="{{$t->id}}">{{$t->tipo}}</option>
        @endif
        @else
        <option value="{{$t->id}}">{{$t->tipo}}</option>
        @endif
        @endforeach
    </select>
</div>
<div class="form-group {{ $errors->has('persona') ? 'has-error' : ''}}">
    <label for="persona" class="control-label">{{ 'Persona' }}</label>
    <select class="form-control" name="persona" id="persona">
        <option value="" disabled selected>Seleccione la persona</option>
        @foreach($data[1] as $p)
        @if(isset($telefonoalumno))
        @if($p->id==$telefonoalumno->persona)
        <option value="{{$p->id}}" selected>{{$p->nombre}} {{$p->apellido}}</option>
        @else
        <option value="{{$p->id}}">{{$p->nombre}} {{$p->apellido}}</option>
        @endif
        @else
        <option value="{{$p->id}}">{{$p->nombre}} {{$p->apellido}}</option>
        @endif
        @endforeach
    </select>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
