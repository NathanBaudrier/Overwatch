<?php 

namespace ow\games;

class Team {

    private array $members = [];
    private int $maxPlayers;
    private int $score = 0;

    public function __construct(int $maxPlayers = 6) {}

    public function getMembers() : array {
        return $this->members;
    }

    public function isFull() : bool {
        return count($this->members) >= $this->maxPlayers;
    } 

    public function addMember(OPlayer $player) : void {
        $this->members[] = $player;
    }

    public function removeMember(OPlayer $player) : void {
        unset($this->members[array_search($player, $this->members)]);
    }

    public function getScore() : int {
        return $this->score;
    }

    public function setScore(int $value) : void {
        $this->score = $score;
    }

}

?>