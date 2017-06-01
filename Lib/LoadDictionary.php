<?php
/**
 * Created by PhpStorm.
 * User: kkeker
 * Date: 31.05.2017
 * Time: 18:02
 */

namespace kkeker\EY;

class LoadDictionary
{
    public function getDictionary($lang)
    {
        $LangFile = "Languages/$lang.json";
        if (file_exists($LangFile)) {
            $jsonDictionary = json_decode(file_get_contents($LangFile), true);
            return $jsonDictionary['dictionary'];
        }
    }
}