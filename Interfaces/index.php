<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>.::BOE::.</title>
<link href="css/indexPageStyles.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="js/main.js"></script>
<script src="js/ajax.js"></script>
<script src="js/signup.js"></script>
<script src="js/login.js"></script>

</head>

<body>

<div id="wrapper">
	<div id="topic">
    	<h1><font face="Verdana, Geneva, sans-serif">Book of Experience</font></h1>
    </div>
	<div id="loginSection">
    	<form id="loginForm" onSubmit="return false;">
        	<div>Email</div>
            <input type="text" id="txtEmail" class="txtbxIndex"></td>
  			<div>Password</div>
            <input type="password" id="txtPassword" class="txtbxIndex"></td>
      		<br/><br/> 
   			<input type="button" id="btnLogin" value="Login" class="btn" onClick="login()" style="margin-left:0;"/>
  			<p id="loginStatus" style="font-weight:bold;"></p>
            <a href="#">Forgot your password</a>
       </form>
    </div>
    <div id="signup">
    	<form name="signup" id="signupForm" onSubmit="return false;">
        	
             <h2>Sign Up</h2>
            
            
             <div>First Name</div>
              <input type="text" id="fName" class="txtbxIndex">
              <div>Last Name</div>
              <input type="text" id="lName" class="txtbxIndex">
       		 <div>Email</div>
              <input type="text" id="signupEmail" class="txtbxIndex" onBlur="checkEmail()" onFocus="emptyElement('status')" onKeyUp="restrict('email')" maxlength="88">
              <span id="emailStatus"></span>
             <div>Password</div>
              <input type="password" name="txtPasswordSignup" class="txtbxIndex" id="pass1" onFocus="emptyElement('status')" maxlength="16"></td>
              <div>Confirm password</div>
              <input type="password" name="txtRePassword" class="txtbxIndex" id="pass2" onFocus="emptyElement('status')" maxlength="16"></td>
              <div>Gender</div>
              <select id="gender" onFocus="emptyElement('status')">
              	<option value=""></option>
                <option value="M">Male</option>
                <option value="F">Female</option>
              </select>
             
              <div>
               <br>
              <input type="button" name="btnView" value="Just view" class="btn" onClick="view()" style="margin-left:0px;"/>
              <input type="button" id="btnSignup" value="Signup" class="btn" onClick="signUp()" style="margin-left:0px;"/>
              
              <div id="status" style="padding-top:20px; font-weight:bold;"></div>
             </div>
        </form>
    </div>
</div>
</body>
</html>
