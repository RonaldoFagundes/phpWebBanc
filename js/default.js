/* ref dropdown */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;
/* ref modal login */
var btnLogar = document.querySelector("#btn_logar");
var modalLogin = document.querySelector("#container_modal");
var btnSignin = document.querySelector("#signin");
var btnSignup = document.querySelector("#signup");
var body = document.querySelector("body");
var btnUser = document.querySelector("#btn_close_Modal");
var modal = document.querySelector("#container_modal");
var btnCad = document.querySelector("#btn_cadastrar");
var btnConfirm = document.querySelector("#btn_confirm");
/* ref modal footer */
var contFale = document.getElementById("conta_fale");
var contEmail = document.getElementById("conta_email");
var contSapp = document.getElementById("conta_whatsapp");
var contPhone = document.getElementById("conta_phone");
var logoFale = document.getElementById("conta_fale").innerHTML;
var logoEmail = document.getElementById("conta_email").innerHTML;
var logoSapp = document.getElementById("conta_whatsapp").innerHTML;
var logoPhone = document.getElementById("conta_phone").innerHTML;
/* inicio header dropdown */
for (i = 0; i < dropdown.length; i++) {
	dropdown[i].addEventListener("click", function () {
		this.classList.toggle("active");
		var dropdownContent = this.nextElementSibling;
		if (dropdownContent.style.display === "block") {
			dropdownContent.style.display = "none";
		} else {
			dropdownContent.style.display = "block";
		}
	});
}
/* fim header dropdown */
setUser = () => {
	var get_id = document.getElementById("get_id").innerHTML;
	var get_user = document.getElementById("get_user").innerHTML;
	var set_id = document.getElementById("set_id");
	var set_user = document.getElementById("set_user");
	set_id.value = get_id;
	set_user.value = get_user;
	alert(get_id + " " + get_user);
}
showPhone = (contato) => {
	if (contato == "Whatsapp") {
		contSapp.innerHTML = "21-99028-8543";
	}
	if (contato == "Telefone") {
		contPhone.innerHTML = "21-99028-8543";
	}
	if (contato == "FaleConosco") {
		contFale.innerHTML = "ronaldofagundes@gmail.com";
	}
	if (contato == "Email") {
		contEmail.innerHTML = "ronaldofagundes@gmail.com";
	}
}
HiddenPhone = (logo) => {
	if (logo == "Whatsapp") {
		contSapp.innerHTML = logoSapp;
	}
	if (logo == "Telefone") {
		contPhone.innerHTML = logoPhone;
	}
	if (logo == "FaleConosco") {
		contFale.innerHTML = logoFale;
	}
	if (logo == "Email") {
		contEmail.innerHTML = logoEmail;
	}
}
btnUser.addEventListener("click", function () {
	var user = document.getElementById("btn_close_Modal").innerText;
	var btnMov = document.getElementById("btn_mov");
	if (user.endsWith("conhecer!")) {
		alert("Bem vindo visitante conheça nossa plataforma digital ");
		modal.classList.add('close-modal');
		btnMov.classList.add('btn-movi-hidden');
	}
	else if (user.endsWith("navegar!")) {
		alert("Bem vindo cliente navegue em nossa plataforma digital ");
		modal.classList.add('close-modal');
		btnMov.classList.add('btn-movi-show');
	}
	else {
		alert(" Essa aplicação é somente para fins didáticos, ao inserir informações não use dados verdadeiros!  ");
	}
});
validar = () => {
	let userName = form_cad.name.value;
	let userEmail = form_cad.email.value;
	let userUser = form_cad.user.value;
	let userPassword = form_cad.password.value;
	if (userName === "") {
		alert(" preecha o campo nome ");
		form_cad.name.focus();
		return false;
	}
	else if (userEmail === "") {
		alert(" preecha o campo email ");
		form_cad.email.focus();
		return false;
	}
	else if (userUser === "") {
		alert(" preecha o campo user ");
		form_cad.user.focus();
		return false;
	}
	else if (userPassword === "" || userPassword === !userPassword.indexOf(8) || userPassword.length < 8) {
		alert(" preecha o campo senha com no minimo 8 caracteres !");
		form_cad.password.focus();
		return false;
	}
	else {
		alert(" usuario " + userName + " verificado com sucesso! confirme o seu cadastro! ");
		btnCad.classList.remove("btn-hidden");
		btnConfirm.classList.add('btn-hidden');
	}
}
setUserType = () => {
	var userType = document.getElementById("user_type").innerText;
	var btnMov = document.getElementById("btn_movi");
	if (userType.startsWith("Cliente")) {
		alert(userType);
		btnMov.classList.add('btn-movi-show');
	}
	else if (userType.startsWith("Visitante")) {
		alert(userType + " Abra sua conta e facilite sua vida!");
	}
}
/* inicio modal login */
btnSignin.addEventListener("click", function () {
	body.className = "sign-in-js";
});
btnSignup.addEventListener("click", function () {
	body.className = "sign-up-js";
});
/* fim modal login */
selecionarConta = () => {
	let conta = form_conta.contas.value;
	var contaSelected = document.getElementById("conta_selected");
	alert(" conta selecionada nº  " + conta);
	contaSelected.value = conta;
}
showSaldo = () => {
	var resp = document.getElementById("resp");
	var contaSelected = document.getElementById("conta_selected").value;
	resp.innerHTML = contaSelected;
}
function getPdf() {
	var dados = document.getElementById('dados').innerHTML;
	var display = window.open("", "", "width=500,height=600");
	display.document.write("<html><head>");
	display.document.write("<title>PDF</title></head>");
	display.document.write("<body style= margin-left:30%; >");
	display.document.write(dados);
	display.document.write("</body></html>");
	display.document.close();
	display.print();
}




