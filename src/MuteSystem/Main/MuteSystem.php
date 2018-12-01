<?php

namespace MuteSystem\Main;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use MuteSystem\Listeners\JoinListener;
use MuteSystem\Listeners\ChatListener;
use MuteSystem\Commands\MuteCommand;
use MuteSystem\Commands\UnMuteCommand;
use pocketmine\level\sound\FizzSound;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\entity\Effect;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\item\Item;
use pocketmine\math\Vector3;
use pocketmine\tile\Sign;

class MuteSystem extends PluginBase{

	public $prefix = "§7[§cMuteSystem§7] ";
	
public function onEnable(){

	$this->getLogger()->info("§cMuteSystem wird hochgefahren");
	self::registerdata();
	self::loadListeners();
	self::loadCommands();
	$this->getLogger()->info("§aDas §cMuteSystem§a wurde hochgefahren");
	
	}
	
private function registerData(){
	
	@mkdir("/root/Server/MuteSystem/");
	@mkdir("/root/Server/MuteSystem/Mutes/");
	
	}
	
private function loadListeners(){

	$this->getServer()->getPluginManager()->registerEvents(new JoinListener($this), $this);
	$this->getServer()->getPluginManager()->registerEvents(new ChatListener($this), $this);
	
	}

private function loadCommands(){

	$this->getCommand("mute")->setExecutor(new MuteCommand($this));
	$this->getCommand("unmute")->setExecutor(new UnMuteCommand($this));
	
	}
}