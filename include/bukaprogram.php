
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <!-- Content Header (Page header) -->
      <section class="content-header">
      <h1>
        <?php echo $sub;?>
        <small> <?php echo $sub2;?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

<?php
if ($_GET{"page"}){
	$page=$_GET{"page"}.".php";
	include "modul/$page";
	}
else {include"home.php";
	}
	?>
    </section>
     </div>
