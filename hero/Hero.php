<?php

namespace ow\hero;

abstract class Hero {

    const SUPPORT_CATEGORY = 0;
    const DAMAGE_CATEGORY = 1;
    const TANK_CATEGORY = 2;

    private string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function getName() : string {
        return $this->name;
    }

    abstract public function getAvatarUrl() : string; //After, in the texture pack

    abstract public function getMaxLife() : float;

    abstract public function getCategory() : int;

    abstract public function getDamage() : float;

    abstract public function getCriticalDamage() : float;

    abstract public function useUltimate() : void;

}