<?php

namespace TheRoom\TelegramBotBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class WebHookController extends Controller
{
    /**
     * @param Request $request
     * @param $token
     *
     * @return Response
     */
    public function handleMessageUpdatesAction(Request $request, $token)
    {
        $this
            ->get('the_room.telegram_bot.service.message_update_request_handler')
            ->handleWebHookMessageUpdates($request, $token);

        return new JsonResponse([]);
    }
}
