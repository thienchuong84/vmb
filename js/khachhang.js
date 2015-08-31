$("#saveKH").submit(function(event){
	fail  = validateFullname($("#fullname").val())

	if (fail == "")
		return true
	else {
		alert(fail)
		return false
	}
})

function validateFullname(field){
	if(field == "") return "Bạn chưa nhập tên khách hàng."
	return ""
}