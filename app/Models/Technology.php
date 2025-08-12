<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    //
    protected $fillable = ['name', 'slug', 'icon'];

    // project
    public function project(){
        return $this->hasOne(Project::class);
    }
}
