<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //

    protected $fillable = [
        'project_name',
        'clint_name',
        'country',
        'platform_id',
        'priority',
        'technology_id',
        'start_date',
        'end_date',
        'earn_from_project',
        'paid_to_outside',
        'work_done_by',
    ];
    public function project_guide()
    {
        return $this->hasOne(ProjectGuide::class, 'project_id', 'id');
    }

    public function project_users()
{
    return $this->belongsToMany(User::class);
}

}
