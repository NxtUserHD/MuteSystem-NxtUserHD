<?php

namespace MuteSystem\Commands;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\permission\Permission;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use MuteSystem\Main\MuteSystem;

class UnMuteCommand implements CommandExecutor{

private $plugin;

public function __construct(MuteSystem $plugin)
	{
		$this->plugin = $plugin;
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args): bool {
		$senderN = $sender->getName();
			if(strtolower($cmd->getName()) == "unmute"){
				if($sender instanceof Player){
					if(empty($args[0])){
						$sender->sendMessage($this->plugin->prefix . "§fBenutze bitte: /unmute {name}");
						
					}else{
					$pf = new Config("/root/Server/MuteSystem/Mutes/".$args[0].".yml", Config::YAML);
				$pf->set("type", null);
				$pf->save();
				$sender->sendMessage($this->plugin->prefix . "§a".$args[0]." wurde entmutet§7!");
				}
			}
		}
		return true;
	}
	
	
	
}