<?php


(function ($av, $ac) {

    $genFunTemplate = function ($fName, $dir) {
        $namespaceName = ucfirst($dir);

        return "<?php

namespace FPPHP\\{$namespaceName};

function {$fName}() {
}
        ";
    };

    $genTestTemplate = function ($fName, $dir) {
        $namespaceName = ucfirst($dir);
        $className = ucfirst($fName) . "Test";

        return "<?php

namespace Tests\\{$namespaceName};

use PHPUnit\\Framework\\TestCase;
use function FPPHP\\{$namespaceName}\\{$fName};


class {$className} extends TestCase
{
    public function test()
    {

    }
}
        ";
    };

    $args = array_slice($av, 1);

    if (count($args) <= 1) {
        echo "You should provided required args exe: php genFunction.php <fName> <dir>\n";
        die();
    }

    $fName = $args[0];
    $dirName = $args[1];
    $base = __DIR__ . DIRECTORY_SEPARATOR . "..";

    $fPath = $base . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $fName . ".php";
    $testPath = $base . DIRECTORY_SEPARATOR . "tests" . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . ucfirst($fName) . "Test.php";
    $composerPath = $base . DIRECTORY_SEPARATOR . "composer.json";

    echo "Creating function file.\n";
    file_put_contents($fPath, $genFunTemplate($fName, $dirName));

    echo "Creating Test for function.\n";
    file_put_contents($testPath, $genTestTemplate($fName, $dirName));

    echo "Updating composer.\n";
    $composer = json_decode(file_get_contents($composerPath));
    array_push($composer->autoload->files, "src/{$dirName}/{$fName}.php");
    file_put_contents($composerPath, json_encode($composer));

    echo "Dump autoload.";
    exec("composer dump-autoload -d {$base}");

    echo "All done!";
})($argv, $argc);
