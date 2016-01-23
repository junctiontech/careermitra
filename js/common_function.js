var base_url="/careermitra/";
function Getexam(careerid){

$.ajax({
				type: "POST",
				url : base_url+"index.php/Jobpg/getexambycareer",
				data: {careerid: careerid  },
				
			})	
				.done(function(msg){
					//alert(msg);
					$('.Exam').html(msg);
					
				});
		
		return false;

}


function check_email(obj){
        
				var textboxid='msg_box_'+obj;
				var email = document.getElementById('reg-email').value;
				
                if(email!=''){
                        $.ajax({
                                        type:"POST",
                                        url: base_url+"index.php/Loginpg/Check_email",
                                        data: {email: email},
                                        }) 
                                        .done(function( msg ) {
										
                                                if(msg==0) 
												{
                                                        $('#reg-email').val('');
                                                        $(".msg_box_"+obj).html("email id already registered with us.");
                                                        return false;
                                                        }
														
														else
														{
															
															$(".msg_box_"+obj).html('');
                
														}
                                        });
                        return false;
                }
}


function check_career(obj){
	var textboxid='msg_box_'+obj;
	var Career_name = document.getElementById('reg-career').value;
	
	
	if(Career_name!='')
	{
		$.ajax({
					type:"POST",
					url:base_url+"index.php/Careerpg/Check_career",
					data:{Career_name: Career_name}
					}) 
					.done(function( msg ) {
										
                                                if(msg==0) 
												{
                                                        $('#reg-career').val('');
                                                        $(".msg_box_"+obj).html("career is already registered with us.");
                                                        return false;
                                                        }
														
														else
														{
															
															$(".msg_box_"+obj).html('');
                
														}
                                        });
		
                        return false;
		
}
}





function email_chek(val)
{
	$.ajax({
		type:'POST',
		url:'login/email_chek',
		data:{val:val},
	})
	.done(function(msg){
		$("#chk_org").html(msg);
	});
}

function email_forget(val)
{
	$.ajax({
		type:'POST',
		url:'login/email_forget',
		data:{val:val},
	})
	.done(function(msg){
		$("#chk_org").html(msg);
	});
}



function validation()
{
	var a= document.getElementById("passwd").value; 
	var b= document.getElementById("re-passwd").value;
	if(a==b)
	{
		return true;
	}
	else
	{
		alert("Password does not match");
		$("#passwd").focus();
		document.getElementById("passwd").value="";
		document.getElementById("re-passwd").value="";
		return false;
	}	
}

function userid(val)
{	
	var a= document.getElementById("username").value;
	if(a.match(' '))
		{
			alert('Don`t use space in user Name');
			document.getElementById("username").value="";
		}
	var c=/^[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]*$/;
	if(a.match(c))
		{
			alert('don`t use spacial charector');
			document.getElementById("username").value="";
		}
	
}

function emailid()
{	
	var a= document.getElementById("email").value;
	var email=/[^@]+@[^@]+\.[a-zA-Z]{2,}/;
	if(a.match(email))
		{
			alert('Please Enter Correct Email Address');
		}
}

