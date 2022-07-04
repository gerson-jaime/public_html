// Tratando eventos de side bar
document.querySelector(".gerador").classList.toggle("active");

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
        

// Conectando fases -js
var fases = [
    ['.val_tensao_R', '.circ_tensao_R', '.val_corrente_R', '.circ_corrente_R', '#potencia_R', '#energia_R', '#factor_R', '#frequencia_R'],
    ['.val_tensao_S', '.circ_tensao_S', '.val_corrente_S', '.circ_corrente_S', '#potencia_S', '#energia_S', '#factor_S', '#frequencia_S'],
    ['.val_tensao_T', '.circ_tensao_T', '.val_corrente_T', '.circ_corrente_T', '#potencia_T', '#energia_T', '#factor_T', '#frequencia_T']];
for (var i in fases) {
    for (var j in fases[i]) {
            fases[i][j] = window.document.querySelector(fases[i][j]);
    }
}
console.log(fases);

var tensao_init = 0;
var corrente_init = 0;
setInterval(function () {
    if (tensao_init >= 200) {
        clearInterval();
    } else {
        for (var i in fases) {
            tensao_init += 1.5;
            corrente_init += 0.2;
        }
        for (var i in fases) {
            fases[i][0].innerHTML = `${tensao_init.toFixed(1)} V`;
            fases[i][1].style = ` stroke-dashoffset:${472 - tensao_init}`;
            fases[i][2].innerHTML = `${corrente_init.toFixed(1)} A`;
            fases[i][3].style = ` stroke-dashoffset:${472 - corrente_init * 5}`;
        }
    }
}, 50);

function actualizarFases(obj) {
    if (tensao_init >= 200) {
        for (var i in fases) {
            fases[i][0].innerHTML = `${obj[i].tensao.toFixed(1)} V`;
            fases[i][1].style = `stroke-dashoffset:${472 -  (472/230) * obj[i].tensao}`;
            fases[i][2].innerHTML = `${obj[i].corrente.toFixed(1)} A`;
            fases[i][3].style = `stroke-dashoffset:${472 - (472/40) * obj[i].corrente}`;
            fases[i][4].innerHTML = `${obj[i].potencia.toFixed(1)}`;
            fases[i][5].innerHTML = `${obj[i].energia.toFixed(1)}`;
            fases[i][6].innerHTML = `${obj[i].factor.toFixed(1)}`;
            fases[i][7].innerHTML = `${obj[i].frequencia.toFixed(1)}`;
        }
    }
}

function lerBaseDados(codigo) {
    console.log(codigo);
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (this.status == 200) {
            const obj = JSON.parse(this.responseText);
            console.log(obj);
            actualizarFases(obj);
        }
    }
    xhr.open('POST', 'actualizar-fases.php?codigo='+codigo, true);
    xhr.send(null);
   setTimeout(`lerBaseDados("`+ codigo +`")`, 10000);
}

// Tratando eventos do tipo enter
var section_R = window.document.getElementById('section_R');
var section_S = window.document.getElementById('section_S');
var section_T = window.document.getElementById('section_T');

var wasRClicked = false;
var wasSClicked = false;
var wasTClicked = false;

// Tratando eventos do tipo click sobre as sectios
section_R.addEventListener('click', () => { 
    wasRClicked = !wasRClicked;
    header_handler('R', wasRClicked);
});
section_S.addEventListener('click', () => { 
    wasSClicked = !wasSClicked;
    header_handler('S', wasSClicked);
});
section_T.addEventListener('click', () => { 
    wasTClicked = !wasTClicked;
    header_handler('T', wasTClicked);
});


function header_handler(fase, wasClicked) {
    var info = window.document.getElementById('info_' + fase);
    if (wasClicked) {
        info.style = 'display: block;';
        return;
    }
    info.style = 'display: none;';
}
