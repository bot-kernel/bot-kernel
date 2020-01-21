<?php


namespace App\BotKernel\Handlers;


use App\BotKernel\MessengerContexts\IMessengerContext;
use App\BotKernel\User\IBotUserManager;

class SetName implements IMessageHandler
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
        $name = $messenger->getMessage();

        $this->userManger
            ->setUser($messenger->getUser())
            ->setPayload(['name' => $name])
            ->setContext(null);


        return 'Okay, ' . $name;
    }
}
