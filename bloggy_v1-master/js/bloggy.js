$(document).ready(function() {
	$("form").submit(function(eve){
		eve.preventDefault();

		$.ajax({
			method: "post",
			url : "contact_action.php",
			data : {
				email : $("#email").val(),
				sujet : $("#sujet").val(),
				message : $("#message").val(),
				newsletter : $("#newsletter").prop('checked')
			},
			success : function(data) {
				r=data.retour
				msg=data.sujet
				if (r==1)
					$('#notif').html( "L'ajout se fait avec succes de  "+msg).show();
				else 
					$('#notif').html("erreur").show();

			}
		});
	});
});