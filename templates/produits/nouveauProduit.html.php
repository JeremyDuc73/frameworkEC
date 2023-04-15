<form enctype="multipart/form-data" action="?type=admin&action=createProduit" method="post" class="form-control">
    <div class="mt-5 mb-5 d-flex flex-column align-items-center">
        <input type="hidden" name="catId" value="<?= $catProduits->getId()?>">
        <input class="mt-5" type="text" name="titre" placeholder="Nom du produit">
        <textarea class="mt-5" style="resize: none;" name="description" cols="30" rows="10" placeholder="description du produit"></textarea>
        <input class="mt-5" type="file" name="image">
        <label for="image">Photo du produit</label>
        <button class="btn btn-success mt-5" type="submit">AJOUTER LE PRODUIT</button>
    </div>
</form>