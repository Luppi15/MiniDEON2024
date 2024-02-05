<?php

declare(strict_types=1);

namespace microDEON\Mvc\Controller;

use microDEON\Mvc\Entity\Video;
use microDEON\Mvc\Repository\VideoRepository;


class EditVideoController implements Controller
{
    private const SENHA_CORRETA = 'Luppi#1505';
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === false || $id === null) {
            header('Location: /?sucesso=0');
            return;
        }

        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

        if ($senha !== self::SENHA_CORRETA) {
            header('Location: /?sucesso=0');
            return;
        }


        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
        $url = TransformEmbedController::embedYouTubeVideo($url);
        if ($url === false) {
            header('Location: /?sucesso=0');
            return;
        }
        $titulo = filter_input(INPUT_POST, 'titulo');
        if ($titulo === false) {
            header('Location: /?sucesso=0');
            return;
        }
        $titulo = htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8');

        $video = new Video($url, $titulo);
        $video->setId($id);

        $success = $this->videoRepository->update($video);

        if ($success === false) {
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}