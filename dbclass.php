<?php
/**
 * Class for accessing database
 * @author But Oleksandr <https://butalex.com>
 * @idea Michal Dutkiewicz <http://emdek.pl>
 * @version 0.1
 */

class PanelDatabase
{

/**
 * Flags allowing to specify type of query result
 */

/**
 * Return value of first column of first row as text
 */

const SINGLE = 1;

/**
 * Return first row as associative array
 */

const ROW = 2;

/**
 * Return all rows as list of associative arrays
 */

const ALL = 3;

/**
 * Return amount of rows affected by INSERT, UPDATE and DELETE queries
 */

const AFFECTED = 4;

/**
 * Return identifier of inserted row (AUTO_INCREMENT field)
 */

const IDENTIFIER = 5;

/**
 * Variable to store connection handle
 */

static private $connection = NULL;

/**
 * Connects to database
 * @param string dsn Connection definition for MySQLi
 * @param string user Name of database user
 * @param string password Password of database user
 * @param string table name of database
 * @return boolean
 */

static public function connect($dsn, $user, $password, $table)
{
	if (empty(self::$connection))
	{
		try
		{
			self::$connection = new MySQLi($dsn, $user, $password, $table);
			if(self::$connection->connect_error){
				throw new Exception('Error MySQL: ' . self::$connection->connect_error);
			}
		}
		catch (PDOException $connection)
		{
			echo 'Attempt to connect to database failed<br>'."\n";
			var_dump(self::$connection->connect_error);
			die();
		}
	}
	return FALSE;
}

/**
 * Returns result of database query
 * @param string sql SQL query
 * @param array values List of parameters to be substituted
 * @param integer mode Type of expected result
 * @param boolean numeric TRUE when requesting use of numeric indexes instead of associative for results
 * @return mixed
 */

static public function query($sql,$mode = NULL, $numeric = FALSE)
{
	if (empty(self::$connection))
	{
		return NULL;
	}

		$statement = self::$connection->query($sql);

		if ($mode == self::SINGLE)
		{
			if ($result = $statement->fetch_array())
			{
				return $result[0];
			} else {
				return NULL;
			}
		}
		elseif ($mode == self::ROW)
		{
			return $statement->fetch_assoc();
		}
		elseif ($mode == self::AFFECTED)
		{
			return $statement->num_rows;
		}
		elseif ($mode == self::IDENTIFIER)
		{
			return self::$connection->insert_id;
		}
			$rows = array();
			while($row = $statement->fetch_assoc()) {
				$rows[] = $row;
			}
			return $rows;

}
}
?>