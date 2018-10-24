<?php
include('inc/head.php');
include('src/FileManager.php');

$fileManager = new FileManager();
$nameFile = $_GET['nameFile'];
$is_edit = false;

if (isset($_POST["contain"])) {
    $fileManager->validEditFile($nameFile, $_POST["contain"]);
    $is_edit = true;
}
$contain = $fileManager->editFile($nameFile);

?>

<h2>
    <?php if (!$is_edit): ?>
        Editon du fichier <?php echo $nameFile; ?>
    <?php else: ?>
    Le fichier <?php echo $nameFile; ?> a bien été modifié
<?php endif ?>
</h2>

<form method="POST" action ='edit.php?nameFile=<?php echo "$nameFile" ?>' >
    <textarea class="form-control" id="contain" rows="20" name="contain"><?php echo $contain ?></textarea>
    <input type="hidden" id="file" class="form-control" name="file">
            <button type="submit">Envoyer</button>
            <a class='pull-right btn' href="index.php" role="button">Retour</a>

</form>
