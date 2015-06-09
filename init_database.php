<?php 
	require_once("DB/AdoHelper.php");
	include_once('DB/DataQueries.php');
	$check = AdoHelper::CheckDBInit();
	if(!isset($check)){
		AdoHelper::CreateDB('bgunet_db');
		$usertable = "CREATE TABLE `bgunet_db`.`users` (
						  `uid` INT NOT NULL AUTO_INCREMENT,
						  `username` VARCHAR(255) NULL,
						  `password` VARCHAR(255) NULL,
						  `email` VARCHAR(255) NULL,
						  PRIMARY KEY (`uid`),
						  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
						  UNIQUE INDEX `email_UNIQUE` (`email` ASC)
						);";

		$networktable = "CREATE TABLE `bgunet_db`.`social_networks` (
						  `nid` VARCHAR(255) NOT NULL,
						  `uid` INT NULL,
						  `name` VARCHAR(255) NULL,
						  `url` VARCHAR(255) NULL,
						  PRIMARY KEY (`nid`),
						  INDEX `user_in_network_idx` (`uid` ASC),
						  CONSTRAINT `social_network_FK_uid`
						    FOREIGN KEY (`uid`)
						    REFERENCES `bgunet_db`.`users` (`uid`)
						    ON DELETE CASCADE
						    ON UPDATE CASCADE
						);";

		DataQueries::CreateTable('bgunet_db',$usertable);
		DataQueries::CreateTable('bgunet_db',$networktable);
	}
?>