<?php

declare(strict_types=1);

namespace microDEON\Mvc\Controller;

use microDEON\Mvc\Entity\Video;
use microDEON\Mvc\Repository\VideoRepository;

class NewVideoController implements Controller
{
private const SENHA_CORRETA = 'Luppi#1505';
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        session_start();
        if (isset($_SESSION['bloqueioTemporario']) && $_SESSION['bloqueioTemporario'] > time()) {
            $tempoRestante = $_SESSION['bloqueioTemporario'] - time();
            // Pode adicionar uma mensagem informando ao usuário sobre o bloqueio
            header('Location: /?sucesso=0&bloqueado=1&tempo=' . $tempoRestante);
            return;
        }


        if (!isset($_SESSION['tentativasSenha'])) {
            $_SESSION['tentativasSenha'] = 0;
        }

        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

        if ($senha !== self::SENHA_CORRETA) {
            $_SESSION['tentativasSenha']++;

            if ($_SESSION['tentativasSenha'] >= 3) {
                $_SESSION['bloqueioTemporario'] = time() + 60;
                header('Location: /?sucesso=0&bloqueado=1');
                return;
            }
            header('Location: /?sucesso=0');
            return;
        }

        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
        $url = TransformEmbedController::embedYouTubeVideo($url);
        if ($url === false) {
            header('Location: /?sucesso=0');
            return;
        }

        $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
        if ($titulo === false) {
            header('Location: /?sucesso=0');
            return;
        }

        $titulo = htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8');

        $success = $this->videoRepository->add(new Video($url, $titulo));
        if ($success === false) {
            header('Location: /?sucesso=0');
        } else {
            $_SESSION['tentativasSenha'] = 0;

            if (isset($_SESSION['bloqueioTemporario']) && $_SESSION['bloqueioTemporario'] <= time()) {
                unset($_SESSION['bloqueioTemporario']);
            }

            header('Location: /?sucesso=1');
        }
    }
}