<?php 


function __autoload($class){

	$class = strtolower($class);

	$path = "{$class}.php";

   if(is_file($path) && !class_exists($class))
   {
   	  require_once($path);

   }else{
      die("The file {$class}.php was not found");
   }

}

//spl_autoload_register('autoloader');

// fields validation
function required_fields($fields)
{
    $form_errors();

    foreach($fields as $name_of_field)
    {

    if(!isset($_POST[$name_of_field]) || $_POST[$fields] == null)
    {
      $form_errors[] = $name_of_field." is required";
    }

   }
  
  return $form_errors;
}

function required_min_field_length($fields)
{
    $form_errors();

    foreach($fields as $name_of_field => $min_length)
    {

    if(strlen(trim($_POST[$name_of_field])) < $min_length) 
    {
      $form_errors[] = $name_of_field." has a minimum field length of ".$min_length;
    }

   }
  
  return $form_errors;
}


function required_max_field_length($fields)
{
    $form_errors();

    foreach($fields as $name_of_field => $max_length)
    {

    if(strlen(trim($_POST[$name_of_field])) > $max_length)
    {
      $form_errors[] = $name_of_field." has a maximum field length of ".$max_length;
    }

    }
  
  return $form_errors;
}

function validateEmail($data)
{
	$form_errors = array();
    $key = "email";

    if(key_exists($key, $data) && $_POST[$key] !== null)
    {
    	$key = filter_var($_POST[$key], FILTER_SANITIZE_EMAIL);

    	if(filter_var($key, FILTER_VALIDATE_EMAIL) === false)
    	{
    		$form_error[] = $key." is not a valid email";
    	}
    }

    return $form_errors;
}

function checkErrors($form_errors)
{
	
   $errors = "<p>There <?php if(count($form_errors) > 1 ){ ?> are ".count($form_errors)." errors <?php }else { is ".count($form_errors) ."error; } ?> on the form";
   $errors .= "<ul>";

   foreach($form_errors as $the_error)
   {
   	  $errors .= "<li>{$the_error}</li>";
   }

   $errors .="</ul></p>";

   return $errors;
}



 ?>