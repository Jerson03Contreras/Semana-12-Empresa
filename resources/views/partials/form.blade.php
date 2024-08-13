@csrf
<tr>
    <td colspan="2">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customfile" name="image">
            <label class="custom-file-label" for="customFile">Seleccione archivo</label>
        </div>
    </td>
</tr>
<tr>
    <th>Categoría</th>
    <td>
        <select name="category_nPerCodigo" id="category_nPerCodigo">
            <option value="">Seleccione</option>
            @foreach ($categories as $id => $name)
                <option value="{{ $id }}"
                @if($id == old('category_nPerCodigo', $persona->category_nPerCodigo)) selected @endif
                >{{ $name }}</option>
            @endforeach
        </select>
        @error('category_nPerCodigo')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </td>

</tr>
<tr>
    <th>Apellido</th>
    <td><input type="text" name="cPerApellido" value="{{ old('cPerApellido',$persona->cPerApellido) }}"></td>
</tr>
<tr>
    <th>Nombre</th>
    <td><input type="text" name="cPerNombre" value="{{ old('cPerNombre',$persona->cPerNombre) }}"></td>
</tr>
<tr>
    <th>Dirección</th>
    <td><input type="text" name="cPerDireccion" value="{{ old('cPerDireccion',$persona->cPerDireccion) }}"></td>
</tr>
<tr>
    <th>Fecha de nacimiento</th>
    <td><input type="date" name="dPerFecNac" value="{{ old('dPerFecNac',$persona->dPerFecNac) }}"></td>
</tr>
<tr>
    <th>Edad</th>
    <td><input type="text" name="nPerEdad" value="{{ old('nPerEdad',$persona->nPerEdad) }}"></td>
</tr>
<tr>
    <th>Sueldo</th>
    <td><input type="text" name="nPerSueldo" value="{{ old('nPerSueldo',$persona->nPerSueldo) }}"></td>
</tr>
<tr>
    <th>Rnd</th>
    <td><input type="text" name="cPerRnd" value="{{ old('cPerRnd',$persona->cPerRnd) }}"></td>
</tr>
<tr>
    <th>Estado de Persona</th>
    <td>
        <select name="nPerEstado">
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
    </td>
</tr>
<tr>
    <td colspan="2" align="center"><button>{{$btnText}}</button></td>
</tr>
