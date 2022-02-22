<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Student;

class Home extends \Core\Controller
{
	public function renderIndex() //azione chiamata da index.php
	{
		View::renderTemplate('Home/index.html');
	}

	public function studentsJsonAction()
	{
		echo json_encode(Student::getAll());
	}
}