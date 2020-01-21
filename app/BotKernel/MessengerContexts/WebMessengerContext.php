<?php

namespace App\BotKernel\MessengerContexts;

use App\BotKernel\User\IUser;

class WebMessengerContext implements IMessengerContext
{
    /**
     * @var mixed
     */
    private $message;

    /**
     * @var IUser
     */
    private $user;

    /**
     * @var mixed
     */
    private $payload;

    public function getMessenger()
    {
        return 'web';
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getUser(): ?IUser
    {
        return $this->user;
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
