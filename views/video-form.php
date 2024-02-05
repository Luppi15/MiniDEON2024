<?php
require_once __DIR__ . '/inicio-html.php';
/** @var \microDEON\Mvc\Entity\Video|null $video */
?>
<main class="container">
    <form class="container__formulario"
          method="post">
        <h2 class="formulario__titulo">Envie um vídeo!</h2>
        <div class="formulario__campo">
            <label class="campo__etiqueta" for="url">Link video</label>
            <input name="url"
                   value="<?= $video?->url; ?>"
                   class="campo__escrita"
                   required
                   placeholder="Por exemplo: https://www.youtube.com/watch?v=MZQKk-OTyf4"
                   id='url' />
        </div>

        <div class="formulario__campo">
            <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
            <input name="titulo"
                   value="<?= $video?->title; ?>"
                   class="campo__escrita"
                   required
                   placeholder="Neste campo, dê o nome do vídeo."
                   type="text"
                   id='titulo' />
        </div>


        <div class="formulario__campo">
            <label class="campo__etiqueta" for="senha">Senha de acesso</label>
            <input name="senha"
                   value=""
                   class="campo__escrita"
                   required
                   placeholder="Caso seja um desenvolvedor informe a senha aqui."
                   type="password"
                   autocomplete="off"
            />
        </div>
        <input class="formulario__botao" type="submit" value="Enviar" />
    </form>
</main>

<?php
require_once __DIR__ . '/fim-html.php';