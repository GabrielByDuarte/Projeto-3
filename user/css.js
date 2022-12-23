var hoje = new Date();

dia = hoje.getDate(); 
mes = hoje.getMonth();
ano = hoje.getFullYear()

    hoje = hoje.getDate(); 
    mes++;
if (mes == 1){
    mes = "Janeiro";
}else if (mes == 2){
    mes = "Fevereiro";
}else if (mes == 3){
    mes = "Março";
}else if (mes == 4){
    mes = "Abril";
}else if (mes == 5){
    mes = "Maio";
}else if (mes == 6){
    mes = "Junho";
}else if (mes == 7){
    mes = "Julho";
}else if (mes == 8){
    mes = "Agosto";
}else if (mes == 9){
    mes = "Setembro";
}else if (mes == 10){
    mes = "Outubro";
}else if (mes == 11){
    mes = "Novembro";
}else if (mes == 12){
    mes = "Dezembro";
}

data = dia+' de '+mes+' de '+ano;

document.oncontextmenu= function(){return false;}
document.onkeydown=function(e){

var e = e || event;

var k = e.keyCode || e.which;

 
if (k==83 || k==65  || k==67  || k==73 || k==123 || k==17 || k==85  ) { return false }

}