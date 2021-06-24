<?php
	
	class Database 
	{
		private $servername = "localhost";
		private $username   = "root";
		private $password   = "";
		private $dbname = "crud_oops";
		public $con;
		public $customerTable = "customers";

		public function __construct()
		{
			try {
				$this->con = new mysqli($this->servername, $this->username, $this->password, $this->dbname);	
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}

		// Insert customer data into customer table
		public function insertRecond($name, $email, $dob, $hobbies, $tel, $gender, $image)
		{
			$sql = "INSERT INTO $this->customerTable (name, email, dob, hobbies, tel, gender, image) VALUES('$name','$email', '$dob', '$hobbies', '$tel', '$gender', '$image')";
			$query = $this->con->query($sql);
			if ($query) {
				return true;
			}else{
				return false;
			}
		}

		// Fetch customer records for show listing
		public function displayRecord()
		{
			$sql = "SELECT * FROM $this->customerTable";
			$query = $this->con->query($sql);
			$data = array();
			if ($query->num_rows > 0) {
				while ($row = $query->fetch_assoc()) {
					$data[] = $row;
				}
				return $data;
			}else{
				return false;
			}
		}

		// Fetch single data for edit from customer table
		public function getRecordById($id)
		{
			$query = "SELECT * FROM $this->customerTable WHERE id = '$id'";
			$result = $this->con->query($query);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				return $row;
			}else{
				return false;
			}
		}


		public function totalRowCount(){
			$sql = "SELECT * FROM $this->customerTable";
			$query = $this->con->query($sql);
			$rowCount = $query->num_rows;
			return $rowCount;
		}
	

		// Update customer data into customer table
		public function updateRecord($id, $name, $email, $dob, $hobbies, $tel, $gender, $image)
		{
			$sql = "UPDATE $this->customerTable SET name = '$name', email = '$email', dob = '$dob', hobbies = '$hobbies', tel = '$tel', gender = '$gender', image = '$image' 
			WHERE id = '$id'";
			$query = $this->con->query($sql);
			if ($query) {
				return true;
			}else{
				return false;
			}
		}

		// Delete customer data from customer table
		public function deleteRecord($id)
		{
			$sql = "DELETE FROM $this->customerTable WHERE id = '$id'";
			$query = $this->con->query($sql);
			if ($query) {
				return true;
			}else{
				return false;
			}
		}
	}

?>