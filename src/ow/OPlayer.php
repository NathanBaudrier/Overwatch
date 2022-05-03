<?php

namespace ow;

use ow\hero\Hero;
use ow\games\GameManager;
use pocketmine\player\Player;
use pocketmine\utils\Config;
use pocketmine\Server;
use pocketmine\network\mcpe\NetworkSession;
use pocketmine\entity\Location;
use pocketmine\player\PlayerInfo;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\entity\Entity;

class OPlayer extends Player {

    const LEVEL = "level";
    const FRIENDS = "friends";

    private int $ultimate = 0;
    private ?Hero $hero = null;
    private Config $dataConfig;

    public function __construct(Server $server, NetworkSession $session, PlayerInfo $playerInfo, bool $authenticated, Location $spawnLocation, ?CompoundTag $namedtag) {
        parent::__construct($server, $session, $playerInfo, $authenticated, $spawnLocation);
        $this->dataConfig = Main::getDataConfig();
	}

    public function getUltimatePercent() : int {
        return $this->ultimate;
    }

    public function addUltimatePercent(int $percent) : void {
        $this->ultimate += $percent;
    }

    public function hasUltimate() : bool {
        return $this->ultimate >= 0;
    }

    public function getHero() : ?Hero {
        return $this->hero;
    }

    public function setHero(?Hero $hero) : void {
        $this->hero = $hero;
    }

    public function hasAccount() : bool|Config {
        return $this->dataConfig->get($this->getUniqueId()->toString());
    }

    public function createAccount() : void {
        if(!$this->dataConfig->get($this->getUniqueId()->toString())) {
            $this->dataConfig->set($this->getUniqueId()->toString(), [self::LEVEL => 0, self::FRIENDS => []]); //Soon ranked points 
        } 
    }

    public function initData() : void {
        $this->dataConfig->save();
    }

    public function attackEntity(Entity $entity) : void {
        //Todo 
    }

    public function getGame() : ?Game {
        foreach (GameManager::getGames() as $game) {
            foreach ($game->getPlayers() as $player) if($player->getUniqueId()->toString() == $this->getUniqueId()->toString()) return $game;
        }
        return null;
    }

}
