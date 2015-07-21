<?php
require_once("AdoHelper.php");
require_once("csv_io.php");


class DataQueries
{
	public static function UpdateUserPassword($userid, $password)
	{
		$query = "UPDATE users
			      SET password = ?
			      WHERE uid = ?";
		$parameters = array(password_hash($password, PASSWORD_DEFAULT), $userid);
		AdoHelper::ExecuteNonQuery("bgunet_db", $query, $parameters);
	}

	public static function UpdateUserEmail($userid, $email)
	{
		$query = "UPDATE users
			      SET email = ?
			      WHERE uid = ?";
		$parameters = array($email, $userid);
		AdoHelper::ExecuteNonQuery("bgunet_db", $query, $parameters);
	}

	public static function VerifyUser($username, $password)
	{
		$query = "SELECT * FROM users WHERE username = ?";
		$parameters = array($username);
		$users = AdoHelper::ExecuteDataSet("bgunet_db", $query, $parameters);
		if (!empty($users) && password_verify($password, $users[0]["password"])) {
			return $users[0];
		}
		return null;
	}

	public static function InsertUser($userName, $password, $email)
	{
		$query = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
		$parameters = array($userName, password_hash($password, PASSWORD_DEFAULT), $email);
		AdoHelper::ExecuteNonQuery("bgunet_db", $query, $parameters);
	}

	public static function DeleteNetwork($socialKey, $userName)
	{
		$query = "DELETE FROM social_networks
                  WHERE nid = ? AND uid IN (
		            SELECT uid FROM users
                    WHERE username = ?)";
		$parameters = array($socialKey, $userName);
		AdoHelper::ExecuteNonQuery("bgunet_db", $query, $parameters);
	}

	public static function GetNetworksByUser($userName)
	{
		$query = "SELECT s.nid, s.uid, s.name, s.url
			      FROM social_networks s JOIN users u
                  ON s.uid = u.uid
                  WHERE u.username = ?";
		$parameters = array($userName);

		return AdoHelper::ExecuteDataSet("bgunet_db", $query, $parameters);
	}

	public static function GetNetworkBySocialKey($socialKey)
	{
		$query = "SELECT * FROM social_networks WHERE nid = ?";
		$parameters = array($socialKey);

		return AdoHelper::ExecuteDataSet("bgunet_db", $query, $parameters);
	}

	public static function SetNetwork($socialKey, $username, $networkName, $url)
	{
		$query = "INSERT INTO social_networks(nid, uid, name, url)
		          SELECT ?, u.uid, ?, ?
                  FROM users u WHERE username = ?";
		$parameters = array($socialKey, $networkName, $url, $username);
		AdoHelper::ExecuteNonQuery("bgunet_db", $query, $parameters);
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
		return AdoHelper::ExecuteDataSet($Social_Key, $query, null);
	}

	public static function GetGroupById($Social_Key, $groupId)
	{
		$query = "SELECT * FROM elgg_groups_entity WHERE guid = ?";
		$parameters = array($groupId);
		return AdoHelper::ExecuteDataSet($Social_Key, $query, $parameters);
	}

	public static function GetUserSocialNetworks($userId)
	{
		$query = "SELECT * FROM social_networks WHERE uid = ?";
		$parameters = array($userId);
		return AdoHelper::ExecuteDataSet('bgunet_db', $query, $parameters);
	}

	public static function GetUserByName($username)
	{
		$query = "SELECT * FROM users WHERE username = ?";
		$parameters = array($username);
		return AdoHelper::ExecuteDataSet('bgunet_db', $query, $parameters);
	}

	public static function CreateTable($DBName, $command)
	{
		AdoHelper::ExecuteNonQuery($DBName, $command, null);
	}

	public static function GetAllTables($dbName)
	{
		$query = "SHOW TABLES";
		$tables = AdoHelper::ExecuteDataSet($dbName, $query, null);
		$path = "tmp/" . $dbName;
		foreach ($tables as $table) {
			$table_name = $table[array_keys($table)[0]];
			$select = "SELECT * FROM " . $table_name;
			$table_data = AdoHelper::ExecuteDataSet($dbName, $select, null);
			build_csv($path . "/" . $table_name, $table_data);
		}
		return $path;
	}

	public static function ReplaceIntoTable($dbName, $tableName, $valuesArray) {
		if(count($valuesArray) > 0) {
			$query = "REPLACE INTO " . $tableName . " VALUES";
			foreach ($valuesArray as $values) {
				$query .= "(" . $values . "), ";
			}
			$query = substr($query, 0, -2) . ";";
			AdoHelper::ExecuteMultiQuery($dbName, $query);
		}
	}
}

