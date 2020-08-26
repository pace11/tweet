 <!-- right column -->
 <div class="row">
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Sentiment Analysis</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="" method="post">
              <div class="box-body">
                <div class="form-group">
                 
                  <div class="col-sm-10">
                     <textarea name="kalimat" class="form-control" placeholder="kalimat"></textarea>
                  </div>
                </div>
               
               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit"  name="submit" class="btn btn-info pull-right">Uji Sentimen</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          </div>
          

<?php
if(isset($_POST['submit'])){
	?>
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Hasil Sentiment Analysis</h3>
            </div>
            <div class="box-body">
            <?php 
	if (PHP_SAPI != 'cli') {
		echo "<pre>";
	}

	$strings = array(
		1 => $_POST['kalimat'],
	);

	require_once './autoload.php';
	$sentiment = new \PHPInsight\Sentiment();

	$i=1;
	foreach ($strings as $string) {

		// calculations:
		$scores = $sentiment->score($string);
		$class = $sentiment->categorise($string);

		// output:
		if (in_array("pos", $scores)) {
		    echo "Got positif";
		}

		echo "\n\nHasil:";
		echo "\nKalimat: <b>$string</b>\n";
		echo "Arah sentimen: <b>$class</b>, nilai: ";
		// var_dump($scores);
		foreach ($scores as $skor) {
			echo $skor;
		}
		echo "\n\n";
		$i++;
	}
	?>
    </div>
    </div>
    </div>
    <?php
}
?>
</div>