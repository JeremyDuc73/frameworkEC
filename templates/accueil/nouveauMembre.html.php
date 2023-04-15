<form enctype="multipart/form-data" action="?type=admin&action=createMembre" method="post" class="form-control">
    <div class="mt-5 mb-5 d-flex flex-column align-items-center">
        <input class="mt-5" type="text" name="identite" placeholder="Prénom et nom">
        <textarea class="mt-5" style="resize: none;" name="parcours" cols="30" rows="10" placeholder="description du parcours"></textarea>
        <input class="mt-5" type="file" name="photo">
        <label for="photo">Photo du membre</label>
        <button class="btn btn-success mt-5" type="submit">AJOUTER</button>
    </div>
</form>