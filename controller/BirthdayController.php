<?php

require(ROOT . "model/BirthdayModel.php");

function index()
{
 	$months = array("januari" , "februari", "maart", "april", "mei", "juni", "juli", "augustus", "september", "oktober", "november", "december");

	render("birthday/index", array(
		'birthdays' => getAllBirthdays(),
		'months' => $months));
}

function create()
{
	render("birthday/create");
}

function createSave()
{
	if (!createBirthday()) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "birthday/index");
}

function edit($id)
{
	render("birthday/edit", array(
		'birthday' => getBirthday($id)
	));
}

function editSave()
{
	if (!editBirthday()) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "birthday/index");
} 

function delete($id)
{
	if (!deleteBirthday($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "birthday/index");
}
