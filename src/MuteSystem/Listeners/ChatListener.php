<?php

namespace MuteSystem\Listeners;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\utils\Config;
use pocketmine\Player;
use MuteSystem\Main\MuteSystem;

class ChatListener implements Listener{

	public function onChat(PlayerChatEvent $event){
	
	$player = $event->getPlayer();
	$name = $player->getName();
	
		$vplayerfile = new Config("/root/Server/MuteSystem/Mutes/" .$name.".yml", Config::YAML);
	if($vplayerfile->get("type") == "mute"){
	
	$player->sendMessage("§cDu bist wegen §e".$vplayerfile->get("grund")." §cgemutet");
	$event->setCancelled();
		
		}
	}
}