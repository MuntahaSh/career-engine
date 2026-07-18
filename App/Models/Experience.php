<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'user_id',
        'job_title',
        'company_name',
        'employment_type',
        'location',
        'start_date',
        'end_date',
        'currently_working',
        'description',
        'skills',
    ];

    protected $casts = [
        'skills' => 'array',
        'currently_working' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
