<?php

namespace Tests;

use App\openai\OpenAI;
use PHPUnit\Framework\TestCase;

class ChatbotTest extends TestCase
{
    /**
     * Test the OpenAI API call
     *
     * @return void
     */
    public function testOpenAI()
    {
        $openai = new OpenAI();
        $response = $openai->generateResponse("Hello, how are you?");
        $this->assertIsString($response);
    }
}