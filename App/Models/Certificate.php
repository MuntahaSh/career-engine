<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Skill;

class Certificate extends Model
{
        protected $guarded = [];
protected $casts = [
    'skills' => 'array',
    'issue_date' => 'date',
    'expiration_date' => 'date',
];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function skills()
{
    return $this->belongsToMany(
        Skill::class
    );
}
}
