<?php

namespace ow\games;

use ow\games\Game;

class GameManager {

    private static array $games = [];

    public static function createGame(int $mainGameMode, ?int $secondaryGameMode = null, bool $ranked = false) : ?Game {
        switch ($mainGameMode) {
            case Game::CONTROL: 
                return new ControlGame($secondaryGameMode, $ranked);
            break;
        }
    }

    public static function getGames() : array {
        return self::$games;
    }

}



?>