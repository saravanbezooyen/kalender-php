<?php

function getBirthday($id) 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM birthdays WHERE birthday_id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id));

	$db = null;

	return $query->fetch();
}

function getAllBirthdays() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM birthday";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function editBirthday() 
{
	$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;
	$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
	$gender = isset($_POST['gender']) ? $_POST['gender'] : null;
	$id = isset($_POST['id']) ? $_POST['id'] : null;
	
	if (strlen($firstname) == 0 || strlen($lastname) == 0 || strlen($gender) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "UPDATE birthdays SET birthday_firstname = :firstname, birthday_lastname = :lastname, birthday_gender = :gender WHERE birthday_id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':firstname' => $firstname,
		':lastname' => $lastname,
		':gender' => $gender,
		':id' => $id));

	$db = null;
	
	return true;
}

function deleteBirthday($id = null) 
{
	if (!$id) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "DELETE FROM birthdays WHERE birthday_id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));

	$db = null;
	
	return true;
}

function createBirthday() 
{
	$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;
	$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
	$gender = isset($_POST['gender']) ? $_POST['gender'] : null;
	
	if (strlen($firstname) == 0 || strlen($lastname) == 0 || strlen($gender) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO birthsdays(birthday_firstname, birthday_lastname, birthday_gender) VALUES (:firstname, :lastname, :gender)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':firstname' => $firstname,
		':lastname' => $lastname,
		':gender' => $gender));

	$db = null;
	
	return true;
}
