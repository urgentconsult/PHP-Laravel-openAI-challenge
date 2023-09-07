<!DOCTYPE html>
<html>
<head>
    <title>OpenAI Chatbot</title>
</head>
<body>
    <h1>Welcome to the OpenAI Chatbot</h1>
    <form method="POST" action="{{ route('chatbot') }}">
        @csrf
        <label for="message">Enter your message:</label><br>
        <input type="text" id="message" name="message"><br>
        <button type="submit">Send</button>
    </form>
    @if(isset($response))
        <p><strong>Response:</strong> {{ $response }}</p>
    @endif
</body>
</html>