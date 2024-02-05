<?php

declare(strict_types=1);

namespace microDEON\Mvc\Controller;

class Error404Controller implements Controller
{
    public function processaRequisicao(): void
    {
        require_once  __DIR__ . '/../../views/404-error.php';
    }
}
