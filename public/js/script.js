let ordemAscendente = true;

function ordenarTabela(coluna) {
    const tabela = document.getElementById('table-list');
    const linhas = Array.from(tabela.querySelectorAll('tbody tr'));

    linhas.sort((a, b) => {
        const textoA = a.querySelectorAll('td')[coluna].textContent.trim();
        const textoB = b.querySelectorAll('td')[coluna].textContent.trim();

        return ordemAscendente ? textoA.localeCompare(textoB) : textoB.localeCompare(textoA);
    });

    linhas.forEach(linha => tabela.querySelector('tbody').appendChild(linha));

    ordemAscendente = !ordemAscendente;
}

function alterarBar(x) {
    x.classList.toggle("change");

    if (x.classList.contains('change')) {
        document.getElementById('menu').style.marginLeft = "0px";
    } else {
        document.getElementById('menu').style.marginLeft = "-1000px";
    }
}

document.getElementById('filtroStatus').addEventListener('keyup', function () {
    const filtro = this.value.toUpperCase();
    const linhas = document.querySelectorAll('#table-list tbody tr');

    linhas.forEach(function (linha) {
        const colunaStatus = linha.querySelector('td:nth-child(4)');
        if (colunaStatus) {
            const textoStatus = colunaStatus.textContent.toUpperCase();
            if (textoStatus.indexOf(filtro) > -1) {
                linha.style.display = '';
            } else {
                linha.style.display = 'none';
            }
        }
    });
});

