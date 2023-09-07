<?php

use OpenAI\OpenAI;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Laravel\Lumen\Application(
    realpath(__DIR__ . '/../')
);

$app->get('/', function () use ($app) {
    return view('chatbot');
});

$app->post('/chatbot', function () use ($app) {
    $openai = new OpenAI();
    $openai->setApiKey(env('OPENAI_API_KEY'));

    $prompt = request('prompt');
    $chatbot = request('chatbot');

    $response = $openai->complete(
        $chatbot,
        $prompt,
        1,
        0,
        null,
        null,
        null,
        'text'
    );

    return response()->json([
        'response' => $response['choices'][0]['text']
    ]);
});

$app->run();