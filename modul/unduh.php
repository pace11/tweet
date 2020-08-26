<script>

function uploadFile() {
    // membaca data file yg akan diupload, dari komponen 'fileku'
    var formdata = new FormData();

    // proses upload via AJAX disubmit ke 'upload.php'
    // selama proses upload, akan menjalankan progressHandler()
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.open("POST", "proses_unduh.php", true);
    ajax.send(formdata);
}

function progressHandler(event){
    // hitung prosentase
    var percent = (event.loaded / event.total) * 100;
    // menampilkan prosentase ke komponen id 'progressBar'
    document.getElementById("progressBar").value = Math.round(percent);
    // menampilkan prosentase ke komponen id 'status'
    document.getElementById("status").innerHTML = Math.round(percent)+"% telah terunduh";
    // menampilkan file size yg tlh terupload dan totalnya ke komponen id 'total'
    document.getElementById("total").innerHTML = " Jumlah Terunduh "+event.total;
}

</script>
</head>
 <!-- right column -->
 <div class="row">
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Unduh Data Tweet</h3>
            </div>
			 <div class="box-body">
			 	
							<table class="table table-bordered table-striped table-condensed flip-content" id="mytablex">
							<thead class="flip-content">
                <tr>
                    <th width="8px">No</th>
		    <th>Keyword</th>
		  
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
			 $query="SELECT * FROM keyword order by `id_keyword` asc ";
		$result= $mysqli->query($query);
		while($d=$result->fetch_assoc())
		 {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $d["keyword"]; ?></td>
		    <td style="text-align:center" width="200px">
<a href="?page=proses_unduh&aksi=go&key=<?php echo $d["id_keyword"];?>&keyname=<?php echo $d["keyword"];?>" class="btn btn-success btn-xs purple" onclick="javasciprt: return confirm('Are You Sure ?')"><i class="fa fa-download"></i> Unduh</a>
              
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
            <!-- /.box-header --
<form id="upload_form" enctype="multipart/form-data">
   <input type="button" value="Mulai Unduh" class="btn btn-success" onclick="uploadFile()"><br />
   <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
   <h3 id="status"></h3>
   <p id="total"></p>
</form>-->
</div>
</div>
          </div>