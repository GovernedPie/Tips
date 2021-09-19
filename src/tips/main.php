<?php

namespace tips;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\Config;

class main extends PluginBase{
    public function onEnable(){
        $this->saveResource("Tips.yml");
        $this->scheduleTasks();
        $this->TipsConfig = new Config($this->getDataFolder() . "Tips.yml", Config::YAML);
        $this->getLogger()->info("Plugin enabled");
    }
    public Config $TipsConfig;
    public function getTipsConfig(): Config{
        return $this->TipsConfig;
    }
    public function onLoad(){
       $this->getLogger()->info("Plugin loading");
    }
    public function onDisable(){
       $this->getLogger()->info("Plugin disabled");
    }
    public function scheduleTasks(){
        $this->TipsConfig = new Config($this->getDataFolder() . "Tips.yml", Config::YAML);
        $plugin = Server::getInstance()->getPluginManager()->getPlugin("Tips");
        $this->getScheduler()->scheduleRepeatingTask(new TipTasks(), $plugin->getTipsConfig()->get("repeating_time") * 20);
    }
}