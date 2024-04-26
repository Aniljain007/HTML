<?php

use Drupal\Core\Database\Connection;

class LoadData {

    protected $database;

    public function __contruct(Connection $database) {
        $this->database = $database;

    }
    /**
     * 
     */
    public function setData($form_state) {
        $conn = $this->database;
		
		$field = $form_state->getValues();
	   
		$fields["fname"] = $field['fname'];
		$fields["sname"] = $field['sname'];
		$fields["age"] = $field['age'];
		
		  $conn->insert('student')
			   ->fields($fields)->execute();

    }
    /**
     * 
     */
    public function getData() {
   // $db = \Drupal::database();
    $query = $this->database->select('student', 'e');
    $query->fields('e');
    //$query->condition('e.type', 'student');
    $result = $query->execute()->fetchAll();
    return $result;
   //var_dump( $result);

    }

}