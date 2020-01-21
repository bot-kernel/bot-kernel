<?php

namespace App\BotKernel\MessengerContexts;

use App\BotKernel\User\IUser;

interface IMessengerContext
{
    public function getMessenger();

    public function getMessage();

    public function getUser(): ?IUser;

    public function getPayload();
}
