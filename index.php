<?php 
include('includes_MarkUp/HTMLheader.php');
include('includes_MarkUp/HTMLnavbar.php');
?>
<body>
   <?php 
   if (isset($_GET['register'])){
      if($_GET['register']==TRUE) {
         require_once('modules/register.php');
      }
   }
require_once('class_PHP/location.php');
require_once('includes_MarkUp/HTMLlocation.php');

?>





</body>
</html>
