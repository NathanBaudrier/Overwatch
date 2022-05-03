<?php

namespace ow\hero;

class Sombra extends Hero {

    public function __construct() {
        parent::__construct("Sombra");
    }

    public function getCategory() : int {
        return self::DAMAGE_CATEGORY;
    }

    public function getMaxLife() : float {
        return 20;
    }

    public function getDamage(): float
    {
        // TODO: Implement getDamage() method.
    }

    public function getCriticalDamage(): float
    {
        // TODO: Implement getCriticalDamage() method.
    }

    public function getAvatarUrl(): string
    {
        // TODO: Implement getAvatarUrl() method.
    }

}