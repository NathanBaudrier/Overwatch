<?php 

namespace ow\games;

use ow\games\Game;

class ControlGame extends Game {

    private int $round = 1;
    private int $firstTeamPercent, $secondTeamPercent = 0;

    public function __construct(?int $secondaryGameMode, bool $ranked) {
        parent::__construct(self::CONTROL, $secondaryGameMode, $ranked);
    }

    public function getGameModeName() : string {
        return Main::getLang()["game-modes"]["control"];
    }

    public function getRound() : int {
        return $this->round;
    }

    public function nextRound() : void {
        if($this->round < 3) $this->round++; 
    }

    public function getRoundWinner() : ?Team {
        if($this->firstTeamPercent == 100) return $this->firstTeam;
        else if($this->secondTeamPercent == 100) return $this->secondTeamPercent;
        else return null;
    }

    public function getFirstTeamPercent() : int {
        return $this->firstTeamPercent;
    }

    public function updateFirstTeamPercent() : void {
        if($this->firstTeamPercent < 100) $this->firstTeamPercent++;
    }

    public function getSecondTeamPercent() : int {
        return $this->secondTeamPercent;
    }

    public function updateSecondTeamPercent() : void {
        if($this->secondTeamPercent < 100) $this->secondTeamPercent++;
    }

    public function getFinalWinner() : ?Team {
        if($this->firstTeam->getScore() == 2) return $this->firstTeam;
        else if($this->secondTeam->getScore() == 2) return $this->secondTeam;
        else return null;
    }

    


}

?>