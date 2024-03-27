function aprova(r) {
    var i = r.parentNode.parentNode.rowIndex;
    
    referencia=document.getElementById("aprovacaoTable").rows[i].cells[0].innerHTML;
    
    str=location.href;
    
    var aprovePage = str.replace("aprovar_adicao_imoveis.php", "aprovar.php?referencia="+referencia);
    location.replace(aprovePage);
}
    
