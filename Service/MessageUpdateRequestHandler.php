<?php

namespace TheRoom\TelegramBotBundle\Service;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use TheRoom\TelegramBotBundle\Event\WebHookRequestCreatedEvent;
use TheRoom\TelegramBotBundle\Http\WebHookRequest;

class MessageUpdateRequestHandler
{
	/**
	 * @var EventDispatcherInterface
	 */
	private $eventDispatcher;

	/**
	 * @param EventDispatcherInterface $eventDispatcher
	 */
	public function __construct(EventDispatcherInterface $eventDispatcher)
	{
		$this->eventDispatcher = $eventDispatcher;
	}

	/**
	 * @param Request $request
	 * @param string $token
	 */
	public function handleWebHookMessageUpdates(Request $request, $token)
	{
		$request = new WebHookRequest($request, $token);
		$this->dispatchWebHookRequestCreated($request);
	}

	/**
	 * @param WebHookRequest $webHookRequest
	 */
	private function dispatchWebHookRequestCreated(WebHookRequest $webHookRequest)
	{
		$event = new WebHookRequestCreatedEvent();
		$event->setWebHookRequest($webHookRequest);
		$this->eventDispatcher->dispatch(
			'the_room.telegram.bot.web_hook_request_created',
			$event
		);
	}
}
