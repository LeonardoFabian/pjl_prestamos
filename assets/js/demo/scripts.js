
function imp_credits(imp1) {
	var printContents = document.getElementById('imp1').innerHTML;
	w = window.open();
	w.document.write(printContents);
	w.document.close();
	w.focus();
	w.print();
	w.close();
} 
