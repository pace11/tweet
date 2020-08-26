
          <div class="row"> 
                    <section class="col-lg-12">
                     
                         <div class="panel panel-default">   
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> Tweet Preprocessing </h3> 
                        </div>
                        <div class="panel-body">
<?php
// proses hapus data
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
        // baca ID dari parameter ID  yang akan dihapus
		$id = $_GET['id'];
        // proses hapus data berdasarkan ID
        $sql=$mysqli->query("DELETE FROM tweet_preprocessing WHERE `Id`= '$id'");
		echo "<script>document.location='?page=tweet_preprocessing';</script>";

	 } elseif ($_GET['aksi'] == 'tambah' || $_GET['aksi'] == 'edit') {
		 $id = $_GET['id'];
		if($id==''){$button="Save";}else{$button='Update';}
		 $query="SELECT * FROM tweet_preprocessing WHERE `Id`= '$id'";
		$result= $mysqli->query($query);
		$data=$result->fetch_assoc();
		?>

        <form action="?page=tweet_preprocessing&aksi=prosesSubmit" method="post" class="form-horizontal">
		 <div class="form-body">
	    <div class="form-group">
            <label for="varchar" class="col-sm-3 control-label">Id Tweet </label>
          <div class="col-sm-4"> 
		   <input type="text" class="form-control" name="id_tweet" id="id_tweet" placeholder="Id Tweet" value="<?php echo $data["id_tweet"]; ?>" />
        </div>
		</div>
	    <div class="form-group">
            <label for="varchar" class="col-sm-3 control-label">Preprocessing </label>
          <div class="col-sm-4"> 
		   <input type="text" class="form-control" name="preprocessing" id="preprocessing" placeholder="Preprocessing" value="<?php echo $data["preprocessing"]; ?>" />
        </div>
		</div>
	   </div>
        			<div class="form-actions">
					<div class="row">
					<div class="col-md-offset-3 col-md-9">
	    <input type="hidden" name="Id" value="<?php echo $data["Id"]; ?>" /> 
	    <input type="hidden" name="statusTombol" value="<?php echo $button ?>" /> 
	    <button type="submit" class="btn btn-primary"><span class='glyphicon glyphicon-save'></span> <?php echo $button ?></button> 
	    <a class='btn btn-danger' onclick=self.history.back() ><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
	</div>
				</div>
              </div>
			  </form>
   
   <?php } elseif ($_GET['aksi'] == 'detail') {
	    $id = $_GET['id'];
		 	
		 $query="SELECT * FROM tweet_preprocessing WHERE `Id`= '$id'";
		$result= $mysqli->query($query);
		$data=$result->fetch_assoc();
		?>

        <table class="table table-bordered table-striped table-condensed flip-content">
	    <tr><td>Id Tweet</td><td><?php echo $data["id_tweet"]; ?></td></tr>
	    <tr><td>Preprocessing</td><td><?php echo $data["preprocessing"]; ?></td></tr>
	    <tr><td></td><td><a href="?page=tweet_preprocessing" class="btn btn-info"><i class="fa fa-reply"></i> Kembali</a></td></tr>
	</table>
       
<?php } elseif ($_GET['aksi'] == 'prosesSubmit') {
	   
	  $Id = $_POST['Id'];
	  $id_tweet = $_POST['id_tweet'];
	  $preprocessing = $_POST['preprocessing'];
	switch($_POST['statusTombol']) {
	case 'Save':
			$query=$mysqli->query("INSERT INTO tweet_preprocessing (`Id`,`id_tweet`,`preprocessing`) VALUES ('$Id','$id_tweet','$preprocessing')");
	break;
	case 'Update':
			$query=$mysqli->query("UPDATE tweet_preprocessing set `Id` = '$Id',`id_tweet` = '$id_tweet',`preprocessing` = '$preprocessing' WHERE Id='$Id'");
	break;
	}
 echo "<script>document.location='?page=tweet_preprocessing';</script>";
    }
}else {// end aksi?>
	
							
<br>
                           
								
							
							<table class="table table-bordered table-striped table-condensed flip-content" id="mytable">
							<thead class="flip-content">
                <tr>
                    <th width="8px">No</th>
		    <th>Preprocessing</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
			 $query="SELECT * FROM tweet_preprocessing order by `Id` asc ";
		$result= $mysqli->query($query);
		while($tweet_preprocessing=$result->fetch_assoc())
		 {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $tweet_preprocessing["preprocessing"]; ?></td>
		   
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