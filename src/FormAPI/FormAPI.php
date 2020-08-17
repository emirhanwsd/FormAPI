<?php

namespace FormAPI;

use FormAPI\form\element\Button;
use FormAPI\form\image\Image;
use FormAPI\form\SimpleForm;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class FormAPI extends PluginBase {

    /**
     * @param string $title
     * @param string $text
     * @param Button[] $buttons
     * @return SimpleForm
     */

    public static function createSimpleForm(string $title = "", string $text = "", array $buttons = []): SimpleForm {
        return new SimpleForm($title, $text, $buttons);
    }

    /**
     * @param CommandSender $sender
     * @param Command $command
     * @param string $label
     * @param array $args
     * @return bool
     */

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool { // For testing.
        if (!$sender instanceof Player) {
            return false;
        }
        $title = "Testing Form";
        $text = "I'm trying our new FormAPI!";
        $simpleForm = static::createSimpleForm($title, $text, [
            new Button("Button 0"),
            new Button("Button 1", new Image("textures/items/diamond_sword")),
            new Button("Button 2")
        ]);
        $sender->sendForm($simpleForm);
        return true;
    }
}