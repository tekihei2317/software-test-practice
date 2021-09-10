<?php

declare(strict_types=1);

namespace BugQuest\Lib;

use InvalidArgumentException;

class Weapon
{
    private string $name;
    private int $attack;
    private int $type;
    private bool $canEnhance;

    public function __construct(
        string $name,
        int $attack,
        int $type = 1,
        bool $canEnhance = false
    ) {
        if ($type <= 0 || 2 < $type) {
            throw new InvalidArgumentException('武器のタイプが不正です');
        }

        $this->name = $name;
        $this->attack = $attack;
        $this->type = $type;
        $this->canEnhance = $canEnhance;
    }

    public function getType()
    {
        return $this->type;
    }
}
