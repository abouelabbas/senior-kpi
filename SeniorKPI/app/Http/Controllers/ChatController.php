<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Events\ChatEvent;
use App\Trainers;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('login');
        $this->middleware('AvoidStudentsAndAdmins');
    }
    //
    //
    //
    public function chat()
    {
        $TrainerRounds = TrainerController::TrainerRounds();

        $HistoryRounds = TrainerController::HistoryRounds();

        return View('Trainer.chat',['TrainerRounds'=>$TrainerRounds,'HistoryRounds'=>$HistoryRounds]);
    }

    public function send(Request $request)
    {
        $Trainer = Trainers::find(session('Id'));
        event(new ChatEvent($request->message,$Trainer));
    }

    // public function send()
    // {
    //     $message = 'Hello';
    //     $Trainer = Trainers::find(session('Id'));
    //     event(new ChatEvent($message,$Trainer));
    // }
}
