function login(){
	//alert("Hey");
	var e = _("txtEmail").value;
	var p = _("txtPassword").value;
	if(e == "" || p == ""){
		_("loginStatus").innerHTML = "Fill out all of the form data";
	}
	else{
		_("btnLogin").style.display = "none";
		_("loginStatus").innerHTML = "Please wait...";
		var ajax = ajaxObj("POST", "php/login.php");
		ajax.onreadystatechange = function(){
			if(ajaxReturn(ajax) == true){
				//alert(ajax.responseText);
				
				if(ajax.responseText == 0){
					
					_("loginStatus").innerHTML = "Login unsuccessful<br>please try again !";
					_("btnLogin").style.display = "block";
				}
				else{
					//_("loginStatus").innerHTML = ajax.responseText;
					window.location = "php/profile.php?u="+ajax.responseText;	
				}
			}	
		}
		ajax.send("e=" + e + "&p=" + p );
	}
}