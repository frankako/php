<?php

class Baseobject {

	public $errors;

	public static function find_record($sql) {
		global $dbc;

		$object_array();

		$result = $dbc->find_query($sql);

		if ($row = mysqli_fetch_array($result)) {
			$object_array[] = static::instantation($row);
		}

		return $object_array;
	}

	protected static function instantation($data) {

		$the_object = get_called_class();

		foreach ($data as $attribute => $value) {
			if ($the_object->has_the_attribute($attribute)) {
				$the_object->{$attribute} = $value;
			}
		}

		return $the_object;
	}

	public function has_the_attribute($attribute) {
		$properties = get_object_vars($this);

		return array_key_exists($attribute, $properties);
	}

	public function create() {
		global $dbc;
		$properties_array = $this->clean_properties();

		$sql = "INSERT INTO " . static::$table . "(" . implode(", ", array_keys($properties_array)) . ")";
		$sql .= "VALUES('" . implode("', '", array_values($properties_array)) . "')";

		$dbc->find_query($sql);

		return (mysqli_affected_rows($dbc->connection) == 1) ? true : $this->errors[] = "Problem with db";

	}

	public function update() {
		global $dbc;

		$properties_array = $this->clean_properties();
		$property_pairs = array();

		foreach ($properties_array as $key => $value) {
			$property_pairs[] = "{$key} = '{$value}'";
		}

		$sql = "UPDATE " . static::$table . " SET " . implode(", ", $properties_pairs);
		$sql .= "WHERE id = " . $this->escape_string($id);

		return (mysqli_affected_rows($dbc->connection)) ? true : false;

	}

	public function save() {
		return isset($this->id) ? $this->update() : $this->create();
	}

	public function class_db_properties() {
		$properties = array();

		foreach (static::$db_fields as $field) {
			if (property_exists($this, $field)) {
				$properties[$field] = $this->{$field};
			}
		}

		return $properties;
	}

	public function clean_properties() {
		global $dbc;
		$clean_properties = array();

		foreach ($this->class_db_properties() as $key => $value) {
			$clean_properties[$key] = $dbc->escape_string($value);
		}

		return $clean_properties;
	}
}

?>