<?php

namespace Droll;

use pocketmine\plugin\PluginBase;
use pocketmime\Player;
use pocketmime\Server;
use pocketmime\command\Command;
use pocketmime\command\CommandSender;

class Main extends PluginBase {
	
	public function onEnable(){
		$this->getLogger()->info("Fly plugin Activado por Droll");
	}
	
	public function onFly($player){
		if($player instanceof Player){
			if($player->setAllowFlight(true)){
				$player->sendMessage("§aFly se activo Correctamente");
			}
		}
	}
	
	public function ofFly($player){
		if($player instanceof Player){
			if($player->setAllowFlight(false)){
				$player->sendMessage("§cFly se desactivo Correctamente");
			}
		}
	}
	
	public function onCommand(CommandSender $player, Command $cmd, $label, array $args):bool {
		switch($cmd->getName()){
			case "fly"
			$player->sendMessage("§cUsed: /fly on or /fly off");
			if(!empty($args[0]){
				if($args[0] == "on"){
					$this->onFly($player);
					return true;
				}
				if($args[0] == "off"){
					$this->ofFly($player);
					return false;
				}
			}
		}
	}
}
