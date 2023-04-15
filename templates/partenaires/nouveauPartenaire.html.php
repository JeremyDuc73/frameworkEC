<form enctype="multipart/form-data" action="?type=admin&action=createPartenaire" method="post" class="form-control">
    <div class="mt-5 mb-5 d-flex flex-column align-items-center">
        <input class="mt-5" type="text" name="nom" placeholder="Nom de la marque">
        <textarea class="mt-5" style="resize: none;" name="description" cols="30" rows="10" placeholder="description de la marque"></textarea>
        <input class="mt-5 w-50" type="text" name="lien" placeholder="Mettre le lien vers le site du partenaire">
        <input class="mt-5" type="file" name="logo">
        <label for="photo">Logo du partenaire</label>
        <button class="btn btn-success mt-5" type="submit">AJOUTER LE PARTENAIRE</button>
    </div>
</form>
