<?php
/**
 * Created by PhpStorm.
 * User: kkeker
 * Date: 31.05.2017
 * Time: 19:00
 */

namespace kkeker\EY;

class ReadConfig
{
    private function confFile()
    {
        return json_decode(file_get_contents("Config.json"), true);
    }

    private function readConfig()
    {
        return $this->confFile()['Mode'];
    }

    public function getSettings()
    {
        switch ($this->readConfig()) {
            case 'Development':
                return $this->confFile()['Development'];
                break;
            case 'Testing':
                return $this->confFile()['Testing'];
                break;
            case 'Production':
                return $this->confFile()['Production'];
                break;
            default:
                return $this->confFile()['Production'];
                break;
        }
    }
}