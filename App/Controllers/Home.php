<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Crew;

class Home extends \Core\Controller
{
	public function renderIndex() //azione chiamata da index.php
	{
		View::renderTemplate('Home/index.html');
	}

	public function crewsJsonAction()
	{
		echo json_encode(Crew::getAll());
	}
}
//