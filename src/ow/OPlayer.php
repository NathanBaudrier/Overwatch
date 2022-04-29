<?php

namespace ow;

use ow\hero\Hero;
use pocketmine\player\Player;

class OPlayer extends Player {

    private int $ultimate = 0;
    private ?Hero $hero = null;


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

}
