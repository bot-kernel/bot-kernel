<?php

namespace App\Http\Controllers;

use App\BotKernel\Bot;
use App\BotKernel\Handlers\AskName;
use App\BotKernel\Handlers\Reverse;
use App\BotKernel\Handlers\SetName;
use App\BotKernel\Handlers\Start;
use App\BotKernel\MessengerContexts\IMessengerContext;
use App\BotKernel\MessengerContexts\WebMessengerContext;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $messageBack = null;

        if ($request->has('message')) {

            $messenger = new WebMessengerContext();

            $messenger->setMessage($request->message);
            $messenger->setUser(auth()->user());

            $bot = new Bot();

            $bot
                ->addHandler(Start::class, '/start')
                ->addHandler(Reverse::class, function (IMessengerContext $context) {
                    return substr($context->getMessage(), 0, strlen('/rev')) === '/rev';
                })
                ->addHandler(AskName::class, '/name')
                ->addHandler(SetName::class, true, 'set_name');

            $messageBack = $bot->handleMessage($messenger);
        }

        return view('home', compact('messageBack'));
    }
}
