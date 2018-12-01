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

class MuteCommand implements CommandExecutor
{

	private $plugin;

	public function __construct(MuteSystem $plugin)
	{
		$this->plugin = $plugin;
	}

	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) : bool
	{

		if (strtolower($cmd->getName()) == "mute") {
			if ($sender instanceof Player) {
				if ($sender->hasPermission("ms.mute")) {
					if (empty($args[0]) || empty($args[1])) {
						$sender->sendMessage("§6Alle Ban Ids:\n§7 - §c1 §7: §cBeleidigung §7> §4MUTE\n§7 - §c2 §7: §cRespektloses Verhalten §7> §4MUTE\n§7 - §c3 §7: §cProvokantes Verhalten §7> §4MUTE\n§7 - §c4 §7: §cSpamming §7> §4MUTE\n§7 - §c5 §7: §cWerbung §7> §4MUTE\n§7 - §c6 §7: §cWerbung §7> §4MUTE");
					} else {
						if (file_exists("/root/Server/MuteSystem/Mutes/" . $args[0] . ".yml")) {
							$v = Server::getInstance()->getPlayerExact($args[0]);
							$vplayerfile = new Config("/root/Server/MuteSystem/Mutes/" . $args[0] . ".yml", Config::YAML);
							if ($args[1] == "1") {
								$vplayerfile->set("count", $vplayerfile->get("count") + 1);
								$vplayerfile->save();
								if ($vplayerfile->get("count") == "1") {
									$vplayerfile->set("time", 86400 + time());
								} elseif ($vplayerfile->get("count") == "2") {
									$vplayerfile->set("time", 7 * 86400 + time());
								} elseif ($vplayerfile->get("count") == "3") {
									$vplayerfile->set("time", 29 * 86400 + time());
								} elseif ($vplayerfile->get("count") == "4") {
									$vplayerfile->set("time", "permanent");
								}
								$vplayerfile->set("grund", "Beleidigung");
								$vplayerfile->set("type", "mute");
								$vplayerfile->save();
								$sender->sendMessage($this->plugin->prefix . "§a" . $args[0] . " wurde für §eBeleidigung gemutet");
							}
							if ($args[1] == "2") {
								$vplayerfile->set("count", $vplayerfile->get("count") + 1);
								$vplayerfile->save();
								if ($vplayerfile->get("count") == "1") {
									$vplayerfile->set("time", 86400 + time());
								} elseif ($vplayerfile->get("count") == "2") {
									$vplayerfile->set("time", 7 * 86400 + time());
								} elseif ($vplayerfile->get("count") == "3") {
									$vplayerfile->set("time", 29 * 86400 + time());
								} elseif ($vplayerfile->get("count") == "4") {
									$vplayerfile->set("time", "permanent");
								}
								$vplayerfile->set("grund", "Respektloses Verhalten");
								$vplayerfile->set("type", "mute");
								$vplayerfile->save();
								$sender->sendMessage($this->plugin->prefix . "§a" . $args[0] . " wurde für §eRespekloses Verhalten gemutet");
							}
							if ($args[1] == "3") {
								$vplayerfile->set("count", $vplayerfile->get("count") + 1);
								$vplayerfile->save();
								if ($vplayerfile->get("count") == "1") {
									$vplayerfile->set("time", 86400 + time());
								} elseif ($vplayerfile->get("count") == "2") {
									$vplayerfile->set("time", 7 * 86400 + time());
								} elseif ($vplayerfile->get("count") == "3") {
									$vplayerfile->set("time", 29 * 86400 + time());
								} elseif ($vplayerfile->get("count") == "4") {
									$vplayerfile->set("time", "permanent");
								}
								$vplayerfile->set("grund", "Provokantes Verhalten");
								$vplayerfile->set("type", "mute");
								$vplayerfile->save();
								$sender->sendMessage($this->plugin->prefix . "§a" . $args[0] . " wurde für §eProvokantes Verhalten gemutet");
							}
							if ($args[1] == "4") {
								$vplayerfile->set("count", $vplayerfile->get("count") + 1);
								$vplayerfile->save();
								if ($vplayerfile->get("count") == "1") {
									$vplayerfile->set("time", 86400 + time());
								} elseif ($vplayerfile->get("count") == "2") {
									$vplayerfile->set("time", 7 * 86400 + time());
								} elseif ($vplayerfile->get("count") == "3") {
									$vplayerfile->set("time", 29 * 86400 + time());
								} elseif ($vplayerfile->get("count") == "4") {
									$vplayerfile->set("time", "permanent");
								}
								$vplayerfile->set("grund", "Spamming");
								$vplayerfile->set("type", "mute");
								$vplayerfile->save();
								$sender->sendMessage($this->plugin->prefix . "§a" . $args[0] . " wurde für §eSpamming gemutet");
							}
							if ($args[1] == "5") {
								$vplayerfile->set("count", $vplayerfile->get("count") + 1);
								$vplayerfile->save();
								if ($vplayerfile->get("count") == "1") {
									$vplayerfile->set("time", 86400 + time());
								} elseif ($vplayerfile->get("count") == "2") {
									$vplayerfile->set("time", 7 * 86400 + time());
								} elseif ($vplayerfile->get("count") == "3") {
									$vplayerfile->set("time", 29 * 86400 + time());
								} elseif ($vplayerfile->get("count") == "4") {
									$vplayerfile->set("time", "permanent");
								}
								$vplayerfile->set("grund", "Werbung");
								$vplayerfile->set("type", "mute");
								$vplayerfile->save();
								$sender->sendMessage($this->plugin->prefix . "§a" . $args[0] . " wurde für §eWebung gemutet");
							} else {
								if (empty($args[0]) || empty($args[1])) {
									$this->getLogger()->info("§6Alle Ban Ids:\n§7 - §c1 §7: §cBeleidigung §7> §4MUTE\n§7 - §c2 §7: §cRespektloses Verhalten §7> §4MUTE\n§7 - §c3 §7: §cProvokantes Verhalten §7> §4MUTE\n§7 - §c4 §7: §cSpamming §7> §4MUTE\n§7 - §c5 §7: §cWerbung §7> §4MUTE");
								} else {
									if (file_exists("/root/Server/MuteSystem/Mutes/" . $args[0] . ".yml")) {
										$v = Server::getInstance()->getPlayerExact($args[0]);
										$vplayerfile = new Config("/root/Server/MuteSystem/Mutes/" . $args[0] . ".yml", Config::YAML);
										if ($args[1] == "1") {
											$vplayerfile->set("count", $vplayerfile->get("count") + 1);
											$vplayerfile->save();
											if ($vplayerfile->get("count") == "1") {
												$vplayerfile->set("time", 86400 + time());
											} elseif ($vplayerfile->get("count") == "2") {
												$vplayerfile->set("time", 7 * 86400 + time());
											} elseif ($vplayerfile->get("count") == "3") {
												$vplayerfile->set("time", 29 * 86400 + time());
											} elseif ($vplayerfile->get("count") == "4") {
												$vplayerfile->set("time", "permanent");
											}
											$vplayerfile->set("grund", "Beleidigung");
											$vplayerfile->set("type", "mute");
											$vplayerfile->save();
											$sender->sendMessage($this->plugin->prefix . "§a" . $args[0] . " wurde für §eBeleidigung gemutet");
										}
										if ($args[1] == "2") {
											$vplayerfile->set("count", $vplayerfile->get("count") + 1);
											$vplayerfile->save();
											if ($vplayerfile->get("count") == "1") {
												$vplayerfile->set("time", 86400 + time());
											} elseif ($vplayerfile->get("count") == "2") {
												$vplayerfile->set("time", 7 * 86400 + time());
											} elseif ($vplayerfile->get("count") == "3") {
												$vplayerfile->set("time", 29 * 86400 + time());
											} elseif ($vplayerfile->get("count") == "4") {
												$vplayerfile->set("time", "permanent");
											}
											$vplayerfile->set("grund", "Respektloses Verhalten");
											$vplayerfile->set("type", "mute");
											$vplayerfile->save();
											$sender->sendMessage($this->plugin->prefix . "§a" . $args[0] . " wurde für §eRespekloses Verhalten gemutet");
										}
										if ($args[1] == "3") {
											$vplayerfile->set("count", $vplayerfile->get("count") + 1);
											$vplayerfile->save();
											if ($vplayerfile->get("count") == "1") {
												$vplayerfile->set("time", 86400 + time());
											} elseif ($vplayerfile->get("count") == "2") {
												$vplayerfile->set("time", 7 * 86400 + time());
											} elseif ($vplayerfile->get("count") == "3") {
												$vplayerfile->set("time", 29 * 86400 + time());
											} elseif ($vplayerfile->get("count") == "4") {
												$vplayerfile->set("time", "permanent");
											}
											$vplayerfile->set("grund", "Provokantes Verhalten");
											$vplayerfile->set("type", "mute");
											$vplayerfile->save();
											$sender->sendMessage($this->plugin->prefix . "§a" . $args[0] . " wurde für §eProvokantes Verhalten gemutet");
										}
										if ($args[1] == "4") {
											$vplayerfile->set("count", $vplayerfile->get("count") + 1);
											$vplayerfile->save();
											if ($vplayerfile->get("count") == "1") {
												$vplayerfile->set("time", 86400 + time());
											} elseif ($vplayerfile->get("count") == "2") {
												$vplayerfile->set("time", 7 * 86400 + time());
											} elseif ($vplayerfile->get("count") == "3") {
												$vplayerfile->set("time", 29 * 86400 + time());
											} elseif ($vplayerfile->get("count") == "4") {
												$vplayerfile->set("time", "permanent");
											}
											$vplayerfile->set("grund", "Spamming");
											$vplayerfile->set("type", "mute");
											$vplayerfile->save();
											$sender->sendMessage($this->plugin->prefix . "§a" . $args[0] . " wurde für §eSpamming gemutet");
										}
										if ($args[1] == "5") {
											$vplayerfile->set("count", $vplayerfile->get("count") + 1);
											$vplayerfile->save();
											if ($vplayerfile->get("count") == "1") {
												$vplayerfile->set("time", 86400 + time());
											} elseif ($vplayerfile->get("count") == "2") {
												$vplayerfile->set("time", 7 * 86400 + time());
											} elseif ($vplayerfile->get("count") == "3") {
												$vplayerfile->set("time", 29 * 86400 + time());
											} elseif ($vplayerfile->get("count") == "4") {
												$vplayerfile->set("time", "permanent");
											}
											$vplayerfile->set("grund", "Werbung");
											$vplayerfile->set("type", "mute");
											$vplayerfile->save();
											$sender->sendMessage($this->plugin->prefix . "§a" . $args[0] . " wurde für §eWebung gemutet");
										}
									} else {
										$this->getLogger()->info($this->plugin->prefix . "§4Dieser Spieler existiert nicht");
									}
								}
							}
						}
					}
				}
			}
			return TRUE;
		}
	}
}