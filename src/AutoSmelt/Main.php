<?php

namespace AutoSmelt;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\level\sound\BatSound;
use pocketmine\level\sound\ClickSound;
use pocketmine\level\sound\DoorSound;
use pocketmine\level\sound\FizzSound;
use pocketmine\level\sound\EndermanTeleportSound;
use pocketmine\level\Position;
use pocketmine\math\Vector3;
use pocketmine\item\Item;
use pocketmine\block\Block;
use pocketmine\plugin\PluginManager;
use pocketmine\Plugin;
use pocketmine\Level;

class Main extends PluginBase implements Listener{

public function onEnable(){
$this->getServer()->getLogger()->info("AutoSmelt Plugin Enabled By JackCasto AKA BlackWebPE");
$this->getServer()->getPluginManager()->registerEvents($this,$this);
      $this->ores=array(14,15,16,21,56,73,74,129,153);
 $this->ingot=array(
 14 => 266,
 15 => 265,
 16 => 263,
 21 => 351:4,
 56 => 264,
 73 => 331,
 74 => 331,
 129 => 388,
 153 => 406);
}
       
public function onBreak(BlockBreakEvent $ev){
$p = $ev->getPlayer();
$block = $ev->getBlock();
$item = $ev->getItem()->getId();
$ev->setInstaBreak(true);
foreach($this->ores as $ore){
if($block->getId() === $ore && !$ev->isCancelled()){
$ev->setDrops(array());
$p->sendPopup("§c§l[§bYou Mined A Ore§c]");
$p->getInventory()->addItem(Item::get($this->ingot[$ore]));
                $x = $p->getX();
                $y = $p->getY();
                $z = $p->getZ();
$p->getLevel()->addSound(new EndermanTeleportSound(new Vector3($x, $y, $z)));
}
}
}
}
