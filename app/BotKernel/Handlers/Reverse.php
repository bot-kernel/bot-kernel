<?php

namespace App\BotKernel\Handlers;

use App\BotKernel\MessengerContexts\IMessengerContext;

class Reverse implements IMessageHandler
{

    public function handle(IMessengerContext $messenger)
    {
        $message = $messenger->getMessage();

        $spaceIndex = strpos($message, ' ');

        return strrev(substr($message, $spaceIndex + 1));
    }
}
