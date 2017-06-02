<?php
/**
 * Created by PhpStorm.
 * User: kkeker
 * Date: 31.05.2017
 * Time: 17:15
 */

namespace kkeker\EY; //Пространство имен, чтобы не переменные, глассы и прочие имена, не пересекались с другими проектами и модулями.

class App //Класс инициализации приложения
{
    public function Load() //Функция задающая поти поиска файлов для подключения.
    {
        $Folders = [ //Перечисление путей поиска для подключения.
            __DIR__, //Текущая папка, относительно этого файла.
            "Lib",
            "Actions"
        ];
        foreach ($Folders as $dirname) {
            set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . "/" . $dirname); //Циклическое подключение папок из массива выше.
        }
    }

    public function Import(){ //Функция импорта библиотек классов.
        require_once ('ReadConfig.php'); //Системная библиотека.
        require_once ('LoadDictionary.php'); //Системная библиотека.

        require_once ('PrintExample.php'); //Пример файла действий, т.е. приложение внутри данного micro-Framework.
    }
}

$Loader = new App(); //Построение экземпляра класса.
$Loader->Load(); //Инициация добавления путей поиска.
$Loader->Import(); //Подключение библиотек классов и расширений.

//Простое условия проверки. Есть методом GET был передан параметр $lang (http://examole.com/App.php?lang=en), то используем его, если нет,
//то станавливаем данный параметрт равным null.
$Action = new PrintExample();
if (isset($_GET['lang'])){
    $Action->Run($_GET['lang']);
}else{
    $Action->Run(null);
}


