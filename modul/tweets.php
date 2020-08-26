
          <div class="row"> 
                    <section class="col-lg-12">
                     
                         <div class="panel panel-default">   
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> Tweets </h3> 
                        </div>
                        <div class="panel-body">
<?php
// proses hapus data
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
        // baca ID dari parameter ID  yang akan dihapus
		$id = $_GET['id'];
        // proses hapus data berdasarkan ID
        $sql=$mysqli->query("DELETE FROM tweets WHERE `id`= '$id'");
		echo "<script>document.location='?page=tweets';</script>";

	 } elseif ($_GET['aksi'] == 'tambah' || $_GET['aksi'] == 'edit') {
		 $id = $_GET['id'];
		if($id==''){$button="Save";}else{$button='Update';}
		 $query="SELECT * FROM tweets WHERE `id`= '$id'";
		$result= $mysqli->query($query);
		$data=$result->fetch_assoc();
		?>

        <form action="?page=tweets&aksi=prosesSubmit" method="post" class="form-horizontal">
		 <div class="form-body">
	    <div class="form-group">
            <label for="varchar" class="col-sm-3 control-label">Id Tweet </label>
          <div class="col-sm-4"> 
		   <input type="text" class="form-control" name="id_tweet" id="id_tweet" placeholder="Id Tweet" value="<?php echo $data["id_tweet"]; ?>" />
        </div>
		</div>
	    <div class="form-group">
            <label for="varchar" class="col-sm-3 control-label">Username </label>
          <div class="col-sm-4"> 
		   <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $data["username"]; ?>" />
        </div>
		</div>
	    <div class="form-group">
            <label for="varchar" class="col-sm-3 control-label">Tweet </label>
          <div class="col-sm-4"> 
		   <input type="text" class="form-control" name="tweet" id="tweet" placeholder="Tweet" value="<?php echo $data["tweet"]; ?>" />
        </div>
		</div>
	    <div class="form-group">
            <label for="varchar" class="col-sm-3 control-label">Date Tweet </label>
          <div class="col-sm-4"> 
		   <input type="text" class="form-control" name="date_tweet" id="date_tweet" placeholder="Date Tweet" value="<?php echo $data["date_tweet"]; ?>" />
        </div>
		</div>
	   </div>
        			<div class="form-actions">
					<div class="row">
					<div class="col-md-offset-3 col-md-9">
	    <input type="hidden" name="id" value="<?php echo $data["id"]; ?>" /> 
	    <input type="hidden" name="statusTombol" value="<?php echo $button ?>" /> 
	    <button type="submit" class="btn btn-primary"><span class='glyphicon glyphicon-save'></span> <?php echo $button ?></button> 
	    <a class='btn btn-danger' onclick=self.history.back() ><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
	</div>
				</div>
              </div>
			  </form>
   
   <?php } elseif ($_GET['aksi'] == 'detail') {
	    $id = $_GET['id'];
		 	
		 $query="SELECT * FROM tweets WHERE `id`= '$id'";
		$result= $mysqli->query($query);
		$data=$result->fetch_assoc();
		?>

        <table class="table table-bordered table-striped table-condensed flip-content">
	    <tr><td>Id Tweet</td><td><?php echo $data["id_tweet"]; ?></td></tr>
	    <tr><td>Username</td><td><?php echo $data["username"]; ?></td></tr>
	    <tr><td>Tweet</td><td><?php echo $data["tweet"]; ?></td></tr>
	    <tr><td>Date Tweet</td><td><?php echo $data["date_tweet"]; ?></td></tr>
	    <tr><td></td><td><a href="?page=tweets" class="btn btn-info"><i class="fa fa-reply"></i> Kembali</a></td></tr>
	</table>
       
<?php } elseif ($_GET['aksi'] == 'prosesSubmit') {
	   
	  $id = $_POST['id'];
	  $id_tweet = $_POST['id_tweet'];
	  $username = $_POST['username'];
	  $tweet = $_POST['tweet'];
	  $date_tweet = $_POST['date_tweet'];
	switch($_POST['statusTombol']) {
	case 'Save':
			$query=$mysqli->query("INSERT INTO tweets (`id`,`id_tweet`,`username`,`tweet`,`date_tweet`) VALUES ('$id','$id_tweet','$username','$tweet','$date_tweet')");
	break;
	case 'Update':
			$query=$mysqli->query("UPDATE tweets set `id` = '$id',`id_tweet` = '$id_tweet',`username` = '$username',`tweet` = '$tweet',`date_tweet` = '$date_tweet' WHERE id='$id'");
	break;
	}
 echo "<script>document.location='?page=tweets';</script>";
    }
}else {// end aksi?>
	
						<!--	<a href="?page=tweets&aksi=tambah" class="btn btn-primary "><i class="fa fa-plus"></i> <span class="hidden-480">
								Tambah Data </span></a> -->
<br>
                           
								
							
							<table class="table table-bordered table-striped table-condensed flip-content" id="mytable">
							<thead class="flip-content">
                <tr>
                    <th width="8px">No</th>
		    <th>Username</th>
		    <th>Tweet</th>
		  <!--  <th>Tanggal</th>-->
		    <!--<th>Action</th>-->
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
			 $query="SELECT * FROM tweets order by `id` asc ";
		$result= $mysqli->query($query);
		while($tweets=$result->fetch_assoc())
		 {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $tweets["username"]; ?></td>
		    <td><?php echo $tweets["tweet"]; ?></td>
		   <!-- <td><?php echo $tweets["date_tweet"]; ?></td>
		   <!-- <td style="text-align:center" width="200px">
<a href="?page=tweets&aksi=detail&id=<?php echo $tweets["id"];?>" class="btn btn-success btn-xs purple"><i class="fa fa-search"></i> Positif</a> 
<a href="?page=tweets&aksi=edit&id=<?php echo $tweets["id"];?>" class="btn btn-danger btn-xs purple"><i class="fa fa-edit"></i> Negatif</a> 
<a href="?page=tweets&aksi=edit&id=<?php echo $tweets["id"];?>" class="btn btn-warning btn-xs purple"><i class="fa fa-edit"></i> Netral</a> 

              
		    </td>-->
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
		

      <?php }?> 
	  </div>
		</div>
      </section>
      </div> 