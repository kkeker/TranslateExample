<?php
/**
 * Created by PhpStorm.
 * User: kkeker
 * Date: 31.05.2017
 * Time: 17:59
 */

namespace kkeker\EY;
require_once('LoadDictionary.php');

class PrintExample
{
    public function Run($Lang)
    {
        if (empty($Lang)) {
            $Config = new ReadConfig();
            $setLang = $Config->getSettings()['DefaultLang'];
        } else {
            $setLang = $Lang;
        }

        $Dictionary = new LoadDictionary();
        $Hello = $Dictionary->getDictionary($setLang)['Hello'];

        $Example = "Приветствие на разных языках: \n";
        $Example .= "Вы установили системный язык в режим $setLang \n";
        $Example .= "Поэтому приветствие на выбранно языке будет звучать как - $Hello \n";

        print $Example;
    }
}