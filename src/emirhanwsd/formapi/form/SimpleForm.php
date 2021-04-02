<?php

namespace emirhanwsd\formapi\form;

use emirhanwsd\formapi\form\element\Button;
use pocketmine\Player;

class SimpleForm extends Form{

	const TYPE = "form";

	/**
	 * @var Button[]
	 */

	protected $buttons = [];

	/**
	 * @var \Closure
	 */

	private $onSubmit, $onClose;

	/**
	 * SimpleForm constructor.
	 *
	 * @param string   $title
	 * @param string   $text
	 * @param array    $buttons
	 * @param \Closure $onSubmit
	 * @param \Closure $onClose
	 */

	public function __construct(string $title, string $text, array $buttons, \Closure $onSubmit, \Closure $onClose){
		$this->buttons = $buttons;
		$this->data["type"] = static::TYPE;
		$this->data["title"] = $title;
		$this->data["content"] = $text;
		foreach($buttons as $button){
			$this->processButton($button);
		}
		$this->onSubmit = $onSubmit;
		$this->onClose = $onClose;
	}

	/**
	 * @return string
	 */

	public function getTitle() : string{
		return $this->data["title"];
	}

	/**
	 * @return string
	 */

	public function getText() : string{
		return $this->data["content"];
	}

	/**
	 * @return Button[]
	 */

	public function getButtons() : array{
		return $this->buttons;
	}

	/**
	 * @param Button $button
	 */

	private function processButton(Button $button) : void{
		$buttonData = $button->getData();
		$this->data["buttons"][] = $buttonData;
		$this->handledData[] = count($this->handledData);
	}

	/**
	 * @param $data
	 */

	public function handleData(&$data) : void{
		$data = $this->handledData[$data] ?? null;
	}

	/**
	 * @param int $index
	 *
	 * @return Button|null
	 */

	public function getButtonByIndex(int $index) : ?Button{
		return $this->getButtons()[$index] ?? null;
	}

	/**
	 * @param Player $player
	 * @param mixed  $data
	 */

	public function handleResponse(Player $player, $data) : void{
		parent::handleResponse($player, $data);
		$data !== null ? ($this->onSubmit)($player, $data) : ($this->onClose)($player);
	}
}
