<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Отправка email
        $emailData = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ];

        Mail::send([], [], function ($message) use ($emailData) {
            $message->to('3923328@gmail.com')
                ->subject('New Contact Form Submission')
                ->setBody('Name: ' . $emailData['name'] . "\nPhone: " . $emailData['phone'] . "\nEmail: " . $emailData['email']);
        });

        // Отправка сообщения в Telegram
        $telegramToken = '7488705773:AAH1Lrw9g_QkJVV5HLdH5NcGncNTOSEphbs';
        $chatId = '926348939';
        $message = 'Name: ' . $request->name . "\nPhone: " . $request->phone . "\nEmail: " . $request->email;

        $telegramUrl = "https://api.telegram.org/bot{$telegramToken}/sendMessage";
        $telegramResponse = Http::post($telegramUrl, [
            'chat_id' => $chatId,
            'text' => $message,
        ]);

        return response()->json(['message' => 'Form submitted successfully']);
    }
}
