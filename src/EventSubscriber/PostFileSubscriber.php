<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PostFileSubscriber implements EventSubscriberInterface
{
    public function onEasyAdminPrePersist($event)
    {
        $result = $event->getSubject();
        $method = $event->getArgument('request')->getMethod();
        dump($result);
        dump($method);
        dd('onEasyAdminPrePersist');
    }

    public static function getSubscribedEvents()
    {
        return [
            'easy_admin.pre_persist' => 'onEasyAdminPrePersist',
        ];
    }
}
