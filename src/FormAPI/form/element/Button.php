<?php

namespace FormAPI\form\element;

use FormAPI\form\image\Image;

class Button {

    /**
     * @var string
     */

    private $text;

    /**
     * @var null|Image
     */

    private $image = null;

    /**
     * Button constructor.
     * @param string $text
     * @param Image|null $image
     */

    public function __construct(string $text, ?Image $image = null) {
        $this->text = $text;
        $this->image = $image;
    }

    /**
     * @return string
     */

    public function getText(): string {
        return $this->text;
    }

    /**
     * @return Image|null
     */

    public function getImage(): ?Image {
        return $this->image;
    }

    /**
     * @return array
     */

    public function getData(): array {
        $buttonData = [
            "text" => $this->getText()
        ];
        if (($image = $this->getImage()) !== null) {
            $buttonData["image"]["type"] = $image->getType() === $image::TYPE_PATH ? "path" : "url";
            $buttonData["image"]["data"] = $image->getData();
        }
        return $buttonData;
    }
}
