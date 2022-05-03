<?php 

namespace ow\events;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerCreationEvent;
use pocketmine\event\player\PlayerJoinEvent;
use ow\OPlayer;

class PlayerEvents implements Listener {

    public function onCreation(PlayerCreationEvent $event) : void {
        $event->setPlayerClass(OPlayer::class);
    }

    public function onJoin(PlayerJoinEvent $event) : void {
        $player = $event->getPlayer();
        $event->setJoinMessage(""); //Remplacer 
        if(!$player->hasAccount()) {
            //Form de bienvenue au pire, explication
        }
    }

}

?>