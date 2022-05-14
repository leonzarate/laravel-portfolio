@csrf

<div class="form-group mb-3">
    <label for="formFileSm" class="form-label">Ingrese una imagen</label>
    <input name="image" class="form-control-sm" type="file" id="formFileSm">
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