<?php

namespace App\Http\Controllers;

use App\Http\Resources\Notification as NotificationResource;
use App\Http\Resources\NotificationCollection;
use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){
        return new NotificationCollection(Notification::paginate(10));
    }

    public function show(Notification $notification){
        return response()->json(new NotificationResource($notification), 200);
    }

    public function store(Request $request){
        $notification = Notification::create($request->all());
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
