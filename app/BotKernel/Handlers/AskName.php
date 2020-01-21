<?php

namespace App\BotKernel\Handlers;

use App\BotKernel\MessengerContexts\IMessengerContext;
use App\BotKernel\User\IBotUserManager;

class AskName implements IMessageHandler
{
    /**
     * @var IBotUserManager
     */
    private $userManger;

    public function __construct(IBotUserManager $userManger)
    {
        $this->userManger = $userManger;
    }

    public function handle(IMessengerContext $messenger)
    {
        $this->userManger->setUser($messenger->getUser());

        $this->userManger->setContext('set_name');

        return 'Enter your name...';
    }
}
