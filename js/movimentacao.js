

selecionarConta = () => {
	let conta = form_conta.contaN.value;
	alert(" conta nº  " + conta);
	document.forms['form_conta'].submit();
}



let modal_trans = document.getElementById('movi_modal_transacao');

pagar = () => {
	modal_trans.classList.add('movi-modal-transacao-show');
	document.querySelector("[name='tran_tipo']").value = "Pagamento";
}

pix = () => {
	modal_trans.classList.add('movi-modal-transacao-show');
	document.querySelector("[name='tran_tipo']").value = "Pix";
}

transferir = () => {
	modal_trans.classList.add('movi-modal-transacao-show');
	document.querySelector("[name='tran_tipo']").value = "Transferência";
}

investir = () => {
	modal_trans.classList.add('movi-modal-transacao-show');
	document.querySelector("[name='tran_tipo']").value = "Investimentos";
}


lancar = () => {
	let tran_tipo = form_transacao.tran_tipo.value;
	var btn_lancar = document.getElementById("btn-lancar");
	var btn_lancar_db = document.getElementById("btn_lancar_db");
	var btn_close_modal_tr = document.getElementById("btn_close_modal_tr");

	let valor = form_transacao.tr_valor.value;
	valor = valor.replace(",", ".");
	valor = parseFloat(valor);

	let saldo = form_transacao.tr_saldo.value;
	saldo = saldo.replace("saldo R$ ", "");
	saldo = saldo.replace(",", ".");
	saldo = parseFloat(saldo);
	saldo = saldo * 1000;


	let tipoTr = form_transacao.tran_tipo.value;


	if (tipoTr === "Transferência") {
		saldo = saldo / 1000;

		saldo = saldo + valor;
		alert("Transação " + tipoTr + " credito novo saldo " + saldo.toLocaleString('pt-BR'));

		btn_lancar_db.value = tran_tipo;
		btn_lancar_db.name = "Transacao";
		btn_lancar.value = " ";


	} else {

		if (saldo >= valor) {


			saldo = saldo - valor;
			alert("Transação " + tipoTr + " credito novo saldo " + saldo.toLocaleString('pt-BR'));
			btn_lancar_db.value = tran_tipo;
			btn_lancar_db.name = "Transacao";
			btn_lancar.value = " ";
		} else {
			alert(" saldo  " + saldo + " valor " + valor + " não possivel ");
			btn_lancar_db.value = " indisponivel ";
			btn_close_modal_tr.value = " Fechar ";
			return false;
		}

	}

}


closeModalTran = () => {
	modal_trans.classList.add('movi-modal-transacao-hidden');
}
