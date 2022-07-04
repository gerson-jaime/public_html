document.querySelector(".rede").classList.toggle("active");

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

function lerBaseDados() {
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (this.status == 200) {
            const obj = JSON.parse(this.responseText);
            console.log(obj);
            actualizarFases(obj);
        }
    }
    xhr.open('POST', 'actualizar-fases.php', true);
    xhr.send();

   setTimeout('lerBaseDados()', 10000);
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
