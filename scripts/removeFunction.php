<?php


(function ($av, $ac) {
    $args = array_slice($av, 1);

    if (count($args) <= 1) {
        echo "You should provided required args exe: php removeFunction.php <fName> <dir>\n";
        die();
    }

    $fName = $args[0];

    $dirName = $args[1];
    $base = __DIR__ . DIRECTORY_SEPARATOR . "..";

    $fPath = $base . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $fName . ".php";
    $testPath = $base . DIRECTORY_SEPARATOR . "tests" . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . ucfirst($fName) . "Test.php";
    $composerPath = $base . DIRECTORY_SEPARATOR . "composer.json";

    if (!file_exists($fPath)) {
        echo "No file {$fName} in {$dirName}";
        die();
    }

    echo "Remove function {$fName}.\n";
    unlink($fPath);

    echo "Remove Test for {$fname}.\n";
    if (file_exists($testPath)) unlink($testPath);

    echo "Updating composer.\n";
    $composer = json_decode(file_get_contents($composerPath));
    $composer->autoload->files = array_filter($composer->autoload->files, function ($f) use ($fName, $dirName) {
        return $f !== "src/{$dirName}/{$fName}.php";
    });
    file_put_contents($composerPath, json_encode($composer));

    echo "Dump autoload.";
    exec("composer dump-autoload -d {$base}");

    echo "All done!";
})($argv, $argc);
