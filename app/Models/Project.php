<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'client_id',
        'country',
        'platform',
        'priority',
        'technology',
        'start_date',
        'end_date',
        'earning',
        'paid_outside',
        'work_done_by',
        'project_guide',
        'reference_website',
        'description',
        'cpanel_details',
        'credentials',
        'notes',
        'status',
        'progress',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
