<?php

namespace FormAPI\form;

use FormAPI\form\element\Button;

class SimpleForm extends Form {

    const TYPE = "form";

    /**
     * SimpleForm constructor.
     * @param string $title
     * @param string $text
     * @param Button[] $buttons
     */

    public function __construct(string $title = "", string $text = "", array $buttons = []) {
        $this->data["type"] = static::TYPE;
        $this->data["title"] = $title;
        $this->data["content"] = $text;
        foreach ($buttons as $button) {
            $this->processButton($button);
        }
    }

    /**
     * @param Button $button
     */

    private function processButton(Button $button): void {
        $buttonData = $button->getData();
        $this->data["buttons"][] = $buttonData;
        $this->handledData[] = count($this->handledData);
    }

    /**
     * @param $data
     */

    public function handleData(&$data): void {
        $data = $this->handledData[$data] ?? null;
    }
}
