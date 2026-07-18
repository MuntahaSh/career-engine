<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    /*
    |--------------------------------------------------------------------------
    | Mass Assignable Fields
    |--------------------------------------------------------------------------
    */

    protected $fillable = [

        // Authentication
        'name',
        'email',
        'password',

        // Profile Information
        'bio',
        'location',
        'phone',
        'website_url',
        'profile_photo_path',
                                        'target_role',
                                        'technologies_used',

                'university',
                'degree',
                'field_of_study',
                'graduation_year',

        // Social Links
        'github_username',
        'linkedin_url',
        'twitter_username',
        'portfolio_url',
        'username',

        // Professional Information
        'years_experience',
        'skills_keywords',
    ];



    /*
    |--------------------------------------------------------------------------
    | Hidden Attributes
    |--------------------------------------------------------------------------
    */

    protected $hidden = [

        'password',
        'remember_token',

    ];



    /*
    |--------------------------------------------------------------------------
    | Attribute Casting
    |--------------------------------------------------------------------------
    */

protected $casts = [

    'email_verified_at'=>'datetime',

    'password'=>'hashed',

    'profile_completed_at'=>'datetime',

    'last_profile_updated_at'=>'datetime',

    'skills_keywords'=>'array',

    'graduation_year'=>'integer',

    'years_experience'=>'integer',
        'technologies_used'=>'array',


];


    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */


    /**
     * Profile Image URL
     */
    public function getProfilePhotoUrlAttribute(): string
    {

        if (
            $this->profile_photo_path &&
            Storage::disk('public')
                ->exists($this->profile_photo_path)
        ) {

            return Storage::url(
                $this->profile_photo_path
            );

        }


        return 'https://ui-avatars.com/api/?name='
            . urlencode($this->name)
            . '&background=fcf8fa&color=000000';

    }




    /**
     * Full GitHub URL
     */
    public function getGithubUrlAttribute(): ?string
    {

        return $this->github_username
            ? "https://github.com/{$this->github_username}"
            : null;

    }




    /**
     * Full Twitter URL
     */
    public function getTwitterUrlAttribute(): ?string
    {

        return $this->twitter_username
            ? "https://twitter.com/{$this->twitter_username}"
            : null;

    }




    /**
     * Social links array
     */
    public function getSocialLinksAttribute(): array
    {

        return [

            'github' => $this->github_url,

            'linkedin' => $this->linkedin_url,

            'twitter' => $this->twitter_url,

            'portfolio' => $this->portfolio_url,

        ];

    }





    /**
     * Bio character counter
     */
    public function getBioCharacterCountAttribute(): int
    {

        return strlen(
            $this->bio ?? ''
        );

    }






    /*
    |--------------------------------------------------------------------------
    | Profile Logic
    |--------------------------------------------------------------------------
    */


    /**
     * Calculate profile completion percentage
     */
    public function getProfileCompletionAttribute(): int
    {

        $fields = [

            // Basic information
            $this->name,

            $this->email,

            $this->title,

            $this->bio,

            $this->location,

            $this->phone,

            $this->website_url,

            $this->profile_photo_path,


            // Social
            $this->github_username,

            $this->linkedin_url,

            $this->twitter_username,


        ];



        $completed = collect($fields)
            ->filter()
            ->count();



        return (int) round(

            ($completed / count($fields)) * 100

        );

    }




    /**
     * Check profile completion
     */
    public function isProfileComplete(): bool
    {

        return $this->profile_completion >= 80;

    }




    /**
     * Update profile timestamp
     */
    public function updateProfileTimestamp(): void
    {

        $this->update([

            'last_profile_updated_at' => now()

        ]);

    }





    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */


    public function projects(): HasMany
    {

        return $this->hasMany(Project::class);

    }




    public function skills(): HasMany
    {

        return $this->hasMany(Skill::class);

    }




    public function certificates(): HasMany
    {

        return $this->hasMany(Certificate::class);

    }




    public function experiences(): HasMany
    {

        return $this->hasMany(Experience::class);

    }




    public function activities(): HasMany
    {

        return $this->hasMany(Activity::class);

    }





    /*
    |--------------------------------------------------------------------------
    | Query Scopes
    |--------------------------------------------------------------------------
    */


    public function scopeVerified($query)
    {

        return $query->where(
            'is_verified_developer',
            true
        );

    }




    public function scopeProfileComplete($query)
    {

        return $query->whereNotNull(
            'profile_completed_at'
        );

    }




    public function scopeMostViewed($query)
    {

        return $query->orderByDesc(
            'profile_views'
        );

    }


}
