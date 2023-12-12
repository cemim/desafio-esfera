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
