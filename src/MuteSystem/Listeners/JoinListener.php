<?php

namespace MuteSystem\Listeners;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\utils\Config;
use pocketmine\Player;
use MuteSystem\Main\MuteSystem;

class JoinListener implements Listener{

	public function onJoin(PlayerJoinEvent $event){
		
		$player = $event->getPlayer();
		$name = $player->getName();
		
	if(!is_file("/root/Server/MuteSystem/Mutes/" .$name.".yml")){
		$mcfg = new Config("/root/Server/MuteSystem/Mutes/" .$name.".yml", Config::YAML);
		
		$mcfg->set("type", null);
		$mcfg->set("time", null);
		$mcfg->set("grund", null);
		$mcfg->set("count", null);
		$mcfg->save();
		
		}
	}
}