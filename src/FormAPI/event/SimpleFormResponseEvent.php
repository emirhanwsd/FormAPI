<?php

namespace FormAPI\event;

use FormAPI\form\SimpleForm;
use pocketmine\Player;

class SimpleFormResponseEvent extends FormEvent {

    /**
     * @var int
     */

    protected $selectedButtonIndex;

    /**
     * SimpleFormResponseEvent constructor.
     * @param Player $player
     * @param SimpleForm $form
     * @param int $selectedButtonIndex
     */

    public function __construct(Player $player, SimpleForm $form, int $selectedButtonIndex) {
        $this->selectedButtonIndex = $selectedButtonIndex;
        parent::__construct($player, $form);
    }

    /**
     * @return int
     */

    public function getSelectedButtonIndex(): int {
        return $this->selectedButtonIndex;
    }
}
