<?php

namespace TheRoom\TelegramBotBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use TheRoom\TelegramBotBundle\Http\WebHookRequest;

class WebHookRequestCreatedEvent extends Event
{
    /** @var WebHookRequest $webHookRequest */
    private $webHookRequest;

    /**
     * @return WebHookRequest
     */
    public function getWebHookRequest()
    {
        return $this->webHookRequest;
    }

    /**
     * @param WebHookRequest $webHookRequest
     */
    public function setWebHookRequest(WebHookRequest $webHookRequest)
    {
        $this->webHookRequest = $webHookRequest;
    }
}
