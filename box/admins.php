<?php

class Admins extends BaseObject {

	protected static $table = "users";
	public static $db_fields = array('name', 'address', 'tel', 'image', 'email', 'password', 'creation');
	public $admin_id;
	public $name;
	public $address;
	public $tel;
	public $image;
	public $email;
	public $password;
	public $creation;

	protected $filename;
	protected $temp_path;
	protected $upload_directory = "uploads";
	protected $upload_errors_array = array();
	public $errors = array();
	protected $fileErrors;

	public static function get_all_admins() {
		return parent::find_record("SELECT * FROM users");
	}

	public static function get_admin_by_id($id) {
		global $dbc;

		$user_id = $dbc->escape_string($id);
		$result = parent::find_record("SELECT * FROM users WHERE id = '$user_id'");

		if (!empty($result)) {
			$first_item = array_unshift($result);
		}

		return $first_item;

	}

	public function setFile($file) {

		$this->filename = $file['name'];
		$this->tmp_path = $file['tmp_name'];
		$this->fileErrors = $file['error'];

		$thefile = explode(".", $this->filename);
		$extension = end($thefile);

		if (!preg_match('/^(JPG|BMP|JPEG|PNG|GIF|TIF)$/', strtoupper($extension))) {
			return $this->errors[] = "Invalid file extension";
		}

		if (!$file && !is_array($file)) {
			return $this->errors[] = "Invalid file uploaded";
		} else if ($this->fileErrors != 0) {
			return $this->errors[] = upload_error_array($this->fileErrors);
		} else {

			$target_path = DIR_ROOT . DS . $this->upload_directory . DS . $this->filename;

			if (file_exists($target_path)) {
				return $this->errors[] = "This {$this->filename} already exists";
			}

			if (!move_uploaded_file($this->tmp_path, $target_path)) {
				return $this->errors[] = "uploaded file was not saved";
			}

		}

	}

}

?>