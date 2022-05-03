@csrf

<label>
    Título del proyecto<br>
    <input type="text" name="title" placeholder="Título del proyecto" value="{{ old('title', $project->title)}}">
</label>
<br>
<label>
    URL<br>
    <input type="text" name="url" placeholder="URL del proyecto" value="{{ old('url', $project->url)}}">
</label>
<br>
<label>
    Descripcion del proyecto<br>
    <textarea name="description" placeholder="Describa su proyecto">{{ old('description', $project->description) }}</textarea>
</label>
<br>

<button type="submit">{{ $btnText }}</button>