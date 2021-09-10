<?php

namespace BugQuest\Tests;

use BugQuest\Lib\Weapon;
use BugQuest\Lib\Player;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    private Player $player;

    protected function setUp(): void
    {
        $this->player = new Player();
        $this->playerWithShield = new Player('shield');
        $this->oneHandWeapon = new Weapon('けやきのぼう', 5, 1, false);
        $this->twoHandsWeapon = new Weapon('きこりの大斧', 25, 2, false);
    }

    public function test盾を装備していない場合、片手持ちの武器を装備できること()
    {
        $message = $this->player->equip($this->oneHandWeapon);
        $this->assertEquals('', $message);
    }

    public function test盾を装備していない場合、両手持ちの武器を装備できること()
    {
        $message = $this->player->equip($this->twoHandsWeapon);
        $this->assertEquals('', $message);
    }

    public function test盾を装備している場合、片手持ちの武器を装備できること()
    {
        $message = $this->playerWithShield->equip($this->oneHandWeapon);
        $this->assertEquals('', $message);
    }

    public function test盾を装備している場合、両手持ちの武器を装備できること()
    {
        $message = $this->playerWithShield->equip($this->twoHandsWeapon);
        $this->assertEquals('装備できません', $message);
    }
}
