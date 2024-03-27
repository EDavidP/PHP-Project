function showInfo1(r) {
	var i = r.parentNode.parentNode.rowIndex;
	
	referencia=document.getElementById("imoveisTable").rows[i].cells[0].innerHTML;
	
	str=location.href;
	
	var infoPage = str.replace("catalogo.php", "detalhes_imovel.php?referencia="+referencia);
	location.replace(infoPage);
}

function showInfo2(r) {
	var i = r.parentNode.parentNode.rowIndex;
	
	referencia=document.getElementById("imoveisTable").rows[i].cells[2].innerHTML;
	
	str=location.href;
	
	var infoPage = str.replace("catalogo.php", "detalhes_imovel.php?referencia="+referencia);
	location.replace(infoPage);
}

function showInfo3(r) {
	var i = r.parentNode.parentNode.rowIndex;
	
	referencia=document.getElementById("imoveisTable").rows[i].cells[4].innerHTML;
	
	str=location.href;
	
	var infoPage = str.replace("catalogo.php", "detalhes_imovel.php?referencia="+referencia);
	location.replace(infoPage);
}


function showInfo11(r) {
	var i = r.parentNode.parentNode.rowIndex;
	
	referencia=document.getElementById("imoveisTable").rows[i].cells[0].innerHTML;
	
	str=location.href;
	
	var infoPage = str.replace("catalogo_logado.php", "detalhes_imovel_logado.php?referencia="+referencia);
	location.replace(infoPage);
}

function showInfo22(r) {
	var i = r.parentNode.parentNode.rowIndex;
	
	referencia=document.getElementById("imoveisTable").rows[i].cells[2].innerHTML;
	
	str=location.href;
	
	var infoPage = str.replace("catalogo_logado.php", "detalhes_imovel_logado.php?referencia="+referencia);
	location.replace(infoPage);
}

function showInfo33(r) {
	var i = r.parentNode.parentNode.rowIndex;
	
	referencia=document.getElementById("imoveisTable").rows[i].cells[4].innerHTML;
	
	str=location.href;
	
	var infoPage = str.replace("catalogo_logado.php", "detalhes_imovel_logado.php?referencia="+referencia);
	location.replace(infoPage);
}



function showInfo1rem(r) {
	var i = r.parentNode.parentNode.rowIndex;
	
	referencia=document.getElementById("imoveisTable2").rows[i].cells[0].innerHTML;
	
	str=location.href;
	
	var infoPage = str.replace("catalogo.php", "detalhes_imovel.php?referencia="+referencia);
	location.replace(infoPage);
}

function showInfo2rem(r) {
	var i = r.parentNode.parentNode.rowIndex;
	
	referencia=document.getElementById("imoveisTable2").rows[i].cells[2].innerHTML;
	
	str=location.href;
	
	var infoPage = str.replace("catalogo.php", "detalhes_imovel.php?referencia="+referencia);
	location.replace(infoPage);
}

function showInfo3rem(r) {
	var i = r.parentNode.parentNode.rowIndex;
	
	referencia=document.getElementById("imoveisTable2").rows[i].cells[4].innerHTML;
	
	str=location.href;
	
	var infoPage = str.replace("catalogo.php", "detalhes_imovel.php?referencia="+referencia);
	location.replace(infoPage);
}


function showInfo11rem(r) {
	var i = r.parentNode.parentNode.rowIndex;
	
	referencia=document.getElementById("imoveisTable2").rows[i].cells[0].innerHTML;
	
	str=location.href;
	
	var infoPage = str.replace("catalogo_logado.php", "detalhes_imovel_logado.php?referencia="+referencia);
	location.replace(infoPage);
}

function showInfo22rem(r) {
	var i = r.parentNode.parentNode.rowIndex;
	
	referencia=document.getElementById("imoveisTable2").rows[i].cells[2].innerHTML;
	
	str=location.href;
	
	var infoPage = str.replace("catalogo_logado.php", "detalhes_imovel_logado.php?referencia="+referencia);
	location.replace(infoPage);
}

function showInfo33rem(r) {
	var i = r.parentNode.parentNode.rowIndex;
	
	referencia=document.getElementById("imoveisTable2").rows[i].cells[4].innerHTML;
	
	str=location.href;
	
	var infoPage = str.replace("catalogo_logado.php", "detalhes_imovel_logado.php?referencia="+referencia);
	location.replace(infoPage);
}