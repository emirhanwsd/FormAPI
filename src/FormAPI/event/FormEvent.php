<?php

namespace FormAPI\event;

use FormAPI\form\Form;
use pocketmine\event\Event;
use pocketmine\Player;

abstract class FormEvent extends Event {

    /**
     * @var Player
     */

    protected $player;

    /**
     * @var Form
     */

    protected $form;

    /**
     * FormEvent constructor.
     * @param Player $player
     * @param Form $form
     */

    public function __construct(Player $player, Form $form) {
        $this->player = $player;
        $this->form = $form;
    }

    /**
     * @return Player
     */

    public function getPlayer(): Player {
        return $this->player;
    }

    /**
     * @return Form
     */

    public function getForm(): Form {
        return $this->form;
    }
}
