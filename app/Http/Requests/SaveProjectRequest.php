<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class SaveProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return Gate::authorize('create', new \App\Models\Project);
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'url' => [
                'required',
                Rule::unique('projects')->ignore($this->route('project'))
            ],
            'category_id' => [
                'required',
                'exists:categories,id', //Esto es para evitar ataque malintencionado y usar solo las categorias de la base
            ],
            'image' => [
                $this->route('project') ? 'nullable' : 'required', //el this->route es para cuando estoy haciendo un update
                'mimes:jpeg,png',
                //'max:2000'
                //'dimensions:min_width=400,min_heigth=200',
            ], //'image' es para filtrar a poder subir solo tipos  MIME-TYPE
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => ('El campo Título necesita un valor'),
            //'image.required' => ('El campo Imagen es obligatorio'),
        ];
    }
}
