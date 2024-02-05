<?php
require_once __DIR__ . '/inicio-html.php';
/** @var \microDEON\Mvc\Entity\Video[] $videoList */
?>

<ul class="videos__container">
    <?php foreach ($videoList as $video): ?>
        <li class="videos__item">
            <iframe width="100%" height="72%" src="<?= $video->url; ?>"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            <div class="descricao-video">
                <h3><?= $video->title; ?></h3>
                <div class="acoes-video">
                    <a href="/editar-video?id=<?= $video->id; ?>">Editar</a>
                    <!--<a href="/remover-video?id=<?= $video->id; ?>">Excluir</a>-->
                </div>
            </div>
        </li>
    <?php endforeach; ?>
</ul>

    <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSd_M8EB7Zc6hkeTHfm85YrffjVh-i9GU4rhOCnfAW_rbN_3gA/viewform?embedded=true" width="500" height="1200" frameborder="0" marginheight="0" marginwidth="0">Carregando…</iframe>
<?php require_once __DIR__ . '/fim-html.php';