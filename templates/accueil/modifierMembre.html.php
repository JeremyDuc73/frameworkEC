<form enctype="multipart/form-data" action="?type=admin&action=changeMembre" method="post" class="form-control">
    <div class="mt-5 mb-5 d-flex flex-column align-items-center">
        <input type="hidden" name="id" value="<?= $membre->getId()?>">
        <input class="mt-5" type="text" name="identite" value="<?= $membre->getIdentite() ?>">
        <textarea placeholder="<?= $membre->getParcours() ?>" class="mt-5" style="resize: none;" name="parcours" cols="30" rows="10"></textarea>
        <input class="mt-5" type="file" name="photo">
        <label for="photo">Changer la photo du membre (obligatoire même si c'est la même)</label>
        <button class="btn btn-success mt-5" type="submit">MODIFIER LE MEMBRE</button>
    </div>
</form>