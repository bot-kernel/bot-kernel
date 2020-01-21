<?php

namespace App\BotKernel\Handlers;

use App\BotKernel\MessengerContexts\IMessengerContext;

class Help implements IMessageHandler
{

    public function handle(IMessengerContext $messenger)
    {
        return "HELP! \n /start - Bot Description \n /rev {message} - Flip message";
    }
}
