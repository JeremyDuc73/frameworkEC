<h1 class="text-center mt-4 scroll">NOS PRODUITS</h1>
<?php if (\App\Session::getUser()){ ?>
    <a class="btn btn-success d-flex justify-content-center container" href="?type=admin&action=createCategorieProduits">AJOUTER UNE CATEGORIE DE PRODUITS</a>
<?php } ?>
<?php foreach ($categories as $categorie) : ?>
    <div class="categorieProduits">
        <h2 class="h2CategorieProduits"><?=$categorie->getTitre()?></h2>
        <?php if (\App\Session::getUser()){ ?>
                <div class="d-flex">
                    <a class="btn btn-danger" href="?type=admin&action=removeCategorieProduits&id=<?= $categorie->getId() ?>">SUPPRIMER LA CATEGORIE</a>
                    <a class="ms-4 btn btn-warning" href="?type=admin&action=changeCategorieProduits&id=<?= $categorie->getId() ?>">MODIFIER LA CATEGORIE</a>
                </div>
        <?php } ?>
        <hr>
        <div class="container">
            <?php if (\App\Session::getUser()){ ?>
                <a class="btn btn-success" style="display: block;margin-right: auto;margin-left: auto; width: 400px" href="?type=admin&action=createProduit&catId=<?= $categorie->getId() ?>">AJOUTER UN PRODUIT</a>
            <?php } ?>
            <div class="containerProduits row">
                <?php foreach ($produits as $produit) : ?>
                        <?php
                        if ($categorie->getId() == $produit->getCatId()){ ?>
                            <div class="produits col-12 col-sm-6 col-lg-3 mt-4">
                            <img class="imageProduit" src="img/<?= $produit->getImage() ?>" alt="image produit">
                            <h4><?=$produit->getTitre()?></h4>
                            <p class="descriptionProduit"><?=$produit->getDescription()?></p>
                                <?php if (\App\Session::getUser()){ ?>
                                        <div class="d-flex flex-column">
                                            <a class="mt-3 btn btn-danger" href="?type=admin&action=removeProduit&id=<?= $produit->getId() ?>&photo=<?= $produit->getImage() ?>">SUPPRIMER LE PRODUIT</a>
                                            <a class="mt-3 btn btn-warning" href="?type=admin&action=changeProduit&id=<?= $produit->getId() ?>">MODFIER LE PRODUIT</a>
                                        </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
<?php endforeach; ?>
