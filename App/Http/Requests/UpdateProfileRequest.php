<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{

    /**
     * Allow user to submit request
     */
    public function authorize(): bool
    {
        return auth()->check();
    }


    /**
     * Validation rules
     */
    public function rules(): array
    {
        return [

            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'username' => [
                'required',
                'string',
                Rule::unique(User::class),
            ],


            'bio' => [
                'nullable',
                'string',
                'max:2000'
            ],


            'location' => [
                'nullable',
                'string',
                'max:255'
            ],


            'phone' => [
                'nullable',
                'string',
                'max:30'
            ],


            'website_url' => [
                'nullable',
                'url'
            ],



            /*
        |--------------------------------------------------------------------------
        | Education
        |--------------------------------------------------------------------------
        */


            'university' => [
                'nullable',
                'string',
                'max:255'
            ],


            'degree' => [
                'nullable',
                'string',
                'max:255'
            ],


            'field_of_study' => [
                'nullable',
                'string',
                'max:255'
            ],


            'graduation_year' => [
                'nullable',
                'integer',
                'min:1950',
                'max:' . (date('Y') + 10)
            ],



            /*
        |--------------------------------------------------------------------------
        | Professional
        |--------------------------------------------------------------------------
        */


            'target_role' => [
                'nullable',
                'string',
                'max:255'
            ],

            'technologies_used' => [
                'nullable',
                'array'
            ],

            'technologies_used.*' => [
                'string',
                'max:100'
            ],

            'years_experience' => [
                'nullable',
                'integer',
                'min:0',
                'max:70'
            ],



            /*
        |--------------------------------------------------------------------------
        | Social
        |--------------------------------------------------------------------------
        */


            'github_username' => [
                'nullable',
                'string'
            ],


            'linkedin_url' => [
                'nullable',
                'url'
            ],



            /*
        |--------------------------------------------------------------------------
        | Photo
        |--------------------------------------------------------------------------
        */

            'profile_photo' => [
                'nullable',
                'image',
                'max:2048'
            ],

        ];
    }



    /**
     * Clean data before validation
     */
    protected function prepareForValidation()
    {

        $this->merge([

            'name' => trim($this->name),

            'website_url' => $this->website_url
                ? trim($this->website_url)
                : null,

        ]);
    }
}
