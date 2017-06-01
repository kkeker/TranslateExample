<?php
/**
 * Created by PhpStorm.
 * User: kkeker
 * Date: 31.05.2017
 * Time: 17:15
 */

namespace kkeker\EY;

class App
{
    public function Load()
    {
        $Folders = [
            __DIR__,
            "Lib",
            "Actions"
        ];
        foreach ($Folders as $dirname) {
            set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . "/" . $dirname);
        }
    }

    public function Import(){
        require_once ('ReadConfig.php');
        require_once ('LoadDictionary.php');

        require_once ('PrintExample.php');
    }
}

$Loader = new App();
$Loader->Load();
$Loader->Import();

$Action = new PrintExample();
if (isset($_GET['lang'])){
    $Action->Run($_GET['lang']);
}else{
    $Action->Run(null);
}


