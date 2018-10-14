<?php

class FileManager
{
    public function listDirectoryAndFiles($path)
    {
        $objectsRecursiveIteratorIterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
        $listFiles = [];

        foreach ($objectsRecursiveIteratorIterator as $pathName => $objectSplFileInfo) {
            if ($objectSplFileInfo->getfilename() == '.' || $objectSplFileInfo->getfilename() == '..') {
                continue;
            }
            if (strpbrk($objectSplFileInfo->getfilename(), '.')) {
                $pathFile = strstr($objectSplFileInfo->getpathname(), '/' . $objectSplFileInfo->getfilename(), true); // recherche avant le masque
                $listFiles[$pathFile][] = $objectSplFileInfo->getfilename();
            } else {
                if (!key_exists($objectSplFileInfo->getfilename(), $listFiles)) {
                    $listFiles[$pathName] = [];
                }
            }
        }
        return $listFiles;
    }

    public function deleteFile($file)
    {
        unlink($file);
    }

    public function deleteDirectory($directory)
    {
        rmdir($directory);
    }

    public function editFile($file)
    {
        return file_get_contents($file);
    }

    public function validEditFile($file, $contain)
    {
        $file = fopen($file, "w");
        fwrite($file, $contain);
        fclose($file);
    }


}