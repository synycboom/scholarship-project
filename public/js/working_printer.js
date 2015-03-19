$('document').ready(function(){
	$('#printButton').click(function(){
		window.print();
		setTimeout(printTrigger('pdfDocument'), 2);
	});

	function printTrigger(elementId) {
		    var getMyFrame = document.getElementById(elementId);
		    getMyFrame.focus();
		    getMyFrame.contentWindow.print();
	}
});