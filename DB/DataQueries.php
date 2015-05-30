<?php
require_once("AdoHelper.php");

class DataQueries
{
	public static function VerifyUser($username, $password)
	{
		$query = "SELECT * FROM users WHERE username = ?";
		$parameters = array($username);
		$users = AdoHelper::ExecuteDataSet("social_network", $query, $parameters);
		if(!empty($users) && password_verify($password, $users[0]["password"])) {
			return $users[0];
		}
		return null;
	}

	public static function InsertUser($userName, $password, $email)
	{
		$query = "INSERT into users (username,password,email) values (?,?,?)";
		$parameters = array($userName, password_hash($password, PASSWORD_DEFAULT), $email);
		AdoHelper::ExecuteNonQuery("social_network", $query, $parameters);
	}

	public static function DeleteNetwork($socialKey, $userName)
	{

		$query = "DELETE FROM networks WHERE social_key = ? AND username = ?";
		$parameters = array($socialKey,$userName);

		AdoHelper::ExecuteNonQuery("social_network", $query, $parameters);

	}

	public static function GetSocialKey($userName)
	{

		$query = "SELECT social_key FROM networks WHERE username = ?";
		$parameters = array($userName);

		return AdoHelper::ExecuteDataSet("social_network",$query,$parameters);
	}

	public static function GetUser($userName)
	{

		$query = "SELECT * FROM users WHERE username = ?";
		$parameters = array($userName);

		return AdoHelper::ExecuteDataSet("social_network",$query,$parameters);
	}

	public static function GetNetworkByUser($userName)
	{
		$query = "SELECT * FROM networks WHERE username = ?";
		$parameters = array($userName);

		return AdoHelper::ExecuteDataSet("social_network",$query,$parameters);
	}

	public static function GetNetworkBySocialKey($socialKey)
	{
		$query = "SELECT * FROM networks WHERE social_key = ?";
		$parameters = array($socialKey);

		return AdoHelper::ExecuteDataSet("social_network",$query,$parameters);
	}
	public static function SetNetwork($socialKey, $userName, $networkName, $SNLink)
	{

		$query = "INSERT into networks (social_key,username,network_name,sn_link) values (?,?,?,?)";
		$parameters = array($socialKey, $userName, $networkName, $SNLink);

		AdoHelper::ExecuteNonQuery("social_network", $query, $parameters);
	}

	public static function GetUserPassword($userPassword)
	{
		$query = "SELECT password FROM users WHERE username = ? ";
		$parameters = array($userPassword);

		return AdoHelper::ExecuteScalar("social_network", $query, $parameters);
	}

	public static function GetProductQuantity($productId)
	{
		$query = "SELECT quantity FROM products WHERE ID = ?";
		$parameters = array($productId);

		return AdoHelper::ExecuteScalar("inventroy", $query, $parameters);
	}

	public static function UpdateQuantity($productId, $quantity)
	{
		$query = "UPDATE products SET quantity = ? WHERE id = ?";
		$parameters = array($quantity, $productId);

		AdoHelper::ExecuteNonQuery("inventroy", $query, $parameters);
	}

	public static function CreateDB($DBName)
	{

		AdoHelper::CreateDB($DBName);
	}

	public static function DeleteDB($DBName)
	{
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

