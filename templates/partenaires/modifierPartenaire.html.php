<form enctype="multipart/form-data" action="?type=admin&action=changePartenaire" method="post" class="form-control">
    <div class="mt-5 mb-5 d-flex flex-column align-items-center">
        <input type="hidden" name="id" value="<?= $partenaire->getId()?>">
        <input class="mt-5" type="text" name="nom" value="<?= $partenaire->getNom() ?>">
        <textarea placeholder="<?= $partenaire->getDescription() ?>" class="mt-5" style="resize: none;" name="description" cols="30" rows="10"></textarea>
        <input class="mt-5 w-50" type="text" name="lien" value="<?= $partenaire->getLien() ?>">
        <input class="mt-5" type="file" name="logo">
        <label for="photo">Changer le logo du partenaire (obligatoire même si c'est le même)</label>
        <button class="btn btn-success mt-5" type="submit">MODIFIER LE PARTEBNAIRE</button>
    </div>
</form>
