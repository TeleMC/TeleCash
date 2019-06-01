<?php

namespace TeleCash;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Player;
use pocketmine\Server;

class EventListener implements Listener {

    public function __construct(TeleCash $plugin) {
        $this->plugin = $plugin;
    }

    public function onJoin(PlayerJoinEvent $ev) {
        $server = Server::getInstance();
        $player = $ev->getPlayer();
        $name = strtolower($player->getName());
        if ($this->plugin->getCash($name) == null) {
            $this->plugin->registerPlayer($name);
        } else {
            return;
        }
    }

}
