<?php 

// --------------------------------------------------------------------------------
// PhpADOB Library - ADOB_DB: Database Manager
// --------------------------------------------------------------------------------
// Version: 1.0
// AUTHOR: ACXEL OROZCO, ADOB Apps
//Date: 14/08/2020
// --------------------------------------------------------------------------------
//
namespace Adob;

class ADOB_DB{
// --------------------------------------------------------------------------------
// ADOB_DB
// --------------------------------------------------------------------------------


//$db = new ADOB_DB($server, $user, $pwd)
//db($name)
//SimpleTable($db, $name)
//addTable($db, $name, $idType:["INT" OR "VARCHAR"], $idLim, $nLim, $dLim)
//addCtg($db, $name, $idType:["INT" OR "SMALLINT" OR "VARCHAR"], $idLim[MAXVALUE=255])
//addProduct($db, $table, $id, $item, $descrip, $price)
//addSimpleItem($db, $table, $id, $item, $descrip)
//delSimpleItem($db, $table, $item)
//delSItemBy($db, $table, $key, $item)
//delTable($db, $table)
//delDB($db)
//getSItemBy($db, $table, $key:["id" || "name" || "description" || "price"], $ikey:["ikey"])
//getItemsByLess($db, $table, $key:["id" || "name" || "description" || "price"], $ikey:["ikey"])
//getItemsByGreater($db, $table, $key:["id" || "name" || "description" || "price"], $ikey:["ikey"])
//getItems($db, $table, $key:["id" || "name" || "description" || "price"], $initkey:["initkey"], $endkey:["endkey"])
//updateItem($db, $table, $id, $key["name" || "description" || "price"], $ikey)
//updateItemBy($db, $table, $key["id" || "name"], $ikey, $data["id" || "name" || "description" || "price"], $idata)
/* {Caution be careful $key != $data}, can be used to modify any general data property {["id" || "name" || "description" || "price"]}*/
//renameTable($db, $table, $n_name)


//===== BEGINNING FUNCTIONS
	var $connection = null;

	function __construct($server, $user, $pwd){
		$this->connection = $this->start($server, $user, $pwd);
	}

	function __destruct(){
		mysql_close($this->connection);
	}

	function start($server, $user, $pwd){
		$connection = mysql_connect($server, $user, $pwd);
		if ( ($connection) ){
			return $connection;
		} else {
			return null;
		}
	}
//===== BEGINNING FUNCTIONS



// --------------------------------------------------------------------------------
//===== ADDING DATA FUNCTIONS
/*
*Create DB
*@param $name   Database name
*/
	function db($name){
		$b_f = false;
		if ( ($name != null) && ($this->connection) ){
			if(mysql_error($this->connection)){
				return false;
			}
			$sql = "CREATE DATABASE $name";//demoDB
			if ( (mysql_query($sql, $this->connection)) === true){ //verify, process, success and value
				$b_f = true;
			}
		} else {
			return false;
		}
		return $b_f;
 	}

/*
*Create simple table into created DB
* @param $db        Database name
* @param $name   Table name
*/
	function SimpleTable($db, $name){
		$b_f = false;
		if ( ($db != null) && ($this->connection) ){
			$sdb = mysql_select_db($db, $this->connection);
			if(mysql_error($this->connection)){
				return false;
			}
			$sql = "CREATE TABLE $name(id INT(15) AUTO_INCREMENT PRIMARY KEY UNIQUE, name VARCHAR(1000) NOT NULL, description VARCHAR(100000))";
			if ( (mysql_query($sql, $this->connection)) === true){ //verify, process, success and value
				$b_f = true;
			}
		} else {
			return false;
		}
		return $b_f;
	}

/*
*Create custome table into created DB
* @param $db        Database name
* @param $name   Table name
* @param $idType  id type data "INT" OR "VARCHAR"
* @param $idLim   id data limit
* @param $nLim    name data limit
* @param $dLim    description data limit
*/
	function addTable($db, $name, $idType, $idLim, $nLim, $dLim){
		$b_f = false;
		$extra = "";
		if ( ($db != null) && ($this->connection) ){
			$sdb = mysql_select_db($db, $this->connection);
			if(mysql_error($this->connection)){
				return false;
			}
			if($idType == "INT"){ $extra = "AUTO_INCREMENT";}
			$sql = "CREATE TABLE $name(id $idType($idLim) PRIMARY KEY UNIQUE NOT NULL $extra, name VARCHAR($nLim) NOT NULL, description VARCHAR($dLim))";
			if ( (mysql_query($sql, $this->connection)) === true){ //verify, process, success and value
				$b_f = true;
			}
		} else {
			return false;
		}
		return $b_f;
	}

/*
*Create custome table type catalogue into created DB
* @param $db        Database name
* @param $name   Table name
* @param $idType  id type data "INT" OR "SMALLINT" OR "VARCHAR"
* @param $idLim    id data limit MAXVALUE=255]
*/
	function addCtg($db, $name, $idType, $idLim){
		$b_f = false; 
		$extra = "";
		if ( ($db != null) && ($this->connection) ){
			$sdb = mysql_select_db($db, $this->connection);
			if(mysql_error($this->connection)){
				return false;
			}
			if( ($idType == "INT") || ($idType == "SMALLINT") ){ $extra = "AUTO_INCREMENT";}
			$sql = "CREATE TABLE $name(id $idType($idLim) PRIMARY KEY UNIQUE NOT NULL $extra, name MEDIUMTEXT NOT NULL, description LONGTEXT, price INT(20) NOT NULL)";
			if ( (mysql_query($sql, $this->connection)) === true){ //verify, process, success and value
				$b_f = true;
			}
		} else {
			return false;
		}
		return $b_f;
	}

/*
*Insert data into SimpleTable
* @param $db           Database name
* @param $table       Table name
* @param $id             item id
* @param $item         item name
* @param $descrip    item description
*/
	function addSimpleItem($db, $table, $id, $item, $descrip){
		$b_f = false;
		if ( ($db != null) && ($table != null) && ($this->connection) ){
			$sdb = mysql_select_db($db, $this->connection);
			if(mysql_error($this->connection)){
				return false;
			}
			$sql = "INSERT INTO $table (id, name, description)VALUES('$id', '$item', '$descrip')";
			if ( (mysql_query($sql, $this->connection)) === true){ //verify, process, success and value
				$b_f = true;
			}
		} else {
			return false;
		}
		return $b_f;
	}

/*
*Add product
* @param $db           Database name
* @param $table       Table name
* @param $id             item id
* @param $item         item name
* @param $descrip    item description
* @param $price        item price
*/
	function addProduct($db, $table, $id, $item, $descrip, $price){
		$b_f = false;
		if ( ($db != null) && ($table != null) && ($this->connection) ){
			$sdb = mysql_select_db($db, $this->connection);
			if(mysql_error($this->connection)){
				return false;
			}
			$sql = "INSERT INTO $table (id, name, description, price)VALUES('$id', '$item', '$descrip', '$price')";
			if ( (mysql_query($sql, $this->connection)) === true){ //verify, process, success and value
				$b_f = true;
			}
		} else {
			return false;
		}
		return $b_f;
	}

//===== ADDING DATA FUNCTIONS
// --------------------------------------------------------------------------------


// --------------------------------------------------------------------------------
//===== DELETING DATA FUNCTIONS
/*
*Delete SimpleItem from SimpleTable
* @param $db           Database name
* @param $table       Table name
* @param $item         item name
*/
	function delSimpleItem($db, $table, $item){
		$b_f = false;
		if ( ($db != null) && ($table != null) && ($this->connection) ){
			$sdb = mysql_select_db($db, $this->connection);
			if(mysql_error($this->connection)){
				return false;
			}
			$sql = "DELETE FROM $table WHERE name = '$item' ORDER BY name LIMIT 1";
			if ( (mysql_query($sql, $this->connection)) === true ){ //verify, process, success and value
				$b_f = true;
			}
		} else {
			return false;
		}
		return $b_f;
	}



/*
*Delete Item from SimpleTable by key
* @param $db           Database name
* @param $table       Table name
* @param $key           id || name || description
* @param $item         item name
*/
	function delSItemBy($db, $table, $key, $item){
		$b_f = false;
		if ( ($db != null) && ($table != null) && ($this->connection) ){
			$sdb = mysql_select_db($db, $this->connection);
			if(mysql_error($this->connection)){
				return false;
			}
			$sql = "DELETE FROM $table WHERE $key = '$item' ORDER BY $key LIMIT 1";
			if ( (mysql_query($sql, $this->connection)) === true ){ //verify, process, success and value
				$b_f = true;
			}
		} else {
			return false;
		}
		return $b_f;
	}



/*
*Delete product from ctg by key
* @param $db           Database name
* @param $table       Table name
* @param $key           id || name || description
* @param $item         item name
*/
	function delProduct($db, $table, $key, $item){
		$this->delSItemBy($db, $table, $key, $item);
	}



/*
*Delete Table
* @param $db           Database name
* @param $table       Table name
*/
	function delTable($db, $table){
		$b_f = false;
		if ( ($db != null) && ($table != null) ){
			$sdb = mysql_select_db($db, $this->connection);
			if(mysql_error($this->connection)){
				return false;
			}
			$sql = "DROP TABLE $table";
			if ( (mysql_query($sql, $this->connection)) === true ){ //verify, process, success and value
				$b_f = true;
			}
		} else {
			return false;
		}
		return $b_f;
	}



/*
*Delete DB
* @param $db           Database name
*/
	function delDB($db){
		$b_f = false;
		if ( ($db != null) ){
			if(mysql_error($this->connection)){
				return false;
			}
			$sql = "DROP DATABASE $db";
			if ( (mysql_query($sql, $this->connection)) === true ){ //verify, process, success and value
				$b_f = true;
			}
		} else {
			return false;
		}
		return $b_f;
	}
//===== DELETING DATA FUNCTIONS
// --------------------------------------------------------------------------------


// --------------------------------------------------------------------------------
//===== GETTING DATA FUNCTIONS

/*
*Get data from SimpleTable
* @param $db           Database name
* @param $table       Table name
* @param $key           "id" || "name" || "description" || "price"
* @param $ikey          value selected
* @param $item         item name
* @return false if die
*/
	function getSItemBy($db, $table, $key, $ikey){
		if ( ($db != null) && ($table != null) && ($this->connection) ){
			$sdb = mysql_select_db($db, $this->connection);
			if(mysql_error($this->connection)){
				return false;
			}
			$sql = "SELECT * FROM $table WHERE $key = '$ikey' ORDER BY $key";
			$result = mysql_query($sql, $this->connection); 
			if ( ($result) == true ){
				return $result;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}



/*
*Get data from SimpleTable
* @param $db           Database name
* @param $table       Table name
* @param $key           "id" || "name" || "description" || "price"
* @param $ikey          value selected
* @param $item         item name
* @return false if die
*/
	function getItemsByLess($db, $table, $key, $ikey){
		if ( ($db != null) && ($table != null) && ($this->connection) ){
			$sdb = mysql_select_db($db, $this->connection);
			if(mysql_error($this->connection)){
				return false;
			}
			$sql = "SELECT * FROM $table WHERE $key <= '$ikey' ORDER BY $key";
			$result = mysql_query($sql, $this->connection); 
			if ( ($result) == true ){
				return $result;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}



/*
*Get data from SimpleTable
* @param $db           Database name
* @param $table       Table name
* @param $key           "id" || "name" || "description" || "price"
* @param $ikey          value selected
* @param $item         item name
* @return false if die
*/
	function getItemsByGreater($db, $table, $key, $ikey){
		if ( ($db != null) && ($table != null) && ($this->connection) ){
			$sdb = mysql_select_db($db, $this->connection);
			if(mysql_error($this->connection)){
				return false;
			}
			$sql = "SELECT * FROM $table WHERE $key >= '$ikey' ORDER BY $key";
			$result = mysql_query($sql, $this->connection); 
			if ( ($result) == true ){
				return $result;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}



/*
*Get data from SimpleTable
* @param $db           Database name
* @param $table       Table name
* @param $key           "id" || "name" || "description" || "price"
* @param $ikey          value selected
* @param $item         item name
* @param $initkey     ["initial_key"]
* @param $endkey    ["endkey"]
* @return false if die
*/
	function getItems($db, $table, $key, $initkey, $endkey){
		if ( ($db != null) && ($table != null) && ($this->connection) ){
			$sdb = mysql_select_db($db, $this->connection);
			if(mysql_error($this->connection)){
				return false;
			}
			//$sql = "SELECT * FROM $table WHERE $key BETWEEN '$initkey' AND '$endkey' ORDER BY $key";
			$sql = "SELECT * FROM $table WHERE $key >= '$initkey' AND $key < '$endkey' ORDER BY $key";
			$result = mysql_query($sql, $this->connection); 
			if ( ($result) == true ){
				return $result;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}


//===== GETTING DATA FUNCTIONS
// --------------------------------------------------------------------------------



// --------------------------------------------------------------------------------
//===== UPDATE FUNCTIONS
/*
*Update item info
* @param $db           Database name
* @param $table       Table name
* @param $id             item id
* @param $key           "id" || "name" || "description" || "price"
* @param $ikey          value selected
* @return false if die
*/
	function updateItem($db, $table, $id, $key, $ikey){
		$b_f = false;
		if ( ($db != null) && ($table != null) && ($this->connection) ){
			$sdb = mysql_select_db($db, $this->connection);
			if(mysql_error($this->connection)){
				return false;
			}
			$sql = "UPDATE $table SET $key = '$ikey' WHERE id = '$id' ";
			if ( (mysql_query($sql, $this->connection)) == true){
				$b_f = true;
			}
		} else {
			return false;
		}
		return $b_f;
	}


/*
*Update item info
* @param $db           Database name
* @param $table       Table name
* @param $key           "id" || "name"
* @param $ikey          value selected
* @param $data         "id" || "name" || "description" || "price"
* @param $idata        new value to set to $data
* @return false if die
* @Caution $key != $data
*/
	function updateItemBy($db, $table, $key, $ikey, $data, $idata){
		$b_f = false;
		if ( ($db != null) && ($table != null) && ($this->connection) ){
			$sdb = mysql_select_db($db, $this->connection);
			if(mysql_error($this->connection)){
				return false;
			}
			$sql = "UPDATE $table SET $data = '$idata' WHERE $key = '$ikey' ";
			if ( (mysql_query($sql, $this->connection)) == true){
				$b_f = true;
			}
		} else {
			return false;
		}
		return $b_f;
	}

//===== UPDATE FUNCTIONS
// --------------------------------------------------------------------------------



// --------------------------------------------------------------------------------
//===== RENAMING FUNCTIONS


/*
*Rename table into created DB
* @param $db           Database name
* @param $table       Current name
* @param $n_name  New table name
*/
	function renameTable($db, $table, $n_name){
		$b_f = false;
		if ( ($db != null) && ($table != null) ){
			$sdb = mysql_select_db($db, $this->connection);
			if(mysql_error($this->connection)){
				return false;
			}
			$sql = "ALTER TABLE $table RENAME $n_name";
			if ( (mysql_query($sql, $this->connection)) === true ){ //verify, process, success and value
				$b_f = true;
			}
		} else {
			return false;
		}
		return $b_f;
	}


//===== RENAMING FUNCTIONS
// --------------------------------------------------------------------------------



// --------------------------------------------------------------------------------
// ADOB_DB
// --------------------------------------------------------------------------------
}

?>
