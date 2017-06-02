<?php
/**
 * Created by PhpStorm.
 * User: kkeker
 * Date: 31.05.2017
 * Time: 18:02
 */

namespace kkeker\EY;

class LoadDictionary //Класс загрузки словарей. При этом, словари стстически не задаются в коде, а ищутся в папке.
{
    public function getDictionary($lang) //В зависимости от переданного параметра языка, ищем в папке Languages нужный файл словаря.
    {
        $LangFile = "Languages/$lang.json";
        if (file_exists($LangFile)) {
            $jsonDictionary = json_decode(file_get_contents($LangFile), true);
            return $jsonDictionary['dictionary']; //Возвращаем только содержимое нужного словаря, а не все словари.
        }
    }
}