<form enctype="multipart/form-data" action="?type=admin&action=changeProduit" method="post" class="form-control">
    <div class="mt-5 mb-5 d-flex flex-column align-items-center">
        <input type="hidden" name="id" value="<?= $produit->getId()?>">
        <input class="mt-5" type="text" name="titre" value="<?= $produit->getTitre() ?>">
        <textarea placeholder="<?= $produit->getDescription() ?>" class="mt-5" style="resize: none;" name="description" cols="30" rows="10"></textarea>
        <input class="mt-5" type="file" name="image">
        <label for="image">Changer la photo du produit (obligatoire même si c'est la même)</label>
        <button class="btn btn-success mt-5" type="submit">MODIFIER LE PRODUIT</button>
    </div>
</form>