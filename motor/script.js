// Tratando eventos de side bar
document.querySelector(".motor").classList.toggle("active");

// Tratando eventos do led
let img_trasnferir_para_rede = document.querySelector("#img_trasnferir_para_rede");
let led_trasnferir_para_rede = document.querySelector(".led_trasnferir_para_rede");
let led_transferir_para_gerador = document.querySelector(".led_transferir_para_gerador")
let img_transferir_para_gerador = document.querySelector("#img_transferir_para_gerador");

img_trasnferir_para_rede.onclick = function () {
    led_trasnferir_para_rede.classList.toggle("on");
    if(led_transferir_para_gerador.classList.contains("on")){
        led_transferir_para_gerador.classList.toggle("on");
    }
};
img_transferir_para_gerador.onclick = function () {
    led_transferir_para_gerador.classList.toggle("on");
    if(led_trasnferir_para_rede.classList.contains("on")){
        led_trasnferir_para_rede.classList.toggle("on");
    }
};

let img_auto = document.querySelector("#img_auto");
let led_auto = document.querySelector(".led_auto");
let led_manual = document.querySelector(".led_manual")
let img_manual = document.querySelector("#img_manual");

img_auto.onclick = function () {
    led_auto.classList.toggle("on");
    if(led_manual.classList.contains("on")){
        led_manual.classList.toggle("on");
    }
};
img_manual.onclick = function () {
    led_manual.classList.toggle("on");
    if(led_auto.classList.contains("on")){
        led_auto.classList.toggle("on");
    }
};

let led_teste = document.querySelector(".led_teste");
let img_teste = document.querySelector("#img_teste");

img_teste.onclick = function () {
    led_teste.classList.toggle("on");
};



// Tratando eventos do cbeçalho
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
    if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}

// Conectando painel-js
var bateria = window.document.getElementById('bateria');
var combustivel = window.document.getElementById('combustivel');
var pressao = window.document.getElementById('pressao');
var temperatura = window.document.getElementById('temperatura');
var estado = window.document.getElementById('estado');

function actualizarPainel(obj){
    bateria.innerHTML = `${obj.bateria.toFixed(1)}V`;
    combustivel.innerHTML = `${obj.combustivel.toFixed(1)}%`;
    pressao.innerHTML = `${obj.pressao.toFixed(1)}bar`;
    temperatura.innerHTML = `+${obj.temperatura.toFixed(1)}&deg;C`;

    if (obj.estado == "On") {
        estado.style = `background: lime`;
    } else { 
        estado.style = `background: crimson`;
    }
    estado.innerHTML = `<span class='admin_name'>Status: ${obj.estado}</span>`;
}
function lerBaseDados(codigo) {
    console.log(codigo);
    var xhr_painel = new XMLHttpRequest();
    xhr_painel.onload = function () {
        if (this.status == 200) {
            const obj = JSON.parse(this.responseText);
            console.log(obj);
            actualizarPainel(obj);
        }
    }
    xhr_painel.open('GET', 'actualizar-painel.php?codigo='+codigo, true);
    xhr_painel.send(null);
   setTimeout(`lerBaseDados("`+ codigo +`")`, 10000);
}
