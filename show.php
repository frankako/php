<?php
require_once ("resource.php");
require_once DIR_ROOT.DS."includes/header.php";

if(!empty($_GET['model']))
{
  $page = $_GET['model'];

  $directory = "fako";

  $directoryFiles = scandir($directory, 0);

  unset($directoryFiles[0]);
  unset($directoryFiles[1]);
  
  if(in_array($page.".inc.php", $directoryFiles))
  {
    include($directory."/".$page.".inc.php");

  }else{
         
        include("fako/dashboard.inc.php");
  }
  
  }else{

      include("fako/dashboard.inc.php");
  }

?>

<?php require_once(DIR_ROOT.DS."includes/footer.php"); ?>