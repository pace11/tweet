  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.1
    </div>
    <strong>Copyright &copy; 2020 <a href="">SENTIMEN ANALISIS TERHADAP ANIES BASWEDAN</a>.</strong> All rights
    reserved.
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- DataTables -->
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script>
$('.date-picker').datepicker({

	timepicker:false,
	format:'yyyy-mm-dd',
	autoclose: true
});

  $(function () {
    $('#mytable').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script type="text/javascript">
		$(document).ready(function(){
			$('#angka1').maskMoney();
			$('#angka2').maskMoney({prefix:'US$'});
			$('#type2').maskMoney({prefix:'', thousands:'.', decimal:',', precision:0});
			$('#result').maskMoney({prefix:'', thousands:'.', decimal:',', precision:0});
			$('#angka4').maskMoney();
		});
</script>
<script>
	function kalkulatorTambah(type1,type2){
	var res = type2.replace(".", "");
	var hasil = eval(res) - eval(type1);
	document.getElementById('result').value = hasil;
		if (isNaN(hasil)) 
			return 0;
		else
			return hasil;
		}
</script>
</body>
</html>