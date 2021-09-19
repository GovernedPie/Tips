<?php

namespace tips;

use pocketmine\scheduler\Task;
use pocketmine\Server;

class TipTasks extends Task{
    public function onRun(int $currentTick){
        $plugin = Server::getInstance()->getPluginManager()->getPlugin("Tips");
       $messages = [
           $plugin->getTipsConfig()->get("tip1"),
           $plugin->getTipsConfig()->get("tip2"),
           $plugin->getTipsConfig()->get("tip3"),
           $plugin->getTipsConfig()->get("tip4"),
           $plugin->getTipsConfig()->get("tip5"),
           ];
       Server::getInstance()->broadcastMessage($plugin->getTipsConfig()->get("header") . " " . self::random($messages));
    }
    public function random(array $array){
        return $array[array_rand($array)];
    }
}