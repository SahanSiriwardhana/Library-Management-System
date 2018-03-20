

function book_insert(){
	
	/*================================
	    asign value to the variable
	================================*/
	
	var bookID = document.getElementById('bookID').value;
	var isbn = document.getElementById('isbn').value;
	var title = document.getElementById('title').value;
	var cat = document.getElementById('cat').value;
	var numCpy = document.getElementById('numCpy').value;
	var author = document.getElementById('author').value;
	var publisher = document.getElementById('publisher').value;
	var bookType = document.getElementById('bookType').value;
	var addedDate = document.getElementById('datepicker').value;
	
	if(bookID == ''   || isbn == ''   || title == ''   || cat == ''   || numCpy == ''   || author == ''   || publisher == ''   ||   bookType == ''   || addedDate == ''){
		alert('Please enter data...!');
		}
	
	else{
		
		
		
		var dataString =$( "#form" ).serializeArray();
 	$.ajax({
			type:"post",
			url:"userInfo.php",
			data:dataString,
			cache:false,
			success:function(html){
				$('#check').html(html);
				 $('#form')[0].reset(); 
			}
		});
		return false;
	}
	return false;
}