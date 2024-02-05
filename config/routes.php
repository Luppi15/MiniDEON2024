<?php

declare(strict_types=1);

return [
    'GET|/' => \microDEON\Mvc\Controller\VideoListController::class,
    'GET|/novo-video' => \microDEON\Mvc\Controller\VideoFormController::class,
    'POST|/novo-video' => \microDEON\Mvc\Controller\NewVideoController::class,
    'GET|/editar-video' => \microDEON\Mvc\Controller\VideoFormController::class,
    'POST|/editar-video' => \microDEON\Mvc\Controller\EditVideoController::class,
    'GET|/remover-video' => \microDEON\Mvc\Controller\DeleteVideoController::class,
    'GET|/404-error' => \microDEON\Mvc\Controller\Error404Controller::class,
];
