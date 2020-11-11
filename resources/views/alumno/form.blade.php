<div class="form-group {{ $errors->has('carnet') ? 'has-error' : ''}}">
    <label for="carnet" class="control-label">{{ 'Carnet' }}</label>
    <input class="form-control" name="carnet" type="text" id="carnet" value="{{ isset($alumno->carnet) ? $alumno->carnet : ''}}" >
    {!! $errors->first('carnet', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('favorito') ? 'has-error' : ''}}">
    <label for="favorito" class="control-label">{{ 'Favorito' }}</label>
    <div class="radio">
    <label><input name="favorito" type="radio" value="1" {{ (isset($alumno) && 1 == $alumno->favorito) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="favorito" type="radio" value="0" @if (isset($alumno)) {{ (0 == $alumno->favorito) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('favorito', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('persona') ? 'has-error' : ''}}">
    <label for="persona" class="control-label">{{ 'Persona' }}</label>
    <input class="form-control" name="persona" type="number" id="persona" value="{{ isset($alumno->persona) ? $alumno->persona : ''}}" >
    {!! $errors->first('persona', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
