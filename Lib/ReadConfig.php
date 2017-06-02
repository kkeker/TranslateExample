<?php
/**
 * Created by PhpStorm.
 * User: kkeker
 * Date: 31.05.2017
 * Time: 19:00
 */

namespace kkeker\EY;

class ReadConfig //Класс чтения конфигурационного файла.
{
    private function confFile() //Приватная функция читающая JSON и возвращающая Array.
    {
        return json_decode(file_get_contents("Config.json"), true);
    }

    private function readConfig() //Читаем опцию Mode в конфигурационном файле, определяя режим запуска.
    {
        return $this->confFile()['Mode'];
    }

    public function getSettings()
    {
        switch ($this->readConfig()) { //Перебор режимов запуска в секциях конфигурационного файла, в зависимости от Mode.
            case 'Development':
                return $this->confFile()['Development']; //Возвращаем только нужный фрагмент конфигурационного файла в виде массива.
                break;
            case 'Testing':
                return $this->confFile()['Testing'];
                break;
            case 'Production':
                return $this->confFile()['Production'];
                break;
            default:
                return $this->confFile()['Production']; //Выбираем этот режим, если Mode не задан вовсе.
                break;
        }
    }
}