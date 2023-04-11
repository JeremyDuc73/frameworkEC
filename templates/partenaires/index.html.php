<h1 class="text-center mt-4 scroll">NOS PARTENAIRES</h1>
<?php foreach ($partenaires as $partenaire) : ?>

    <div class="partenaire container">
        <div class="logoPartenaire">
            <img class="img-fluid imgPartenaire" src="img/logoAC.jpg" alt="logo American Crew">
        </div>
        <div class="textePartenaire">
            <h3 class="text-center mb-3"><?=$partenaire->getNom()?></h3>
            <p class="pPartenaire text-center"><?=$partenaire->getDescription()?></p>
            <a class="btn btn-light ctaPartenaire" target="_blank" href="<?=$partenaire->getLien()?>">SITE PARTENAIRE</a>
        </div>
    </div>
<?php endforeach; ?>