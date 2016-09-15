<?php

namespace TheRoom\TelegramBotBundle\Http;

use Symfony\Component\HttpFoundation\Request;

class WebHookRequest
{
	/**
	 * @var Request
	 */
	private $request;

	/**
	 * @var string
	 */
	private $token;

	/**
	 * @param Request $request
	 * @param string $token
	 */
	public function __construct(Request $request, $token)
	{
		$this->request = $request;
		$this->token = $token;
	}
}
