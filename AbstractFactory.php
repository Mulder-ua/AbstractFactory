<?php

interface createStage
{
    public function createEnemy();
    public function createAlly();
}


interface NpcFactory
{
    public static function createNpc($name);
}

class AllyFactory implements NpcFactory
{
    public static function  createNpc($name) {
        if ($name == "Terminator") {
            return new Terminator();
        } elseif ($name == "Robocop") {
            return new Robocop();
        }
        return false;
    }
}

class EnemyFactory implements NpcFactory
{
    public static function  createNpc( $name) {
        if ($name == "Zombie") {
            return new Zombie();
        } elseif ($name == "PyramidHead") {
            return new PyramidHead();
        } elseif ($name == "SlanderMan") {
            return new SlanderMan();
        }
        return false;
    }
}

abstract class Enemy
{
    protected $name;
    protected $hp;
    protected $speech;
    protected $weapon;

    public function saySMTH(){
        return $this->speech;
    }

    public function getWeapon(){
        return $this->weapon;
    }

    public function getName(){
        return $this->name;
    }

    public function getHp(){
        return $this->hp;
    }

}

class Zombie extends Enemy
{
    public function __construct() {
        $this->name = "Zombie";
        $this->hp = "120";
        $this->weapon = "Pawns and Claws";
        $this->speech = "Braain... Braaain...";
    }

    public function eatBrain() {

    }
}

class PyramidHead extends Enemy
{
    public function __construct() {
        $this->name = "Pyramid Head";
        $this->hp = "500";
        $this->weapon = "Great Knife";
        $this->speech = "I kill your and your relatives!";

    }

    public function slash() {

    }
}

class SlanderMan extends Enemy
{
    public function __construct() {
        $this->name = "Slander Man";
        $this->hp = "1500";
        $this->weapon = "mind";
        $this->speech = "...";
    }

    public function silentKill() {

    }
}

abstract class Ally
{
    protected $name;
    protected $hp;
    protected $speech;

    public function helpToPlayer(){

    }

    public function saySMTH(){
        return $this->speech;
    }

    public function getWeapon(){
        return $this->weapon;
    }

    public function getName(){
        return $this->name;
    }

    public function getHp(){
        return $this->hp;
    }
}

class Terminator extends Ally
{
    public function __construct() {
        $this->name = "Terminator";
        $this->hp = "9999";
        $this->weapon = "Machine Gun, High Rate, 7.62mm, M134.";
        $this->speech = "I'll be back.";
    }

    public function shoot() {

    }
}

class Robocop extends Ally
{
    public function __construct() {
        $this->name = "Robocop";
        $this->hp = "5000";
        $this->weapon = "Auto-9";
        $this->speech =
              "<p>The suspect has the right to remain silent.</p>"
            . "<p>Anything the suspect says can be used against him/her in court.</p>"
            . "<p>The suspect has the right to an attorney.</p>"
            . "<p>If the suspect cannot afford an attorney one will be provided at no charge.</p>";
    }

    public function shoot() {

    }
}


abstract class Stage
{
    protected $npc = array();
    protected $stage;

    public function getNpc(){

        $npcList = "<B><BR>$this->stage</B><BR><BR>";

        $npcList .= "<B>Enemies:</B><BR>";

        if ( isset($this->npc['Enemy']) ) {
            foreach ($this->npc['Enemy'] as $enemy) {
                $npcList .= "<b>Name: </b>" . $enemy->getName() . "<BR>";
                $npcList .= "<b>Hp: </b>" . $enemy->gethp() . "<BR>";
                $npcList .= "<b>Weapon: </b>" . $enemy->getweapon() . "<BR>";
                $npcList .= "<b>Say few words please: </b>" . $enemy->saySMTH() . "<BR>";
                $npcList .= "---------------" . "<BR>";
            }
        }

        $npcList .= "<B>Allies:</B><BR>";
        if ( isset($this->npc['Ally']) ) {
            foreach ($this->npc['Ally'] as $enemy) {
                $npcList .= "<b>Name: </b>" . $enemy->getName() . "<BR>";
                $npcList .= "<b>Hp: </b>" . $enemy->gethp() . "<BR>";
                $npcList .= "<b>Weapon: </b>" . $enemy->getweapon() . "<BR>";
                $npcList .= "<b>Say few words please: </b>" . $enemy->saySMTH() . "<BR>";
                $npcList .= "---------------" . "<BR>";
            }
        }

        return $npcList;
    }
}


class Stage1 extends stage implements createStage
{
    public function __construct() {
        $this->stage = "Stage 1: ";
    }

    public function createEnemy()
    {
        $this->npc['Enemy'][] = EnemyFactory::createNpc("Zombie");
        $this->npc['Enemy'][] = EnemyFactory::createNpc("Zombie");
    }
    public function createAlly()
    {

    }
}

class Stage2 extends stage implements createStage
{
    public function __construct() {
        $this->stage = "Stage 2: ";
    }

    public function createEnemy()
    {
        $this->npc['Enemy'][] = EnemyFactory::createNpc("Zombie");
        $this->npc['Enemy'][] = EnemyFactory::createNpc("Zombie");
        $this->npc['Enemy'][] = EnemyFactory::createNpc("PyramidHead");
    }
    public function createAlly()
    {
        $this->npc['Ally'][] = AllyFactory::createNpc("Robocop");
    }
}

class Stage3 extends stage implements createStage
{
    public function __construct() {
        $this->stage = "Stage 3: ";
    }

    public function createEnemy()
    {
        $this->npc['Enemy'][] = EnemyFactory::createNpc("Zombie");
        $this->npc['Enemy'][] = EnemyFactory::createNpc("Zombie");
        $this->npc['Enemy'][] = EnemyFactory::createNpc("PyramidHead");
        $this->npc['Enemy'][] = EnemyFactory::createNpc("SlanderMan");
    }
    public function createAlly()
    {
        $this->npc['Ally'][] = AllyFactory::createNpc("Robocop");
        $this->npc['Ally'][] = AllyFactory::createNpc("Terminator");
    }
}