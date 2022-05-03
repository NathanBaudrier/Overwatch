<?php 

namespace ow;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use ow\events\PlayerEvents;    

class Main extends PluginBase {

    private static self $instance;

    public function onEnable() : void {
        self::$instance = $this;
        if(!file_exists($this->getDataFolder() . "/Data.json")) @mkdir($this->getDataFolder() . "/Data.json");
        $this->getServer()->getPluginManager()->registerEvents(new PlayerEvents(), $this);
        var_dump($this->getServer()->getPluginPath());
        var_dump(self::getLang());
    }

    private function getDataConfig() : Config {
        return new Config($this->getDataFolder() . "/Data.json", Config::JSON);
    }

    public static function getInstance() : self {
        return self::$instance;
    }

    public static function getLang() : array {
        return json_decode(file_get_contents(self::$instance->getServer()->getPluginPath() . "Overwatch/src/ow/Lang.json"), true);
    }
}

?>