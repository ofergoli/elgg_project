<?php
// define("ADODB_PATH", "\ADOdb\adodb.inc.php");

require_once("\ADOdb\adodb.inc.php");

/**
 * Ado Helper class
 *
 * Contains 5 methods :
 *      1.Execute Scalar.    V
 *      2.Execute Data Set.    V
 *      3.Execute Non Query.    V
 *      4.Create DB.        V
 *      5.Delete DB.        V
 *
 */
class AdoHelper
{

	// Connection Configuration:

	protected static $_DBType = "mysqli";
	protected static $_DBServer = "localhost";

	protected static $_DBUser = "root";
	protected static $_DBPass = "root";

	protected static $_dsn;
	protected static $_dsn_options = "?persist=0&fetchmode=2";

	protected static $_DBCon;


	public static function ExecuteScalar($DBName, $query, $a_bind_params)
	{   // Expected input:
		//// $a_bind_params = array('Rami', 'Robzz');
		//// $sql='SELECT * FROM users WHERE firstname = ? AND lastname = ?';

		self::$_dsn_options = "?persist=0&fetchmode=1";
		self::$_dsn = self::$_DBType . "://" . self::$_DBUser . ":" . self::$_DBPass . "@" . self::$_DBServer . "/" . $DBName . self::$_dsn_options;
		self::$_DBCon = NewADOConnection(self::$_dsn);

		$rs = self::$_DBCon->Execute($query, $a_bind_params);

		self::$_DBCon->Close();

		if ($rs === false) {
			trigger_error('Wrong SQL: ' . $query . ' Error: ' . self::$_DBCon->ErrorMsg(), E_USER_ERROR);
		} else {

			return $rs->fields[0];
		}
	}

	public static function ExecuteDataSet($DBName, $query, $a_bind_params)
	{
		self::$_dsn = self::$_DBType . "://" . self::$_DBUser . ":" . self::$_DBPass . "@" . self::$_DBServer . "/" . $DBName . self::$_dsn_options;
		self::$_DBCon = NewADOConnection(self::$_dsn);

		$rs = self::$_DBCon->Execute($query, $a_bind_params);

		self::$_DBCon->Close();

		if ($rs === false) {
			trigger_error('Wrong SQL: ' . $query . ' Error: ' . self::$_DBCon->ErrorMsg(), E_USER_ERROR);
		} else {
			$arr = $rs->GetRows();

		}
		return $arr;
	}

	public static function ExecuteNonQuery($DBName, $query, $a_bind_params)
	{
		self::$_dsn = self::$_DBType . "://" . self::$_DBUser . ":" . self::$_DBPass . "@" . self::$_DBServer . "/" . $DBName . self::$_dsn_options;
		self::$_DBCon = NewADOConnection(self::$_dsn);


		$rs = self::$_DBCon->Execute($query, $a_bind_params);

		self::$_DBCon->Close();


		if ($rs === false) {
			trigger_error('Wrong SQL: ' . $query . ' Error: ' . self::$_DBCon->ErrorMsg(), E_USER_ERROR);
		}
	}

	public static function CreateDB($DBName)
	{
		// Create connection
		$conn = mysqli_connect(self::$_DBServer, self::$_DBUser, self::$_DBPass);

		// Check connection
		if (mysqli_connect_errno()) {
			die("database problem:" . mysqli_connect_error());
		}

		// prepare and bin
		$conn->query("CREATE DATABASE " . $DBName);

		// Close connection
		$conn->close();
	}

	public static function DeleteDB($DBName)
	{
		$conn = mysqli_connect(self::$_DBServer, self::$_DBUser, self::$_DBPass);

		// Check connection
		if (mysqli_connect_errno()) {
			die("database problem:" . mysqli_connect_error());
		}

		// prepare and bin
		$conn->query("DROP DATABASE " . $DBName);

		// Close connection
		$conn->close();
	}

}

?>