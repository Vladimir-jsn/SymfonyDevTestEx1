<?php

namespace App\Domain\UserAccount\Listener;

use App\Domain\UserAccount\Event\ChangePasswordEvent;

class ChangePasswordListener
{
    public function listener(ChangePasswordEvent $event)
    {
        die('event_listen');
    }
}