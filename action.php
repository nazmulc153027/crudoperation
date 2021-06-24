<?php
	// Include config.php file
	include_once('config.php');

	$dbObj = new Database();

	// Insert Record	
	if (isset($_POST['action']) && $_POST['action'] == "insert") {

		$name = $_POST['name'];
		$email = $_POST['email'];
		$dob = $_POST['dob'];
		$hobbies = $_POST['hobbies'];
		$tel = $_POST['tel'];
		$gender = $_POST['gender'];
		$image = $_POST['image'];
		$dbObj->insertRecond($name, $email, $dob, $hobbies, $tel, $gender , $image);
	}

	// View record
	if (isset($_POST['action']) && $_POST['action'] == "view") {
		$output = "";

		$customers = $dbObj->displayRecord();

		if ($dbObj->totalRowCount() > 0) {
			$output .="<table class='table table-striped table-hover'>
			        <thead>
			          <tr>
			            <th>Id</th>
			            <th>Name</th>
			            <th>Email</th>
			            <th>Date of birth</th>
			            <th>Hobbies</th>
			            <th>Number</th>
			            <th>Gender</th>
			            <th>Image</th>
			            <th>Action</th>
			          </tr>
			        </thead>
			        <tbody>";
			foreach ($customers as $customer) {
			$output.="<tr>
			            <td>".$customer['id']."</td>
			            <td>".$customer['name']."</td>
			            <td>".$customer['email']."</td>
			            <td>".date('d-M-Y', strtotime($customer['dob']))."</td>
			            <td>".$customer['hobbies']."</td>
			            <td>".$customer['tel']."</td>
			            <td>".$customer['gender']."</td>
			            <td>".$customer['image']."</td>
			            
			            <td>
			              <a href='#editModal' style='color:green' data-toggle='modal' 
			              class='editBtn' id='".$customer['id']."'><i class='fa fa-pencil'></i></a>&nbsp;
			              <a href='' style='color:red' class='deleteBtn' id='".$customer['id']."'>
			              <i class='fa fa-trash' ></i></a>
			            </td>
			        </tr>";
				}
			$output .= "</tbody>
      		</table>";
      		echo $output;	
		}else{
			echo '<h3 class="text-center mt-5">No records found</h3>';
		}
	}

	// Edit Record	
	if (isset($_POST['editId'])) {
		$editId = $_POST['editId'];
		$row = $dbObj->getRecordById($editId);
		echo json_encode($row);
	}


	// Update Record
	if (isset($_POST['action']) && $_POST['action'] == "update") {
		$id = $_POST['id'];
		$name = $_POST['uname'];
		$email = $_POST['uemail'];
		$dob = $_POST['udob'];
		$hobbies = $_POST['uhobbies'];
		$tel = $_POST['utel'];
		$gender = $_POST['ugender'];
		$image = $_POST['uimage'];
		$dbObj->updateRecord($id, $name, $email, $dob, $hobbies, $tel, $gender, $image);
	}


	// Edit Record	
	if (isset($_POST['deleteBtn'])) {
		$deleteBtn = $_POST['deleteBtn'];
		$dbObj->deleteRecord($deleteBtn);
	}


	// Export to excel
	//if (isset($_GET['export']) && $_GET['export'] == 'excel') {

		//header("Content-type: application/vnd.ms-excel; name='excel'");
		//header("Content-Disposition: attachment; filename=customers.xls");
		//header("Pragma: no-cache");
		//header("Expires: 0");

		//$exportData = $dbObj->displayRecord();

		//echo'<table border="1">
			//<tr style="font-weight:bold">
			    //<td>Id</td>
			    //<td>Name</td>
			    //<td>Email</td>
			    //<td>Date of birth</td>
			    //<td>Hobbies</td>
			    //<td>Number</td>
			    //<td>Gender</td>
			    //<td>Image</td>
			//</tr>';
		//foreach ($exportData as $export) {
		//echo'<tr>
			//<td>'.$export['id'].'</td>
			//<td>'.$export['name'].'</td>
			//<td>'.$export['email'].'</td>
			//<td>'.$export['username'].'</td>
			//<td>'.date('d-M-Y', strtotime($export['dob'])).'</td>
		     //</tr>';
			//}		
		//echo '</table>';
	//}

?>