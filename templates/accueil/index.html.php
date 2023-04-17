<div class="presentation">
    <div class="container containerPresentation">
        <h1 class="text-center h1Accueil">EMOTION COIFFURE</h1>
        <p class="text-center">Des mains expertes pour mettre en valeur votre beauté! Venez découvrir votre salon Emotion Coiffure, vous serez accueilli dans une ambiance chaleureuse et conviviale. Notre ambition vous écoutez, vous conseillez, vous sublimez</p>
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
                <a class="btn btn-light ctaPrestations" href="?type=static&action=prestations#femme">prestations femmes</a>
            </div>
            <div class="prestationsHommes">
                <img class="img-fluid" src="img/homme.jpg" alt="photo d'un homme">
                <a class="btn btn-light ctaPrestations" href="?type=static&action=prestations#homme">prestations hommes</a>
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
            <a class="btn btn-light ctaNosProduits" href="?type=advanced&action=categoriesProduits">découvrir nos produits</a>
        </div>
    </div>
</div>

<div class="notreEquipe">
    <div class="container">
        <div class="titleAndBgNotreEquipe">
            <h2 class="text-center">notre equipe</h2>
        </div>
        <?php if (\App\Session::getUser()){ ?>
            <a class="btn btn-success d-flex justify-content-center" href="?type=admin&action=createMembre">AJOUTER UN MEMBRE</a>
        <?php } ?>
        <div class="equipe">
            <?php foreach ($membres as $membre) : ?>
                <div class="membre">
                    <div class="photo" style="background-image: url('img/<?= $membre->getPhoto() ?>')"></div>
                    <div class="texteMembre">
                        <h4 class="identite"><?=$membre->getIdentite()?></h4>
                        <p class="parcours"><?=$membre->getParcours()?></p>
                    </div>
                    <?php if (\App\Session::getUser()){ ?>
                        <a class="btn btn-danger" href="?type=admin&action=removeMembre&id=<?= $membre->getId() ?>&photo=<?= $membre->getPhoto() ?>">X</a>
                        <a class="btn btn-warning" href="?type=admin&action=changeMembre&id=<?= $membre->getId() ?>">MODIFIER</a>
                    <?php } ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>