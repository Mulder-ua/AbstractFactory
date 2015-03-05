<?php
require_once("AbstractFactory.php");

$stage1 = new Stage1();
$stage1->createEnemy();
$stage1->createAlly();
echo $stage1->getNpc();

$stage2 = new Stage2();
$stage2->createEnemy();
$stage2->createAlly();
echo $stage2->getNpc();

$stage3 = new Stage3();
$stage3->createEnemy();
$stage3->createAlly();
echo $stage3->getNpc();