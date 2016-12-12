<?php 
        include('includes_MarkUp/HTMLheader.php');
        include('includes_MarkUp/HTMLnavbar.php');
?>
<body>
 <?php 
    if (isset($_GET['register'])){
        if($_GET['register']==TRUE) {
            include('modules/register.php');
        }
    }
  ?>
</body>
</html>