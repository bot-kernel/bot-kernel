<?php

namespace App\BotKernel\MessengerContexts;

use App\BotKernel\User\IUser;

class TelegramMessengerContext implements IMessengerContext
{
    /**
     * @var mixed
     */
    private $message;

    /**
     * @var mixed
     */
    private $payload;

    /**
     * @var IUser
     */
    private $user;


    public function getMessenger()
    {
        return 'telegram';
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getUser(): ?IUser
    {
        // TODO: Implement getUser() method.
    }

    public function getPayload()
    {
        // TODO: Implement getPayload() method.
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @param mixed $payload
     */
    public function setPayload($payload)
    {
        $this->payload = $payload;
    }
}
