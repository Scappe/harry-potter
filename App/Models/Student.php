<?php

namespace App\Models;

use PDO;

/** PHP version 7.0 */
class Student extends \Core\Model
{
	
	/** @return array */
	public static function getAll()
	{
		$db = static::getDB();
		
		
		
		$studentsQuery = $db->query("SELECT students.name, students.age, houses.name as house FROM students JOIN houses ON students.house_id = houses.house_id");
		$students = array();
		
		if ($studentsQuery->num_rows > 0)
		while ($student = $studentsQuery->fetch_assoc())
		array_push(
			$students,
			[
				'name' => $student['name'],
				'age' => $student['age'],
				'house' => $student['house']
			]
		);				
				
			static::closeDB();
			return $students;
	}
}
	
