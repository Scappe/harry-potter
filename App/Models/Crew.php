<?php

namespace App\Models;

use PDO;

/** PHP version 7.0 */
class Crew extends \Core\Model
{

	/** @return array */
	public static function getAll()
	{
		$db = static::getDB();

		$crewsQuery = $db->query('SELECT DISTINCT name FROM crews');
		$crews = array();

		if ($crewsQuery->num_rows > 0)
			while ($crew = $crewsQuery->fetch_assoc()) { //fetch_assoc scorre le righe della select e si ferma quando sono finiti i dati dell array
				$name = $crew['name'];

				$piratesQuery = $db->query("SELECT pirates.name, pirates.age FROM pirates JOIN crews ON members = pirate_id WHERE crews.name = '$name'");
				$pirates = array();

				if ($piratesQuery->num_rows > 0)
					while ($pirate = $piratesQuery->fetch_assoc())
						array_push(
							$pirates,
							[
								'name' => $pirate['name'], //se fosse solo name basta $pirate['name']
								'age' => $pirate['age'] //il model gli da l'età però poi il js non li usa
							]
						);

				array_push(
					$crews,
					[
						'name' => $name,
						'pirates' => $pirates
					]
				);
			}

		static::closeDB();
		return $crews;
	}
}
