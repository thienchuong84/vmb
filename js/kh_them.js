$("#luu_kh").click(function(){
	//$(this).slideUp();
	fail  = validateFullname($("#hoten").val());
	fail += validateMobile1($("#sdt1").val());
	fail += validateMobile2($("#sdt2").val());

	if (fail == "") {
		//document.getElementById("f_luu_kh").submit(); 
		//$("#f_luu_kh").submit();
		//return true;
		var tmp_hoten		= $("#hoten").val();
		var tmp_sdt1		= $("#sdt1").val();
		var tmp_sdt2		= $("#sdt2").val();
		var tmp_diachi		= $("#diachi").val();
		var tmp_note_dc		= $("#note_dc").val();
		var tmp_email		= $("#email").val();
		var tmp_mota_kh		= $("#mota_kh").val();

		$.ajax({
			method: "POST",
			url: 	"ajax.php",
			data: 	{ add_hoten: tmp_hoten, add_sdt1: tmp_sdt1, add_sdt2: tmp_sdt2, add_diachi: tmp_diachi, add_note_dc: tmp_note_dc, add_email: tmp_email, add_mota_kh: tmp_mota_kh },
			success: function(result){
				//$("#f_luu_kh").submit();
				alert('success'+tmp_hoten+tmp_sdt1);
			},
			error: function(xhr){
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			},
		}).done(function(msg){
			//khi chạy ajax , khi có lỗi năm trong trang nó sẽ ko show được, vì vậy ta phải dùng .html(msg) dưới đây để show nội dung bên kia ra
			$("#show_result").html(msg);
		});
	} else {
		alert(fail);
		return false;
	}
})

function validateFullname(field) {
	if(field == "") return "Bạn chưa nhập họ tên.\n";
	return "";
}

function validateMobile1(field) {
	if(isNaN(field)) return ("SĐt 1 nhập sai.\n");
	else if (field.length < 8 || field.length > 14)
		return "SĐT1 từ 8 -> 14 số.\n"
	return "";
}

function validateMobile2(field) {
	if(field != "") {
		if(isNaN(field)) return "SDT2 nhập sai.\n";
		else if (field.length < 8 || field.length > 14)
			return "SĐT2 từ 8->14 số.\n";
	}
	return "";
}