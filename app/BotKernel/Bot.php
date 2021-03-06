<?php

namespace App\BotKernel;

use App\BotKernel\Handlers\HandlerDecorator;
use App\BotKernel\MessengerContexts\IMessengerContext;

class Bot
{
    /**
     * @var HandlerDecorator[]
     */
    private $handlers = [];

    /**
     * TODO: Bot Middleware
     *
     * @var
     */
    private $middleware;

    /**
     * Add message handler
     *
     * @param mixed $handler
     * @param $pattern
     * @param null $context
     * @return $this
     */
    public function addHandler($handler, $pattern, $context = null)
    {
        $this->handlers[] = new HandlerDecorator($handler, $pattern, $context);

        return $this;
    }

    /**
     * Handle message for bot
     *
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
            if ($userContext !== $handler->getContext() || !$handler->match($messenger)) {
                continue;
            }

            $messageBack = $handler->handle($messenger);
        }

        return $messageBack;
    }
}
