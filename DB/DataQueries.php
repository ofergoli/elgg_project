<?php
require_once("AdoHelper.php");

class DataQueries
{

	public static function VerifyUser($username, $password) {
		$query = "SELECT * FROM users WHERE username = ?";
		$parameters = array($username);
		$users = AdoHelper::ExecuteDataSet("bgunet_db", $query, $parameters);
		if(!empty($users) && password_verify($password, $users[0]["password"])) {
			return $users[0];
		}
		return null;
	}

	public static function InsertUser($userName, $password, $email) {
		$query = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
		$parameters = array($userName, password_hash($password, PASSWORD_DEFAULT), $email);
		AdoHelper::ExecuteNonQuery("bgunet_db", $query, $parameters);
	}

	public static function DeleteNetwork($socialKey, $userName) {
		$query = "DELETE FROM social_networks
                  WHERE nid = ? AND uid IN (
		            SELECT uid FROM users
                    WHERE username = ?)";
		$parameters = array($socialKey, $userName);
		AdoHelper::ExecuteNonQuery("bgunet_db", $query, $parameters);
	}

	public static function GetNetworksByUser($userName) {
		$query = "SELECT s.nid, s.uid, s.name, s.url
			      FROM social_networks s JOIN users u
                  ON s.uid = u.uid
                  WHERE u.username = ?";
		$parameters = array($userName);

		return AdoHelper::ExecuteDataSet("bgunet_db",$query,$parameters);
	}

	public static function GetNetworkBySocialKey($socialKey) {
		$query = "SELECT * FROM social_networks WHERE nid = ?";
		$parameters = array($socialKey);

		return AdoHelper::ExecuteDataSet("bgunet_db",$query,$parameters);
	}

	public static function SetNetwork($socialKey, $username, $networkName, $url) {

		$query = "INSERT INTO social_networks(nid, uid, name, url)
		          SELECT ?, u.uid, ?, ?
                  FROM users u WHERE username = ?";
		$parameters = array($socialKey, $networkName, $url, $username);
		AdoHelper::ExecuteNonQuery("bgunet_db", $query, $parameters);
	}

	public static function CreateDB($DBName) {
		AdoHelper::CreateDB($DBName);
	}

	public static function DeleteDB($DBName) {
		AdoHelper::DeleteDB($DBName);
	}

	public static function GetGroups($Social_Key)
	{
		$query = "SELECT * FROM elgg_groups_entity";
		return AdoHelper::ExecuteDataSet($Social_Key,$query,null);
	}

	public static function GetGroupById($Social_Key,$groupId)
	{
		$query = "SELECT * FROM elgg_groups_entity WHERE guid = ?";
		$parameters = array($groupId);
		return AdoHelper::ExecuteDataSet($Social_Key,$query,$parameters);
	}

	public static function GetUserSocialNetworks($user){
		$query = "SELECT * FROM networks WHERE username = ?";
		$parameters = array($user);
		return AdoHelper::ExecuteDataSet('social_network',$query,$parameters);
	}

}

