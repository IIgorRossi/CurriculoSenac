$(document).ready( function () {
    $('#tabela').DataTable();
} );

function somenteNumeros(valor) {
    return valor.replace(/\D/g, '');
}

function aplicarMascara(campo, formatador) {
    document.querySelectorAll(campo).forEach(function (input) {
        input.addEventListener('input', function () {
            input.value = formatador(input.value);
        });
        input.value = formatador(input.value);
    });
}

aplicarMascara('.mascara-cpf', function (valor) {
    valor = somenteNumeros(valor).slice(0, 11);
    return valor
        .replace(/(\d{3})(\d)/, '$1.$2')
        .replace(/(\d{3})(\d)/, '$1.$2')
        .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
});

aplicarMascara('.mascara-cnpj', function (valor) {
    valor = somenteNumeros(valor).slice(0, 14);
    return valor
        .replace(/(\d{2})(\d)/, '$1.$2')
        .replace(/(\d{3})(\d)/, '$1.$2')
        .replace(/(\d{3})(\d)/, '$1/$2')
        .replace(/(\d{4})(\d{1,2})$/, '$1-$2');
});

aplicarMascara('.mascara-telefone', function (valor) {
    valor = somenteNumeros(valor).slice(0, 11);
    if (valor.length <= 10) {
        return valor.replace(/(\d{2})(\d)/, '($1) $2').replace(/(\d{4})(\d)/, '$1-$2');
    }
    return valor.replace(/(\d{2})(\d)/, '($1) $2').replace(/(\d{5})(\d)/, '$1-$2');
});

aplicarMascara('.mascara-preco', function (valor) {
    valor = somenteNumeros(valor);
    if (!valor) {
        return '';
    }
    valor = (parseInt(valor, 10) / 100).toFixed(2).replace('.', ',');
    return 'R$ ' + valor.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
});
