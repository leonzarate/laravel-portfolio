@csrf

@if($project->image)
<img class="card-img-top mb-2" 
    src="/storage/{{ $project->image }}" 
    class="card-img-top"
    style="height: 250px; object-fit: cover" 
    alt="{{ $project->title }}"
>
@endif

<div class="custom-file mb-2">
    <label for="formFileSm" class="custom-file-label">Ingrese una imagen</label>
    <input name="image" class="form-control-sm" type="file" id="formFileSm">
</div>

<div class="form-group">
    <label for="category_id">Categoría del proyecto</label>
    <select 
        name="category_id" 
        id="category_id"
        class="form-select border-0 bg-light shadow-sm" aria-label="Default select example"
    >
        <option value="">Seleccione</option>
        @foreach($categories as $id=>$name)
            <option value="{{ $id }}"
                @if($id == $project->category_id)
                    selected
                @endif
            >{{ $name }}</option>
        @endforeach        
    </select>
</div>

<div class="form-group">
    <label for="title">Título del proyecto</label>
    <input class="form-control border-0 bg-light shadow-sm" 
        type="text" 
        name="title" 
        placeholder="Título del proyecto" 
        value="{{ old('title', $project->title) }}">
</div>

<div class="form-group">
    <label for="url">URL del proyecto</label>
    <input class="form-control border-0 bg-light shadow-sm" 
        type="text" 
        name="url" 
        placeholder="URL del proyecto" 
        value="{{ old('url', $project->url) }}">
</div>

<div class="form-group">
    <label for="description">Descripción del proyecto</label>
    <textarea class="form-control border-0 bg-light shadow-sm" name="description">{{ old('description', $project->description) }}</textarea>
</div>

<div class="d-flex justify-content-between align-items-center form-group">
    <div class="d-grid gap-2 d-lg-block py-3">
        <button class="btn btn-primary w-100">
            {{ $btnText }}
        </button>
    </div>
    <a class="btn btn-link btn-block" href="{{ route('projects.index') }}">Cancelar</a>
</div>