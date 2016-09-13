<?php

namespace TheRoom\TelegramBotBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TheRoomTelegramBotBundle:Default:index.html.twig');
    }
}
