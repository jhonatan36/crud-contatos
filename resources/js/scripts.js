import $ from "jquery";

$(document).ready(function () {
    $("#cep").on("input", function () {
        let cep = $(this).val();
        if (cep.length === 8) {
            $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function (data) {
                if (!data.erro) {
                    $("#logradouro").val(data.logradouro);
                    $("#bairro").val(data.bairro);
                    $("#localidade").val(data.localidade);
                    $("#estado").val(data.uf);
                } else {
                    $("#logradouro").val("");
                    $("#bairro").val("");
                    $("#localidade").val("");
                    $("#estado").val("");
                    console.log("CEP inválido ou não encontrado.");
                }
            });
        }
    });
});
