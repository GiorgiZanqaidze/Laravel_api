<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function messages(Request $request):JsonResponse
    {
        $senderId = $request->input('sender_id');
        $receiverId = $request->input('receiver_id');


        $messages = Message::where(function ($query) use ($senderId, $receiverId) {
            $query->where('sender_id', $senderId)
                ->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($senderId, $receiverId) {
            $query->where('sender_id', $receiverId)
                ->where('receiver_id', $senderId);
        })
            ->orderBy('created_at', 'asc')
            ->with('sender', 'receiver')->get();

        // You can return the messages or pass them to a view
        return response()->json(['messages' => $messages]);
    }


    public function store(Request $request):JsonResponse
    {
        $request->validate([
            'sender_id' => ['required'],
            'receiver_id' => ['required'],
            'content' => ['required']
        ]);

        Message::create([
            'sender_id'=> $request->sender_id,
            'receiver_id'=> $request->receiver_id,
            'content'=> $request->content
        ]);

        return response()->json($request);
    }
}
