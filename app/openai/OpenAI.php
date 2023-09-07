<?php

namespace App\OpenAI;

use OpenAI;

class OpenAI
{
    private $openai;

    public function __construct()
    {
        $this->openai = new OpenAI(env('OPENAI_SECRET_KEY'));
    }

    public function generateResponse($prompt)
    {
        $model = 'text-davinci-002';
        $temperature = 0.5;
        $maxTokens = 60;
        $topP = 1;
        $frequencyPenalty = 0;
        $presencePenalty = 0;

        $response = $this->openai->completions([
            'engine' => $model,
            'prompt' => $prompt,
            'temperature' => $temperature,
            'max_tokens' => $maxTokens,
            'top_p' => $topP,
            'frequency_penalty' => $frequencyPenalty,
            'presence_penalty' => $presencePenalty,
        ]);

        return $response['choices'][0]['text'];
    }
}