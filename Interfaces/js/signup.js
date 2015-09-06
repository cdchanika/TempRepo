// JavaScript Document
function restrict(elem){
	var tf = _(elem);
	var rx = new RegExp;
	rx = /[' "]/gi;
	tf.value  = tf.value.replace(rx, "");
}
	
function emptyElement(x){
	_(x).innerHTML = "";	
}
	
function checkEmail(){
	var e = _("signupEmail").value;	
	if(e != ""){
		_("emailStatus").innerHTML = "checking ...";
		var ajax = ajaxObj("post", "php/signup.php");
		ajax.onreadystatechange = function(){
			if(ajaxReturn(ajax) == true){
				_("emailStatus").innerHTML = ajax.responseText;
			}	
		}
		ajax.send("emailcheck="+e);
	}
}

function signup(){
	//alert("hr");
	var f = _("fName").value;
	var l = _("lName").value;
	var e = _("signupEmail").value;
	var p1 = _("pass1").value;
	var p2 = _("pass2").value;
	var g = _("gender").value;
	var status = _("status");
	if(f=="" || l=="" || e=="" || p1=="" || p2=="" || g==""){
		status.innerHTML = "Fill out all of the form data";	
	}
	else if(p1 != p2){
		status.innerHTML = "Your password fields do not match";	
	}
	else{
		_("btnSignup").style.display = "none";
		status.innerHTML = "Please wait ...";
		var ajax = ajaxObj("POST", "php/signup.php");
		ajax.onreadystatechange = function() {
			if(ajaxReturn(ajax) == true){
				if(ajax.responseText != "signup_success"){
					status.innerHTML = ajax.responseText;
					_("btnSignup").style.display = "block";
				}else{
					window.scrollTo(0,0);
					_("signupform").innerHTML = "OK";
				}
			}	
		}
		ajax.send("f=" +f+ "&l=" +l+ "&e=" +e+ "&p1=" +p1+ "&p2=" +p2+ "&g=" +g);
	}
}

function signUp(){
	var f = _("fName").value;
	var l = _("lName").value;
	var e = _("signupEmail").value;
	var p1 = _("pass1").value;
	var p2 = _("pass2").value;
	var g = _("gender").value;
	var status = _("status");
	if(f=="" || l=="" || e=="" || p1=="" || p2=="" || g==""){
		status.innerHTML = "Fill out all of the form data";	
	}
	else if(p1 != p2){
		status.innerHTML = "Your password fields do not match";	
	}
	else{
		_("btnSignup").style.display = "none";
		status.innerHTML = "Please wait ...";
		var ajax = ajaxObj("POST", "php/signup.php");
		ajax.onreadystatechange = function() {
			if(ajaxReturn(ajax) == true){
				if(ajax.responseText != "signup_success"){
					status.innerHTML = ajax.responseText;
					_("btnSignup").style.display = "block";
				}else{
					window.scrollTo(0,0);				
					_("signupform").innerHTML = "OK";
				}
			}	
		}
		ajax.send("f=" +f+ "&l=" +l+ "&e=" +e+ "&p1=" +p1+ "&p2=" +p2+ "&g=" +g);
	}
	//alert("Hii");	
}
