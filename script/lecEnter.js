


$("#submit").click( function() {

//alert("ewf");
	var file=$('#form').prop('files')[0];
	var data=$("#form :input").serializeArray();
	data[data.length]={name:"fileToUpload",value:file};
 $.post( $("#form").attr("action"),
         data,
         function(info1){ $("#check").html(info1);
   });
//clearInput();
});
 
$("#form").submit( function() {
	
  return false;
  
});
