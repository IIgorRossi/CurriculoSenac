var num1;
var num2;
var total;

function converter(){
    num1 = parseInt(num1)
    num2 = parseInt(num2)
}

function entrada(){
 num1 = document.getElementById("n1").value;
 num2 = document.getElementById("n2").value;
 total = document.getElementById("resultado");
 converter()
}

function somar(){
    entrada()
    total.innerHTML =  num1 + num2
}

function subtrair(){
    entrada()
    total.innerHTML =  num1 - num2
}

function multiplicar(){
    entrada()
    total.innerHTML =  num1 * num2
}

function dividir(){
    entrada()
    total.innerHTML =  num1 / num2
}

function limpar(){
    var num1 = document.getElementById("n1").value = '';
    var num2 = document.getElementById("n2").value = '';      
    total.innerHTML = '';
}