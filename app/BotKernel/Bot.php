<?php

namespace App\BotKernel;

use App\BotKernel\Handlers\HandlerDecorator;
use App\BotKernel\Handlers\Start;
use App\BotKernel\MessengerContexts\IMessengerContext;

class Bot
{
    /**
     * @var HandlerDecorator[]
     */
    private $handlers = [];

    private $middleware;

    private $contextService;

    public function addHandler($handler, $pattern, $context = null)
    {
        $this->handlers[] = new HandlerDecorator($handler, $pattern, $context);

        return $this;
    }

    /**
     * @param IMessengerContext $messenger
     * @return string
     * @throws \Exception
     */
    public function handleMessage(IMessengerContext $messenger)
    {
        $userContext = $messenger->getUser() ?
            $messenger->getUser()->getContext() :
            null;

        $messageBack = null;

        foreach ($this->handlers as $handler) {
            if ($userContext !== $handler->getContext()) {
                continue;
            }
            if (!$handler->match($messenger)) {
                continue;
            }

            $messageBack = $handler->handle($messenger);
        }

        return $messageBack;
    }
}
