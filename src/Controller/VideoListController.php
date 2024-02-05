<?php

declare(strict_types=1);

namespace microDEON\Mvc\Controller;

use microDEON\Mvc\Repository\VideoRepository;

class VideoListController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $videoList = $this->videoRepository->all();
        require_once __DIR__ . '/../../views/video-list.php';
    }
}
