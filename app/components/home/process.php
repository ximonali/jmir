<?php
$errors 	= array();  	// array to hold validation errors
$data 		= array(); 		// array to pass back data
$country_code="CA";
//PostalCode 
$ZIPREG=array(
 "US"=>"^\d{5}([\-]?\d{4})?$",
 "UK"=>"^(GIR|[A-Z]\d[A-Z\d]??|[A-Z]{2}\d[A-Z\d]??)[ ]??(\d[A-Z]{2})$",
 "DE"=>"\b((?:0[1-46-9]\d{3})|(?:[1-357-9]\d{4})|(?:[4][0-24-9]\d{3})|(?:[6][013-9]\d{3}))\b",
 "CA"=>"^([ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ])\ {0,1}(\d[ABCEGHJKLMNPRSTVWXYZ]\d)$",
 "FR"=>"^(F-)?((2[A|B])|[0-9]{2})[0-9]{3}$",
 "IT"=>"^(V-|I-)?[0-9]{5}$",
 "AU"=>"^(0[289][0-9]{2})|([1345689][0-9]{3})|(2[0-8][0-9]{2})|(290[0-9])|(291[0-4])|(7[0-4][0-9]{2})|(7[8-9][0-9]{2})$",
 "NL"=>"^[1-9][0-9]{3}\s?([a-zA-Z]{2})?$",
 "ES"=>"^([1-9]{2}|[0-9][1-9]|[1-9][0-9])[0-9]{3}$",
 "DK"=>"^([D-d][K-k])?( |-)?[1-9]{1}[0-9]{3}$",
 "SE"=>"^(s-|S-){0,1}[0-9]{3}\s?[0-9]{2}$",
 "BE"=>"^[1-9]{1}[0-9]{3}$"
);

// validate the variables ======================================================
	if (empty($_POST['name'])){
		$errors['name'] = 'Name is required.';
	}elseif(!preg_match("/^[a-zA-Z'-]/", trim($_POST['name']))){
		$errors['name'] = 'Name is invalid';
	}

	if (empty($_POST['province'])){
		$errors['province'] = 'Province is required.';
	}

	if (empty($_POST['telephone'])){
		$errors['telephone'] = 'Telephone is required.';
	}elseif (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", trim($_POST['telephone']))) {
		$errors['telephone'] = 'Format must be: 000-000-0000 or (416) 123-4567';
	}

	if (empty($_POST['postalcode'])){
		$errors['postalcode'] = 'Postal Code is required.';	
	}elseif (!preg_match("/".$ZIPREG[$country_code]."/i",trim($_POST['postalcode']))){
		$errors['postalcode'] = 'Format must be: M5G2G8 or M5G 2G8'; 
	}

	if (empty($_POST['salary'])){
		$errors['salary'] = 'Salary is required.';
	}elseif (!preg_match("/^(\d{1,3},)*(\d{1,3})*(\.\d{2})?$/", trim($_POST['salary']))) {
		$errors['salary'] = 'Format Invalid';
	}


//-------VALIDATE FUNCTIONS--------


 

// return a response ===========================================================

	// response if there are errors
	if (!empty($errors)) {

		// if there are items in errors array, return those errors
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {

		// if there are no errors, Save to database	and return message
		include('save.php');
		//Save to database		
		// if($result) {
		//     echo("<br>Data Input OK");
		// } else {
		//     echo("<br>Data Input Failed");
		// }		

		$data['success'] = true;
		$data['message'] = 'Your data is saved. Go to listing page to see.';
		$data['name']  = $name;
		$data['province'] = $province;
		$data['telephone'] = $telephone;
		$data['postalcode'] = $postalcode;
		$data['salary'] = $salary;
}
	// return all data to an AJAX call
	echo json_encode($data);