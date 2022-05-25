<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public function projects()
    {
        //aca se estalece la relacion 1 Categoria -> Muchos Prouyectos
        return $this->hasMany(Project::class); 
    }

}