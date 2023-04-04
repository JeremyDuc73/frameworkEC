<div class="presentation">
    <div class="container containerPresentation">
        <h1 class="text-center">EMOTION COIFFURE</h1>
        <p class="text-center">Notre équipe vous accueille dans une ambiance agréable, chaleureuse et professionnelle. Dès votre arrivée, vous vous sentirez comme chez vous. Vous aurez envie de vous faire chouchouter dans notre espace coiffure au sein de notre espace bien-être.</p>
    </div>
</div>
<div class="prestationsAccueil">
    <div class="container">
        <div class="titleAndBgPrestationsAccueil">
            <h2 class="text-center">nos prestations</h2>
        </div>
        <div class="linksPrestations">
            <div class="prestationsFemmes">
                <img class="img-fluid" src="img/femme.jpg" alt="photo d'une femme">
                <a class="btn btn-light ctaPrestations" href="#">prestations femmes</a>
            </div>
            <div class="prestationsHommes">
                <img class="img-fluid" src="img/homme.jpg" alt="photo d'un homme">
                <a class="btn btn-light ctaPrestations" href="#">prestations hommes</a>
            </div>
        </div>
    </div>
</div>
<div class="produitsAccueil">
    <div class="container containerProduitsAccueil">
        <div class="imgProduitsAccueil">
            <img class="img-fluid" src="img/produits.jpg" alt="photo de l'étagère des produits">
        </div>
        <div class="partieDroiteProduitsAccueil">
            <h2 class="text-center">nos produits</h2>
            <p class="text-center">Nous proposons au salon une large gamme de produits de nos partenaires, shampoings, coiffants, soins, ... Venez chez nous pour les découvrir !</p>
            <a class="btn btn-light ctaNosProduits" href="">découvrir nos produits</a>
        </div>
    </div>
</div>

<div class="notreEquipe">
    <div class="container">
        <div class="titleAndBgNotreEquipe">
            <h2 class="text-center">notre equipe</h2>
        </div>
        <div class="equipe">
            <?php foreach ($membres as $membre) : ?>
                <div class="membre">
                    <div class="photo"></div>
                    <div class="texteMembre">
                        <h4 class="identite"><?=$membre->getIdentite()?></h4>
                        <p class="parcours"><?=$membre->getParcours()?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>