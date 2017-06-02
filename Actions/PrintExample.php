<?php
/**
 * Created by PhpStorm.
 * User: kkeker
 * Date: 31.05.2017
 * Time: 17:59
 */

namespace kkeker\EY;
require_once('LoadDictionary.php'); //Подключаем загрузку словаря. Благодаря классу инициации в App.php мы не используем полные пути файлов.

class PrintExample
{
    public function Run($Lang) //Получаем параметр языка и выполняем действия.
    {
        if (empty($Lang)) { //Проверка. Если параметр $lang не был передан в GET, то читаем язык по умолчанию из конфигурационного файла.
            $Config = new ReadConfig();
            $setLang = $Config->getSettings()['DefaultLang'];
        } else { //Иначе, если параметр $lang был передан методом GET, то используем его и игнорируем конфигурационный файл.
            $setLang = $Lang;
        }

        $Dictionary = new LoadDictionary(); //Построение экземпляра класса для подключения словаря.
        $Hello = $Dictionary->getDictionary($setLang)['Hello']; //Читаем из словаря значение параметра Hello (не слова, параметра).

        //Построчный вывод результата, где $Hello зависит от $setLang и читается из соотвествующего файла словаря.
        $Example = "Приветствие на разных языках: \n";
        $Example .= "Вы установили системный язык в режим $setLang \n";
        $Example .= "Поэтому приветствие на выбранно языке будет звучать как - $Hello \n";

        print $Example;
    }
}