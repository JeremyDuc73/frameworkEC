<form action="?type=admin&action=changeCategorieProduits" method="post" class="form-control">
    <div class="mt-5 mb-5 d-flex flex-column align-items-center">
        <input type="hidden" name="id" value="<?= $catProduits->getId()?>">
        <input type="text" name="titre" value="<?= $catProduits->getTitre()?>">
        <button class="btn btn-success mt-5" type="submit">MODIFIER LA CATEGORIE</button>
    </div>
</form>