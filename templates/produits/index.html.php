<h1 class="text-center mt-4">NOS PRODUITS</h1>
<?php foreach ($categories as $categorie) : ?>
    <div class="categorieProduits">
        <h2><?=$categorie->getTitre()?></h2>
        <hr>
        <div class="container">
            <div class="containerProduits row">
                <?php foreach ($produits as $produit) : ?>
                        <?php
                        if ($categorie->getId() == $produit->getCatId()){ ?>
                            <div class="produits col-4">
                            <img class="imageProduit" src="img/produitTest.jpg" alt="image produit">
                            <h4><?=$produit->getTitre()?></h4>
                            <p class="descriptionProduit"><?=$produit->getDescription()?></p>
                            </div>
                        <?php } ?>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
<?php endforeach; ?>
