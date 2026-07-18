<?php

namespace App\Services\AI\Providers;

use App\Contracts\AIProvider;
use App\Exceptions\AIException;
use Illuminate\Support\Facades\Http;

class GroqProvider implements AIProvider
{

    public function generate(string $prompt): string
    {

        try {

            $response = Http::withHeaders([
                'Authorization' =>
                    'Bearer ' . config('services.groq.key'),

                'Content-Type' =>
                    'application/json',

            ])
            ->post(
                'https://api.groq.com/openai/v1/chat/completions',
                [

                    'model' =>
                        'llama-3.3-70b-versatile',

                    'messages'=>[
                        [
                            'role'=>'user',
                            'content'=>$prompt
                        ]
                    ],

                    'temperature'=>0.7,

                    'max_tokens'=>500

                ]
            );


            if($response->failed()){

                throw new AIException(
                    $response->body()
                );

            }


            return $response
                ->json()
                ['choices'][0]
                ['message']
                ['content'];


        }catch(\Exception $e){

            throw new AIException(
                $e->getMessage()
            );

        }

    }

}
