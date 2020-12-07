<?php 

session_start();

require 'link.php';

include 'header.php';

require 'sidebar.php';

 ?>

 <div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="home.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
  <!--End-breadcrumbs-->

  <div class="container-fluid">
  	<?php 
	require 'student.php';
 	?>
  </div>

</div>

<!-- #end content -->

