<?php

namespace emirhanwsd\formapi\form;

use pocketmine\Player;

abstract class Form implements \pocketmine\form\Form{

	/**
	 * @var array
	 */

	protected $data = [], $handledData = [];

	/**
	 * @param Player $player
	 * @param mixed  $data
	 */

	public function handleResponse(Player $player, $data) : void{
		$this->handleData($data);
	}

	/**
	 * @return array
	 */

	public function jsonSerialize() : array{
		return $this->data;
	}

	/**
	 * @param $data
	 */

	abstract public function handleData(&$data) : void;
}
