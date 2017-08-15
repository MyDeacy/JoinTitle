<?php
namespace title;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\scheduler\PluginTask;

class title extends PluginBase implements Listener{
     
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function Join(PlayerJoinEvent $event){
        $player = $event->getPlayer();
        /*何故かjoin直後に表示されないので表示を遅らせます*/
        $task = new Send($this,$player);
        $this->getServer()->getScheduler()->scheduleDelayedTask($task,20);
    }
}

class Send extends PluginTask{
	public function __construct(PluginBase $owner,Player $player){
	    parent::__construct($owner);
	    $this->player = $player;
	}
  	public function onRun(int $currentTick){
	  	$this->player->addTitle("§bWelcome","to example server!!!","20","2","20");
  	}
}  	
