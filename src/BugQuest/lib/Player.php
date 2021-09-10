<?php

declare(strict_types=1);

namespace BugQuest\Lib;

use BugQuest\Lib\Weapon;

class Player
{
    private Weapon $weapon;
    private $shield;

    public function __construct($shield = null)
    {
        $this->shield = $shield;
    }

    public function equip(Weapon $weapon): string
    {
        $message = '';
        if ($this->shield === null) {
            $this->weapon = $weapon;
        } else {
            if ($weapon->getType() === 1) {
                $this->weapon = $weapon;
            } else {
                $message = '装備できません';
            }
        }
        return $message;
    }
}
