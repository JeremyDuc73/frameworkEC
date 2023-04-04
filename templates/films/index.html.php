<?php foreach ($films as $film) : ?>

    <hr>
    <h2><?=$film->getTitle() ?></h2>
    <img width="50px" src="images/<?= $film->getImage() ?>" alt="">

    <p><strong><?= $film->getSynopsis() ?></strong></p>
    <a href="?type=film&action=show&id=<?= $film->getId() ?>" class="btn btn-primary">Voir</a>
    <hr>


<?php endforeach; ?>
