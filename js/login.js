function validate(form) {
	fail  = validateUsername(form.loginname.value)
	fail += validatePassword(form.password.value)

	if (fail == "") return true
	else {
		//alert(fail)
		document.getElementById("output").innerHTML = "<a style='color: red'>" + fail + "</a>"
		return false
	}
}

function validateUsername(field){
	if(field == "") return "Bạn chưa nhập user.<br>"
	else if (field.length < 5 || field.length > 12) 
		return "User từ 5 đến 12 ký tự.<br>"
	else if (/[^a-zA-Z0-9._]/.test(field))
		return "User chỉ được dùng ký tự a-z, A-Z, 0-9, dấu . và _<br>"
	return ""
}

function validatePassword(field){
	if(field == "") return "Bạn chưa nhập password.<br>"
	else if (field.length < 5 || field.length > 12)
		return "Password chỉ từ 5 đến 12 ký tự"
	return ""
}