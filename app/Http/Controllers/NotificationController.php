<?php

namespace App\Http\Controllers;

use App\Http\Resources\Notification as NotificationResource;
use App\Http\Resources\NotificationCollection;
use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.'
    ];

    public function index(){
        return new NotificationCollection(Notification::paginate(10));
    }

    public function show(Notification $notification){
        return response()->json(new NotificationResource($notification), 200);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:200',
        ], self::$messages);
        $notification = Notification::create($validatedData);
        return response()->json($notification, 201);
    }

    public function update(Request $request, Notification $notification){
        $notification->update($request->all());
        return response()->json($notification, 200);
    }

    public function delete(Request $request, Notification $notification){
        $notification->delete();
        return response()->json(null, 204);
    }
}
