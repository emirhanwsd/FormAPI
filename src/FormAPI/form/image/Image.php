<?php

namespace FormAPI\form\image;

class Image {

    const TYPE_PATH = 0, TYPE_URL = 1;

    /**
     * @var string
     */

    private $data;

    /**
     * @var int
     */

    private $type;

    /**
     * Image constructor.
     * @param string $data
     * @param int $type
     */

    public function __construct(string $data = "", int $type = self::TYPE_PATH) {
        $this->data = $data;
        $this->type = $type;
    }

    /**
     * @return string
     */

    public function getData(): string {
        return $this->data;
    }

    /**
     * @return int
     */

    public function getType(): int {
        return $this->type;
    }
}
