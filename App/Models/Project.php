<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'category',
        'summary',
        'description',
        'github_url',
        'demo_url',
        'thumbnail',
        'is_public',
        'tech_stack',
        // AI
    'is_featured',
    'ai_score',
    'ai_reason'
    ];


protected $casts = [
    'is_public' => 'boolean',
    'is_featured' => 'boolean',
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skills()
    {
        return $this->belongsToMany(
            Skill::class,
            'project_skill'
        );
    }



}
