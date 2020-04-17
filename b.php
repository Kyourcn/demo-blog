<?php
include './php/main.php';
include './php/temp/head.php';
?>
<body class="user-select">
<?php include './php/temp/header.php'; ?>
<section class="container">
<?php
@$f = $_GET["n"];
@$e = $_GET["e"];
if(isset($f)) { 
       $path="/php/view/".$f.".php";
      // echo $path;
       if(is_file($path)){
           $path="/php/view/404.php";
       }
       include ".".$path; //require_once
}else if(isset($e)){
    //include './php/temp/test.php';
    echo $_SESSION["test_echo"];
}
?>
</section>
<?php include './php/temp/footer.php'; ?>
<?php include './php/temp/modal.php'; ?>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>