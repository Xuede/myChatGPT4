<?php 
// chatgpt.php 
// source https://github.com/VolkanSah/ChatGPT-4-API-Integration-on-own-website/
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Replace YOUR_API_KEY with your actual GPTChat API key
define('API_KEY', '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');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $message = urlencode($input['message']);

    $url = "https://api.gptchat.com/v1/engines/gpt3.5-turbo/complete?api_key=" . API_KEY . "&message=" . $message;

    $response = file_get_contents($url);
    echo $response;
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}
