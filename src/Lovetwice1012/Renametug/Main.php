<?php

namespace Lovetwice1012\Renametug;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;

class Main extends PluginBase implements Listener{

	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
        }

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
        if ($label === "atama") {
            if ($sender->isOp()) {
		if(isset($args[0])&&isset($args[1])){
                    $player = $this->getServer()->getPlayer($args[0]);
                    $tag = $args[1]; 
                    $player->setNameTag("[§d".$tag."§r]".$player->getName());
                    $player->setDisplayName("[§d".$tag."§r]".$player->getName());
	    	    $sender->sendMessage("頭の上の名前表示が"."[§d".$tag."§r]".$player->getName()."になりました");
		}else{
		    $sender->sendMessage("§c使用方法:/atama 変更したい人の名前　変更後の名前");
		}
            }else{
	        $sender->sendMessage("§c権限がありません");
	    }
	
        }
        return true;
    }

}
