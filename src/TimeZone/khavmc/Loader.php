<?php

namespace TimeZone\khavmc;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase{


  public function onEnable(){
    $this->getServer()->getLogger()->info(TextFormat::GREEN."TimeZone Plugin Enabled!");
            $this->getServer()->getCommandMap()->register("timezone", new TimeZoneCommand($this));
    $this->saveDefaultConfig();
    $this->reloadConfig();
  }
  
  public function getRegionTime(string $region, Player $player){
  date_default_timezone_set($region);
  $date = date("Y/n/j");
  $time = date("G:i:s");
    $search = array(
                    '{date}',
                    '{time}'
                );
                $replace = array(
                    $date,
                    $time
                );
                    $time_msg = str_replace($search, $replace, $this->getConfig()->getAll(){"time_message"});
                if($this->getConfig()->get("message_type") == "msg") {
                $player->sendMessage(FMT::colorMessage($time_msg));
  }elseif($this->getConfig()->get("message_type") == "tip") {
                
                }elseif($this->getConfig()->get("message_type") == "popup") {
           //ToDo     
                }
  }
}
