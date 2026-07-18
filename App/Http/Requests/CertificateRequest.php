<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }



    public function rules(): array
    {

        return [

            'name' => [
                'required',
                'string',
                'max:255'
            ],


            'organization' => [
                'nullable',
                'string',
                'max:255'
            ],


            'issue_date' => [
                'nullable',
                'date'
            ],


            'expiration_date' => [
                'nullable',
                'date',
                'after_or_equal:issue_date'
            ],


            'credential_id' => [
                'nullable',
                'string',
                'max:255'
            ],


            'credential_url' => [
                'nullable',
                'url'
            ],


            'description' => [
                'nullable',
                'string'
            ],


            'file_path' => [
                'nullable',
                'file',
                'mimes:svg,png,jpg,jpeg,pdf',
                'max:10240'
            ],

 'skills' => [
    'nullable',
    'array',
],

'skills.*' => [
    'string',
    'max:255',
],


        ];

    }

}
