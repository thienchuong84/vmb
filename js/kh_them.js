$("#luu_kh").click(function(){
	//$(this).slideUp();
	fail  = validateFullname($("#hoten").val());
	fail += validateMobile1($("#sdt1").val());
	fail += validateMobile2($("#sdt2").val());

	if (fail == "") {
		//document.getElementById("f_luu_kh").submit(); 
		//$("#f_luu_kh").submit();
		//return true;
		var tmp_hoten			= $("#hoten").val();
		var tmp_sdt1			= $("#sdt1").val();
		var tmp_sdt2			= $("#sdt2").val();
		var tmp_diachi			= $("#diachi").val();
		var tmp_note_dc			= $("#note_dc").val();
		var tmp_email			= $("#email").val();
		var tmp_mota_kh			= $("#mota_kh").val();
		var tmp_sel_trangthai	= $("#sel_trangthai").val();	// refer: https://learn.jquery.com/using-jquery-core/faq/how-do-i-get-the-text-value-of-a-selected-option/
		var tmp_sel_calltype	= $("#sel_calltype").val();
		var tmp_txt_call_detail	= $("#txt_call_detail").val();
		var tmp_txt_call_detail	= tmp_txt_call_detail.trim();	// refer: http://www.w3schools.com/jsref/jsref_trim_string.asp

		$.ajax({
			method: "POST",
			url: 	"ajax.php",
			data: 	{ add_hoten: tmp_hoten, add_sdt1: tmp_sdt1, add_sdt2: tmp_sdt2, add_diachi: tmp_diachi, 
				add_note_dc: tmp_note_dc, add_email: tmp_email, add_mota_kh: tmp_mota_kh, 
				add_sel_trangthai: tmp_sel_trangthai, add_sel_calltype: tmp_sel_calltype, add_txt_call_detail: tmp_txt_call_detail },
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
			//window.location='kh.php';
		});

		// reset form luu kh
		$("#f_luu_kh").get(0).reset()	// or: $("#f_luu_kh")[0].reset()  , refer: http://forwebonly.com/how-to-reset-an-html-form-with-jquery/
	} else {
		alert(fail);
		return false;
	}
})

function validateFullname(field) {
	//field = $.trim(field); 	// cú pháp bỏ khoảng trống 2 bên. nếu user đánh khoảng trống thì ko được cho lưu https://css-tricks.com/snippets/javascript/strip-whitespace-from-string/
	field = field.trim();
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

