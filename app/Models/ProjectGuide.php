<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectGuide extends Model
{
    //

    protected $fillable = [
        'project_id',
        'website_url',
        'project_description',
        'cpanel',
        'email',
        'password',
        'note',
    ];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
