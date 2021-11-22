function openForm() {
    $("ModalSelecaoGrupo").modal();
}

function adicionarGrupo(row) {
    var id = document.getElementById("tableGrupos").rows.namedItem(row).cells[1].innerHTML;
    var nome = document.getElementById("tableGrupos").rows.namedItem(row).cells[2].innerHTML;
    document.getElementById("idGrupo").value = id;
    document.getElementById("Grupo").value = nome;
    fecharModal();
}

function fecharModal() {
    $("#ModalSelecaoGrupo").modal('hide');
}

function mascaras() {
    $(document).ready(function () {
        $("#Telefone1").inputmask("(99)99999-9999");
    });
}

function ValidarCamposUsuarios() {
    var nome = usuarios.Nome;
    var email = usuarios.email
    var telefone = usuarios.Telefone1;
    var login = usuarios.Login
    var grupo = usuarios.Grupo;
    if (nome.value == "") {
        document.getElementById("Alerta").removeAttribute("hidden");
        document.getElementById("NomeCampo").innerHTML = "Nome";
        nome.focus();
        return false;
    } else {
        document.getElementById("Alerta").setAttribute("hidden", "hidden");
    }

    if (email.value == "") {
        document.getElementById("Alerta").removeAttribute("hidden");
        document.getElementById("NomeCampo").innerHTML = "Email";
        email.focus();
        return false;
    }
    else {
        document.getElementById("Alerta").setAttribute("hidden", "hidden");
    }

    if (telefone.value == "" || telefone.value.length < 15) {
        document.getElementById("Alerta").removeAttribute("hidden");
        document.getElementById("NomeCampo").innerHTML = "Telefone 1";
        telefone.focus();
        return false;
    } else {
        document.getElementById("Alerta").setAttribute("hidden", "hidden");
    }

    if (login.value == "") {
        document.getElementById("Alerta").removeAttribute("hidden");
        document.getElementById("NomeCampo").innerHTML = "Login do Usu" + "&aacute" + "rio";
        login.focus();
        return false;
    } else {
        document.getElementById("Alerta").setAttribute("hidden", "hidden");
    }

    if (grupo.value == "") {
        document.getElementById("Alerta").removeAttribute("hidden");
        document.getElementById("NomeCampo").innerHTML = "Grupo";
        grupo.focus();
        return false;
    } else {
        document.getElementById("Alerta").setAttribute("hidden", "hidden");
    }

    return true;
}

function ValidarCamposGrupos() {
    var nome = Grupos.Nome;
    if (nome.value == "") {
        document.getElementById("Alerta").removeAttribute("hidden");
        document.getElementById("NomeCampo").innerHTML = "Nome";
        nome.focus();
        return false;
    } else {
        document.getElementById("Alerta").setAttribute("hidden", "hidden");
    }

    return true;
}

function ValidarCamposClientes() {
    var nome = Clientes.Nome;
    var telefone = Clientes.Telefone_1;
    if (nome.value == "") {
        document.getElementById("Alerta").removeAttribute("hidden");
        document.getElementById("NomeCampo").innerHTML = "Nome";
        nome.focus();
        return false;
    } else {
        document.getElementById("Alerta").setAttribute("hidden", "hidden");
    }

    if (telefone.value == "" || telefone.length < 15) {
        document.getElementById("Alerta").removeAttribute("hidden");
        document.getElementById("NomeCampo").innerHTML = "Telefone 1";
        nome.focus();
        return false;
    } else {
        document.getElementById("Alerta").setAttribute("hidden", "hidden");
    }
    return true;
}
function ValidarCamposVendas() {
    var data = Vendas.data_venda;
    var cliente = Vendas.Cliente;
    var valorvenda = Vendas.valor_venda;
    var detalhesvenda = Vendas.Detalhes_Venda;

    if (data.value instanceof Date && !isNaN(data.value)) {
        document.getElementById("Alerta").removeAttribute("hidden");
        document.getElementById("NomeCampo").innerHTML = "Data";
        data.focus();
        return false;
    } else {
        document.getElementById("Alerta").setAttribute("hidden", "hidden");
    }

    if (cliente.value == 0) {
        document.getElementById("Alerta").removeAttribute("hidden");
        document.getElementById("NomeCampo").innerHTML = "Cliente";
        cliente.focus();
        return false;

    } else {
        document.getElementById("Alerta").setAttribute("hidden", "hidden");
    }

    if (valorvenda.value == "" || valorvenda.value == "0,00") {
        document.getElementById("Alerta").removeAttribute("hidden");
        document.getElementById("NomeCampo").innerHTML = "Valor Venda";
        valorvenda.focus();

        return false;
    } else {
        document.getElementById("Alerta").setAttribute("hidden", "hidden");
    }

    if (detalhesvenda.value.length <10) {
        document.getElementById("Alerta").removeAttribute("hidden");
        document.getElementById("NomeCampo").innerHTML = "Detalhes Venda";
        detalhesvenda.focus();

        return false;
    } else {
        document.getElementById("Alerta").setAttribute("hidden", "hidden");
    }

    return true;
}


function FormatarVendas() {
    $(document).ready(function (){
        $('.moeda').mask("###0,00", {reverse: true});
    });
}

function ValidaVendas() {
    var idCliente = Vendas.idCliente;
    var valor_venda = Vendas.valor_venda;
    var detalhe_venda = Vendas.detalhe_venda;
    if (idCliente.innerHTML == "Selecionar" || idCliente.value==0) {
        //document.getElementById("Alerta").removeAttribute("hidden");
        //document.getElementById("NomeCampo").innerHTML = "Nome";
        idCliente.focus();
        return false;
    } else {
        //document.getElementById("Alerta").setAttribute("hidden", "hidden");
    }
    
    if (valor_venda.value == "Selecionar" || valor_venda.value==0) {
        //document.getElementById("Alerta").removeAttribute("hidden");
        //document.getElementById("NomeCampo").innerHTML = "Nome";
        valor_venda.focus();
        return false;
    } else {
        //document.getElementById("Alerta").setAttribute("hidden", "hidden");
    }
    if (detalhe_venda.value == "" || detalhe_venda.value.length<10) {
        //document.getElementById("Alerta").removeAttribute("hidden");
        //document.getElementById("NomeCampo").innerHTML = "Nome";
        detalhe_venda.focus();
        return false;
    } else {
        //document.getElementById("Alerta").setAttribute("hidden", "hidden");
    }
    return true;
}

function dataAtualFormatada() {
    var data = new Date(),
        dia = data.getDate().toString().padStart(2, '0'),
        mes = (data.getMonth() + 1).toString().padStart(2, '0'), //+1 pois no getMonth Janeiro come�a com zero.
        ano = data.getFullYear();
        document.getElementById("data_venda").value= dia + "/" + mes + "/" + ano;
}

function valorInicial() {
    document.getElementById("valor_venda").value = "0,00";
}

$('#indexVendas').submit(function(e){
    e.preventDefault();
    var text = $('#nome').val();
    indexVenda(text);
});

function indexVenda(texto){
        $.ajax({
            url:"../Vendas/",
            method: 'POST',
            data: {nome: texto},
            datatype: 'json',
            success: function(result){
                $('#resultado').html(result);
            }
        });
}

$('#indexPagamentos').submit(function(e){
    e.preventDefault();
    var text = $('#nome').val();
    indexPagamentos(text);
});

function indexPagamentos(texto){
        $.ajax({
            url:"../Pagamentos/",
            method: 'POST',
            data: {nome: texto},
            datatype: 'json',
            success: function(result){
                $('#resultado').html(result);
            }
        });
}


$('#indexLogin').submit(function(e){
    e.preventDefault();
    var login = $('#login').val();
    var senha = $('#senha').val();
    var lembrarme = $('#LembrarMe').val();
    indexLogin(login, senha, lembrarme);
});

function indexLogin(login, senha, lembrarme){
        $.ajax({
            url:"../Login/Logar",
            method: 'POST',
            data: {login: login, senha:senha, LembrarMe:lembrarme},
            datatype: 'json',
            success: function(result){
                
               if(result=="1"){
                    window.location.href = "../Menu/";
               }else if(result=="2"){
                alert("Altere sua senha...")
                window.location.href = "../Usuarios/alterarsenha";
               }else{
                   var html='  <div class="alert alert-danger alert-dismissible fade in">'+
                   '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                   '<strong>Atenção!</strong> '+ result + '.</div>'
                   $('#resultado').html(html);
               }
            }
        });
}