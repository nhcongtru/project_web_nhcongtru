<?php
namespace controllers;

class dbcontroller 
{
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "geartech";
	private $conn;

	function __construct()
	{
		$this->conn = $this->connectDB();
	}

	function connectDB()
	{
		$conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
		$conn->set_charset("utf8");
		return $conn;
	}

	function runQuery($query)
	{
		$result = mysqli_query($this->conn, $query);
		if ($result) {
			while ($row = mysqli_fetch_assoc($result)) {
				$resultset[] = $row;
			}
			if (!empty($resultset))
				return $resultset;
		} else
			echo "Truy vấn có lỗi: " . mysqli_error($this->conn);
	}

	function numRows($query)
	{
		$result  = mysqli_query($this->conn, $query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;
	}
}
