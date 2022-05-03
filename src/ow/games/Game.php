<?php 

namespace ow\games;

use ow\Main;

abstract class Game {

    //Main Game Mode 
    const CONTROL = 0; //Zone à capturer à 100%
    const CAPTURE_THE_FLAG = 1;
    const DEATHMATCH = 2; //Première équipe à 20 éliminations (à vérifier je crois c'est 30)
    const ELIMINATION = 3; //3 rounds, quand un joueur meurt pendant un round il ne peut pas respawn

    //Secondary Game Mode
    const MYSTERY_HEROES = 0;
    const NO_LIMITS = 1; //Peut prendre tous les personnages que l'on veut 

    const VS_1 = 1;
    const VS_3 = 3;
    const VS_4 = 4;
    const VS_6 = 6;

    private int $gameMode, $playersPerTeam;
    private ?int $secondaryGameMode;
    private bool $ranked;

    private Team $firstTeam, $secondTeam;
    private int $time = 0;
    private array $players = [];
    private bool $started, $randomTeam = false;

    public function __construct(int $gameMode = self::CONTROL, int $playersPerTeam = self::VS_6, ?int $secondaryGameMode = null, bool $ranked = false) {
        $this->mainGameMode = $mainGameMode;
        $this->playersPerTeam = $playersPerTeam;
        $this->secondaryGameMode = $secondaryGameMode;
        $this->ranked = $ranked;
        $this->firstTeam = new Team($playersPerTeam);
        $this->secondTeam = new Team($playersPerTeam);
    }

    public function getGameMode() : int {
        return $this->gameMode;
    }

    abstract public function getGameModeName() : string;

    public function getSecondaryGameMode() : ?int {
        return $this->secondaryGameMode;
    }

    public function getSecondaryGameModeName() : string {
        $lang = Main::getLang()["secondary-game-modes"];
        return match($this->secondaryGameMode) {
            self::MYSTERY_HEROES => $lang["myster-heroes"],
            self::NO_LIMITS => $lang["no-limits"],
            default => $lang["none"]
        };
    }

    public function getPlayers() : array {
        return $this->players;
    }

    public function addPlayer(OPlayer $player) : void {
        $this->players[] = $player;
    }

    public function full() : bool {
        return count($this->getPlayers()) == 2 * $this->playersPerTeam;
    }

    public function removePlayer(OPlayer $player) : void {
        unset($this->players[array_search($player, $this->players)]);
    }

    public function getFirstTeam() : Team {
        return $this->firstTeam;
    }

    public function getSecondTeam() : Team {
        return $this->secondTeam;
    } 

    public function randomTeam() : bool {
        return $this->randomTeam;
    }

    public function setRandomTeam(bool $value) : void {
        $this->randomTeam = $valuee;
    }

    private function getTime() : int {
        return $this->time;
    }

    public function updateTime() : voir {
        $this->time++;
    }

    public function getTimeSeconds() : int {
        return $this->time - $this->getMinutes() * 60;
    }

    public function getTimeMinutes() : int {
        return floor($this->time / 60); 
    }

    abstract public function getFinalWinner() : Team; 

    public function hasStarted() : bool {
        return $this->started;
    }

    public function start() : ?self {
        if(!$this->started) {
            if($this->randomTeam) {

            }
            return self;
        }
        return null;
    }

    public function close() : void {
        unset(GameManager::$game[array_search(self, GameManager::$game)]);
        //Teleport all players 
    } 
}

?>