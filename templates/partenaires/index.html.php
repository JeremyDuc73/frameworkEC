<h1 class="text-center mt-4 scroll">NOS PARTENAIRES</h1>
<?php if (\App\Session::getUser()){ ?>
    <a class="btn btn-success d-flex justify-content-center container" href="?type=admin&action=createPartenaire">AJOUTER UN PARTENAIRE</a>
<?php } ?>
<?php foreach ($partenaires as $partenaire) : ?>

    <div class="partenaire container mb-5">
        <div class="logoPartenaire">
            <img class="img-fluid imgPartenaire" src="img/<?= $partenaire->getLogo() ?>" alt="logo American Crew">
        </div>
        <div class="textePartenaire">
            <h3 class="text-center mb-3"><?=$partenaire->getNom()?></h3>
            <p class="pPartenaire text-center"><?=$partenaire->getDescription()?></p>
            <a class="btn btn-light ctaPartenaire" target="_blank" href="<?=$partenaire->getLien()?>">SITE PARTENAIRE</a>
            <?php if (\App\Session::getUser()){ ?>
                    <div class="d-flex justify-content-around mt-3">
                        <a class="btn btn-danger" href="?type=admin&action=removePartenaire&id=<?= $partenaire->getId() ?>&logo=<?= $partenaire->getLogo() ?>">X</a>
                        <a class="btn btn-warning" href="?type=admin&action=changePartenaire&id=<?= $partenaire->getId() ?>">MODIFIER CE PARTENAIRE</a>
                    </div>
            <?php } ?>
        </div>
    </div>
<?php endforeach; ?>