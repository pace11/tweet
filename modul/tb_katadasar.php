
          <div class="row"> 
                    <section class="col-lg-12">
                     
                         <div class="panel panel-default">   
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> Tb Katadasar </h3> 
                        </div>
                        <div class="panel-body">
<?php
// proses hapus data
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
        // baca ID dari parameter ID  yang akan dihapus
		$id = $_GET['id'];
        // proses hapus data berdasarkan ID
        $sql=$mysqli->query("DELETE FROM tb_katadasar WHERE `id_ktdasar`= '$id'");
		echo "<script>document.location='?page=tb_katadasar';</script>";

	 } elseif ($_GET['aksi'] == 'tambah' || $_GET['aksi'] == 'edit') {
		 $id = $_GET['id'];
		if($id==''){$button="Save";}else{$button='Update';}
		 $query="SELECT * FROM tb_katadasar WHERE `id_ktdasar`= '$id'";
		$result= $mysqli->query($query);
		$data=$result->fetch_assoc();
		?>

        <form action="?page=tb_katadasar&aksi=prosesSubmit" method="post" class="form-horizontal">
		 <div class="form-body">
	    <div class="form-group">
            <label for="varchar" class="col-sm-3 control-label">Katadasar </label>
          <div class="col-sm-4"> 
		   <input type="text" class="form-control" name="katadasar" id="katadasar" placeholder="Katadasar" value="<?php echo $data["katadasar"]; ?>" />
        </div>
		</div>
	    <div class="form-group">
            <label for="varchar" class="col-sm-3 control-label">Tipe Katadasar </label>
          <div class="col-sm-4"> 
		   <input type="text" class="form-control" name="tipe_katadasar" id="tipe_katadasar" placeholder="Tipe Katadasar" value="<?php echo $data["tipe_katadasar"]; ?>" />
        </div>
		</div>
	   </div>
        			<div class="form-actions">
					<div class="row">
					<div class="col-md-offset-3 col-md-9">
	    <input type="hidden" name="id_ktdasar" value="<?php echo $data["id_ktdasar"]; ?>" /> 
	    <input type="hidden" name="statusTombol" value="<?php echo $button ?>" /> 
	    <button type="submit" class="btn btn-primary"><span class='glyphicon glyphicon-save'></span> <?php echo $button ?></button> 
	    <a class='btn btn-danger' onclick=self.history.back() ><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
	</div>
				</div>
              </div>
			  </form>
   
   <?php } elseif ($_GET['aksi'] == 'detail') {
	    $id = $_GET['id'];
		 	
		 $query="SELECT * FROM tb_katadasar WHERE `id_ktdasar`= '$id'";
		$result= $mysqli->query($query);
		$data=$result->fetch_assoc();
		?>

        <table class="table table-bordered table-striped table-condensed flip-content">
	    <tr><td>Katadasar</td><td><?php echo $data["katadasar"]; ?></td></tr>
	    <tr><td>Tipe Katadasar</td><td><?php echo $data["tipe_katadasar"]; ?></td></tr>
	    <tr><td></td><td><a href="?page=tb_katadasar" class="btn btn-info"><i class="fa fa-reply"></i> Kembali</a></td></tr>
	</table>
       
<?php } elseif ($_GET['aksi'] == 'prosesSubmit') {
	   
	  $id_ktdasar = $_POST['id_ktdasar'];
	  $katadasar = $_POST['katadasar'];
	  $tipe_katadasar = $_POST['tipe_katadasar'];
	switch($_POST['statusTombol']) {
	case 'Save':
			$query=$mysqli->query("INSERT INTO tb_katadasar (`id_ktdasar`,`katadasar`,`tipe_katadasar`) VALUES ('$id_ktdasar','$katadasar','$tipe_katadasar')");
	break;
	case 'Update':
			$query=$mysqli->query("UPDATE tb_katadasar set `id_ktdasar` = '$id_ktdasar',`katadasar` = '$katadasar',`tipe_katadasar` = '$tipe_katadasar' WHERE id_ktdasar='$id_ktdasar'");
	break;
	}
 echo "<script>document.location='?page=tb_katadasar';</script>";
    }
}else {// end aksi?>
	
							<a href="?page=tb_katadasar&aksi=tambah" class="btn btn-primary "><i class="fa fa-plus"></i> <span class="hidden-480">
								Tambah Data </span></a> 
<br>
                           
								
							
							<table class="table table-bordered table-striped table-condensed flip-content" id="mytable">
							<thead class="flip-content">
                <tr>
                    <th width="8px">No</th>
		    <th>Katadasar</th>
		    <th>Tipe Katadasar</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
			 $query="SELECT * FROM tb_katadasar order by `id_ktdasar` asc ";
		$result= $mysqli->query($query);
		while($tb_katadasar=$result->fetch_assoc())
		 {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $tb_katadasar["katadasar"]; ?></td>
		    <td><?php echo $tb_katadasar["tipe_katadasar"]; ?></td>
		    <td style="text-align:center" width="200px">
<a href="?page=tb_katadasar&aksi=detail&id=<?php echo $tb_katadasar["id_ktdasar"];?>" class="btn btn-primary btn-xs purple"><i class="fa fa-search"></i> Detail</a> 
<a href="?page=tb_katadasar&aksi=edit&id=<?php echo $tb_katadasar["id_ktdasar"];?>" class="btn btn-warning btn-xs purple"><i class="fa fa-edit"></i> Edit</a> 
<a href="?page=tb_katadasar&aksi=hapus&id=<?php echo $tb_katadasar["id_ktdasar"];?>" class="btn btn-danger btn-xs purple" onclick="javasciprt: return confirm('Are You Sure ?')"><i class="fa fa-trash-o"></i> Delete</a>
              
		    </td>
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