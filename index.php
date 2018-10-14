<?php include('inc/head.php'); ?>

    C'est ici que tu vas devoir afficher le contenu de tes repertoires et fichiers.<br>

<?php
$path = 'files';
include('src/FileManager.php');

$filesManager = new FileManager();
$listFiles = $filesManager->listDirectoryAndFiles($path);
$type_edit_file = ['text/plain', 'text/html'];

foreach ($listFiles as $directory => $files):
    $nbFiles = count($files);
    echo '<p>' . $directory . '</p>';
    if ($nbFiles === 0) {
        echo '<a href="delete.php?nameDirectory=' . $directory . '"> delete </a>';
    }
    ?>
    <table class="table">
        <tbody>
        <?php foreach ($files as $file): ?>
            <tr>
                <td><span class="marge_left"><?php echo $file ?></span></td>
                <?php if (in_array(mime_content_type($directory . '/' . $file), $type_edit_file)) : ?>
                    <td><a  href='edit.php?nameFile=<?php echo "$directory/$file" ?>' > edit </a></td>
                <?php else: ?>
                    <td></td>
                <?php endif ?>
                <td><a href='delete.php?nameFile=<?php echo"$directory/$file" ?>' > delete </a> </td>

            </tr>
        <?php endforeach ?>

        </tbody>
    </table>

<?php endforeach ?>

<?php include('inc/foot.php'); ?>