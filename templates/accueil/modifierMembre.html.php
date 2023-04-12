<form enctype="multipart/form-data" action="?type=admin&action=changeMembre" method="post" class="form-control">
    <input type="hidden" name="id" value="<?= $membre->getId()?>">
    <input type="text" name="identite">
    <input type="text" name="parcours">
    <input type="file" name="photo">
    <button class="btn btn-success" type="submit">Ok</button>
</form>