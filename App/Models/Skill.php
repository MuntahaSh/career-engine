<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Skill extends Model
{


    protected $fillable = [

        'user_id',

        'name',

        'category',

        'level',

        'icon',

    ];

    protected $casts = [

        'level'=>'integer',

    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function projects()
    {
        return $this->belongsToMany(
            Project::class,
            'project_skill'
        );
    }

    public function certificates()
{
    return $this->belongsToMany(
        Certificate::class
    );
}
}
