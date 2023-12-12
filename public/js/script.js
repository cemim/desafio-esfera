function alterarBar(x) {
    x.classList.toggle("change");

    if(x.classList.contains('change')){
        document.getElementById('menu').style.marginLeft = "0px";
    } else {
        document.getElementById('menu').style.marginLeft = "-1000px";
    }
}