<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tweet</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">

      
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-green sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="./" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      SENTIMEN ANALISIS
      <span class="logo-mini"><b>SYS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         <li><a href="#"><b>SENTIMEN ANALISIS TERHADAP ANIES BASWEDAN</b> <b><?php echo strtoupper($_SESSION["ses_level"]);?></b></a>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/admin2.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["namalengkap"];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
       
        <li <?php if($_GET["page"]==""){?>class="active"<?php }?>>
        	<a href="./"><i class="fa fa-dashboard"></i> <span>Home</span></a>
       </li>
        	
        <li <?php if($_GET["page"]=="unduh"){?>class="active"<?php }?>>
          <a href="?page=unduh"><i class="fa fa-download"></i> <span>Unduh tweet</span></a>
        </li>
       
         <!-- <li class="treeview <?php if($_GET["page"]=="datalatih_positif" || $_GET["page"]=="datalatih_negatif" || $_GET["page"]=="datalatih_netral"){?>active<?php }?>">
          <a href="#">
            <i class="fa fa-table"></i> <span>Data Latih</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($_GET["page"]=="datalatih_positif"){?>class="active"<?php }?>><a href="?page=datalatih_positif"><i class="fa fa-circle-o"></i> Positif</a></li>
            <li <?php if($_GET["page"]=="datalatih_negatif"){?>class="active"<?php }?>><a href="?page=datalatih_negatif"><i class="fa fa-circle-o"></i> Negatif</a></li>
            <li <?php if($_GET["page"]=="datalatih_netral"){?>class="active"<?php }?>><a href="?page=datalatih_netral"><i class="fa fa-circle-o"></i> Netral</a></li>
          </ul>
        </li> -->
        
         </li>
        <li <?php if($_GET["page"]=="tweets"){?>class="active"<?php }?>>
        	<a href="?page=tweets"><i class="fa fa-twitter"></i> <span>Data Uji</span></a>
        </li>
        
        <li <?php if($_GET["page"]=="form_uji"){?>class="active"<?php }?>>
        	<a href="?page=form_uji"><i class="fa fa-edit"></i> <span> Form Uji</span></a>
        </li>
         <li <?php if($_GET["page"]=="daftar_uji"){?>class="active"<?php }?>>
        	<a href="?page=daftar_uji"><i class="fa fa-database"></i> <span>Proses Uji</span></a>
        </li>
		 <li <?php if($_GET["page"]=="hasil_uji"){?>class="active"<?php }?>>
        	<a href="?page=hasil_uji"><i class="fa fa-database"></i> <span>Hasil Uji</span></a>
        </li>
        <!--
          </li>
        	<li <?php if($_GET["page"]=="tweet_preprocessing"){?>class="active"<?php }?>>
        	<a href="?page=tweet_preprocessing"><i class="fa fa-gears text-red"></i> <span>Daftar Preprocessing</span></a>
        </li>
      
         <li <?php if($_GET["page"]=="proses"){?>class="active"<?php }?>>
        	<a href="?page=proses"><i class="fa fa-gears text-red"></i> <span>Preprocessing</span></a>
        </li>
        
         <li <?php if($_GET["page"]=="proses"){?>class="active"<?php }?>>
        	<a href="?page=proses"><i class="fa fa-gears text-red"></i> <span>Analisis</span></a>
        </li>
        
         <li <?php if($_GET["page"]=="proses"){?>class="active"<?php }?>>
        	<a href="?page=proses"><i class="fa fa-gears text-red"></i> <span>Tweet Training</span></a>
        </li>
      -->
           <li <?php if($_GET["page"]=="tb_katadasar"){?>class="active"<?php }?>>
        	<a href="?page=tb_katadasar"><i class="fa fa-gears"></i> <span>Kata Dasar</span></a>
        </li>
        
           <li <?php if($_GET["page"]=="stopwords"){?>class="active"<?php }?>>
        	<a href="?page=stopwords"><i class="fa fa-gears"></i> <span>Stopwords</span></a>
        </li>
        -->
        
        <li>
        	<a href="logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a>
        </li>
 
       
     
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->
