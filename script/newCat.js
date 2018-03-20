

$("#add").click( function() {
 $.post( $("#form").attr("action"),
         $("#form :input").serializeArray(),
         function(info1){ $("#check").html(info1);
   });
//clearInput();
});
 
$("#form").submit( function() {
	// $('#myModal').modal('hide');
  return false;
});

