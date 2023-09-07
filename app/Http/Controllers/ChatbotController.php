<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;

class ChatbotController extends Controller
{
    public function index(Request $request)
    {
        $prompt = $request->input('prompt');
        $chatbot_response = $this->generateChatbotResponse($prompt);
        return response()->json(['response' => $chatbot_response]);
    }

    private function generateChatbotResponse($prompt)
    {
        OpenAI::setApiKey(env('OPENAI_API_KEY'));
        $model = 'text-davinci-002';
        $prompt = $prompt . "\nAI:";
        $chatbot_response = OpenAI::completions($model, $prompt, 1)[0]['choices'][0]['text'];
        return $chatbot_response;
    }
}