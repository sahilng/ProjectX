$(document).ready(function() {
    $("td").click(function(event) {
        var id = event.target.id;
		document.getElementById("free_field").value = id;
		document.getElementById("freematefinder").submit();
		
    });
});