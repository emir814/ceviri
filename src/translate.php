<?php
require 'vendor/autoload.php';

use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

$userInput = $_GET['inputText'] ?? '';

if (!empty($userInput)) {
    $client = new Client('API KEYİNİ GİRLAN');
    try {
        $response = $client->geminiPro()->generateContent(
            new TextPart('Gireceğim metni Türkçeye çevir, çıktı olarak sadece çeviriyi yaz. "' . $userInput . '"')
        );

        echo '<div>' . $response->text() . '</div>';
    } catch (Exception $e) {
        echo '<div class="alert alert-danger" role="alert">Bir hata oluştu: ' . $e->getMessage() . '</div>';
    }
} else {
    echo '<div class="alert alert-danger" role="alert">Lütfen metin girişi yapın!</div>';
}
