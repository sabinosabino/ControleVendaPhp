//TODAS AÇÕES TOMADAS PARA CADASTRO DE CLIENTES
function ValidaClientes() {
    if (Clientes.nome.value == "" || Clientes.nome.value.length<10) {
        alert('Informe um nome válido.')
        Clientes.nome.focus();
        return false;
    }
    if (Clientes.telefone_1.value == "" || Clientes.telefone_1.value.length<15) {
        alert('Informe um telefone válido.')
        Clientes.telefone_1.focus();
        return false;
    }
    return true;

}
$('#Clientes').submit(function(e){
    e.preventDefault();
    debugger;
    if(!ValidaClientes()){
        return;
    }

    if($('#id').val().length==0){
        var id=0;
        var url="../Clientes/salvar";
    }else{
        var id=$('#id').val();
        var url="../../Clientes/salvar";
    }
    var clientes = [
        id,
        $('#nome').val().toUpperCase(),
        $('#tipo').val(),
        $('#apelido').val(),
        $('#endereco').val(),
        $('#bairro').val(),
        $('#cidade').val(),
        $('#uf').val(),
        $('#cep').val(),
        $('#telefone_1').val(),
        $('#telefone_2').val(),
        $('#email').val(),
        $('#rg').val(),
        $('#cpf_cnpj').val(),
        $('#ssplocal').val()
    ]

    SalvarClientes(clientes, url);
});
function SalvarClientes(objeto, url){
    $.ajax({
        url:url,
        method: 'POST',
        data: {
            id: objeto[0],
            nome: objeto[1],
            tipo: objeto[2],
            apelido: objeto[3],
            endereco: objeto[4],
            bairro: objeto[5],
            cidade: objeto[6],
            uf: objeto[7],
            cep: objeto[8],
            telefone_1: objeto[9],
            telefone_2: objeto[10],
            email: objeto[11],
            rg: objeto[12],
            cpf_cnpj: objeto[13],
            ssplocal: objeto[14]
        },
        datatype: 'json',
        success: function(result){
            if(result==1){
                var res='<div class="alert alert-success texte-center alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Registro salvo com sucesso!</div>'
                $('#resultado').html(res);
                debugger;
                setTimeout(LimparCampos, 3000);
                
            }else {
                var res='<div class="alert alert-danger texte-center alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Erro ao salvar registro:'+result+'!</div>'
                $('#resultado').html(res);
            }
        }
    });
}
$('#deletarClientes').submit(function(e){
    e.preventDefault();
    if($('#id').val().length==0){
        var id=0;
        var url="../Clientes/deletar";
    }else{
        var id=$('#id').val();
        var url="../../Clientes/deletar";
    }
        id

    DeletarClientes(id, url);
});
function DeletarClientes(id, url){
    debugger;
    $.ajax({
        url:url,
        method: 'POST',
        data: {
            id: id
        },
        datatype: 'json',
        success: function(result){
            if(result==1){
                var res='<div class="alert alert-success texte-center alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Registro excluírdo com sucesso!</div>'
                $('#resultado').html(res);
                setTimeout(irParaNovo('Clientes'), 3000);
            }else {
                var res='<div class="alert alert-danger texte-center alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Erro ao excluir registro:'+result+'!</div>'
                $('#resultado').html(res);
            }
        }
    });
}
function LimparCampos(){
    document.location.reload(true);
}
function irParaNovo(controlador){
    window.location.replace("../../" + controlador + "/novo");
}
function FormataClientes() {
    $(document).ready(function () {
        $('.telefone1').mask('(00) 00000-0000');
        $('.telefone2').mask('(00) 0000-0000');
        if (document.getElementById("tipo").value == "F") {
            $('.cpf_cnpj').mask('000.000.000-00');
        }
        else {
            $('.cpf_cnpj').mask('00.000.000/0000-00');
        }
        $('.Cep').mask('00.000-000');
    });
}
$('#indexClientes').submit(function(e){
    e.preventDefault();
    var text = $('#nome').val();
    indexClientes(text);
});
function indexClientes(texto){
    debugger;
        $.ajax({
            url:"../Clientes/",
            method: 'POST',
            data: {nome: texto},
            datatype: 'json',
            success: function(result){
                $('#resultado').html(result);
            }
        });
}

//TODAS AS AÇÕES DAQUI PRA BAIXO IREMOS TRATAR DE GRUPOS
$('#Grupos').submit(function(e){
    e.preventDefault();
    debugger;
    if($('#id').val().length==0){
        var id=0;
        var url="../Grupos/salvar";
    }else{
        var id=$('#id').val();
        var url="../../Grupos/salvar";
    }
    var grupos = [
        id,
        $('#nome').val().toUpperCase(),
        $('#status').val()
    ]

    SalvarGrupos(grupos, url);
});
function SalvarGrupos(objeto, url){
    $.ajax({
        url:url,
        method: 'POST',
        data: {
            id: objeto[0],
            nome: objeto[1],
            status: objeto[2]
        },
        datatype: 'json',
        success: function(result){
            if(result==1){
                var res='<div class="alert alert-success texte-center alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Registro salvo com sucesso!</div>'
                $('#resultado').html(res);
                setTimeout(LimparCampos, 3000);
                
            }else {
                var res='<div class="alert alert-danger texte-center alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Erro ao salvar registro:'+result+'!</div>'
                $('#resultado').html(res);
            }
        }
    });
}
$('#deletarGrupos').submit(function(e){
    e.preventDefault();
    if($('#ID').val().length==0){
        var id=0;
        var url="../Grupos/deletar";
    }else{
        var id=$('#ID').val();
        var url="../../Grupos/deletar";
    }
    DeletarGrupos(id, url);
});
function DeletarGrupos(id, url){
    debugger;
    $.ajax({
        url:url,
        method: 'POST',
        data: {
        ID: id
        },
        datatype: 'json',
        success: function(result){
            if(result==1){
                var res='<div class="alert alert-success texte-center alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Registro excluírdo com sucesso!</div>'
                $('#resultado').html(res);
                alert ("ADFASFDAFD");
                setTimeout(irParaNovo('Grupos'), 3000);
            }else {
                var res='<div class="alert alert-danger texte-center alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Erro ao excluir registro:'+result+'!</div>'
                $('#resultado').html(res);
            }
        }
    });
}
$('#indexGrupos').submit(function(e){
    e.preventDefault();
    debugger;
    var text = $('#nome').val();
    indexGrupos(text);
});
function indexGrupos(texto){
    debugger;
        $.ajax({
            url:"../Grupos/",
            method: 'POST',
            data: {nome: texto},
            datatype: 'json',
            success: function(result){
                $('#resultado').html(result);
            }
        });
}

//TODAS AS AÇÕES ABAIXO SÃO DE USUÁRIOS

$('#Usuarios').submit(function(e){
    e.preventDefault();
    debugger;
    if($('#id').val().length==0){
        var id=0;
        var url="../Usuarios/salvar";
    }else{
        var id=$('#id').val();
        var url="../../Usuarios/salvar";
    }
    var grupos = [
        id,
        $('#nome').val().toUpperCase(),
        $('#grupo').val(),
        $('#email').val(),
        $('#telefone_1').val(),
        $('#telefone_2').val(),
        $('#status').val()
    ]

    SalvarGrupos(grupos, url);
});
function SalvarGrupos(objeto, url){
    debugger;
    $.ajax({
        url:url,
        method: 'POST',
        data: {
            id: objeto[0],
            nome: objeto[1],
            id_grupo: objeto[2],
            email: objeto[3],
            telefone_1: objeto[4],
            telefone_2: objeto[5],
            status: objeto[6]
        },
        datatype: 'json',
        success: function(result){
            if(result==1){
                var res='<div class="alert alert-success texte-center alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Registro salvo com sucesso!</div>'
                $('#resultado').html(res);
                setTimeout(LimparCampos, 3000);
                
            }else {
                var res='<div class="alert alert-danger texte-center alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Erro ao salvar registro:'+result+'!</div>'
                $('#resultado').html(res);
            }
        }
    });
}
$('#deletarGrupos').submit(function(e){
    e.preventDefault();
    if($('#ID').val().length==0){
        var id=0;
        var url="../Grupos/deletar";
    }else{
        var id=$('#ID').val();
        var url="../../Grupos/deletar";
    }
    DeletarGrupos(id, url);
});
function DeletarGrupos(id, url){
    $.ajax({
        url:url,
        method: 'POST',
        data: {
        ID: id
        },
        datatype: 'json',
        success: function(result){
            if(result==1){
                var res='<div class="alert alert-success texte-center alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Registro excluírdo com sucesso!</div>'
                $('#resultado').html(res);
                setTimeout(irParaNovo('Grupos'), 3000);
            }else {
                var res='<div class="alert alert-danger texte-center alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Erro ao excluir registro:'+result+'!</div>'
                $('#resultado').html(res);
            }
        }
    });
}
$('#indexUsuarios').submit(function(e){
    e.preventDefault();
    var text = $('#nome').val();
    indexUsuarios(text);
});
function indexUsuarios(texto){
    debugger;
        $.ajax({
            url:"../Usuarios/",
            method: 'POST',
            data: {nome: texto},
            datatype: 'json',
            success: function(result){
                $('#resultado').html(result);
            }
        });
}
function FormataUsuarios() {
    $(document).ready(function () {
        $('.telefone1').mask('(00) 00000-0000');
        $('.telefone2').mask('(00) 0000-0000');
    });
}


$('#Alterarsenha').submit(function(e){
    e.preventDefault();
    var senhaantiga = $('#senhaantiga').val();
    var novasenha = $('#senhanova').val();
    var confirmacaosenha = $('#confirmacaosenha').val();
debugger;
    if(confirmacaosenha.length<6){
        alert("Senha deve ter pelo menos 6 dígitos.")
        return;
    }
    if(confirmacaosenha.length<6){
        alert("Confirmação de Senha deve ter pelo menos 6 dígitos.")
        return;
    }
    Alterarsenha(senhaantiga, novasenha, confirmacaosenha);
});

function Alterarsenha(senhaantiga, novasenha, confirmacaosenha){
    debugger;
    $.ajax({
        url:"../Usuarios/TrocarSenha",
        method: 'POST',
        data: {
            senhaantiga: senhaantiga,
            senhanova: novasenha,
            confirmacaosenha: confirmacaosenha
        },
        datatype: 'json',
        success: function(result){
            if(result==1){
                var res='<div class="alert alert-success texte-center alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Registro salvo com sucesso!</div>'
                $('#resultado').html(res);
                window.location.href = "../Menu/";
            }else {
                var res='<div class="alert alert-danger texte-center alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Erro ao execultar operação:'+result+'!</div>'
                $('#resultado').html(res);
            }
        }
    });
}
