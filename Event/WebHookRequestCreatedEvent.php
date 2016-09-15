<?php

namespace TheRoom\TelegramBotBundle\Event;

use TheRoom\TelegramBotBundle\Http\WebHookRequest;

class WebHookRequestCreatedEvent
{
	/**
	 * @var WebHookRequest
	 */
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
