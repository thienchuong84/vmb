

------- form với input hidden dùng trong table khi load data có nut button để click xóa
<!--<form role="form" action="javascript:alert( 'success!' );" method="post" onsubmit="return xoa_kh(this)">-->
<form role="form" action="#" method="post" onsubmit="return xoa_kh(this)">
	<input type="text" class="hidden" name="deleted" value="yes">
	<input type="text" class="hidden" name="khachhang" value="$last_id">
	<button type="submit" class="btn btn-default">Xóa $last_id</button>
</form>

		<script type="text/javascript">
			// xóa khách hàng
			// refer: http://api.jquery.com/jquery.post/
			function xoa_kh(form) {
			  id_kh = form.khachhang.value;
			  $.post( "ajax.php", { deleted: "yes", khachhang: id_kh })
			    .done(function( data ) {
			      //alert( "Data Loaded: " + data );
			      $("#show_result").html(data);
			      //event.preventDefault();		//prevent submit, refer: https://api.jquery.com/submit/ 
			    });
			}
		</script>

		--- hàm xử lý bên trang ajax.php
		<?php
		if(isset($_POST['deleted']) and isset($_POST['khachhang'])) {
			echo "khach hang:".$_POST['khachhang'];
		}
		?>


