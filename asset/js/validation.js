// <!-- form validation -->
    // <script type="text/javascript">
    // registration form validation
    	function validation(){
            // alert("call in validation");
    		var uname = document.regForm.username.value;
            var pass1 = document.regForm.password1.value;
            var pass2 = document.regForm.password2.value;
            var secQue= document.regForm.secque.value;
            var secAns= document.regForm.secans.value;
            var fname= document.regForm.fname.value;
            var mname= document.regForm.mname.value;
            var lname= document.regForm.lname.value;
            var gender= document.regForm.gender.value;
            var dob= document.regForm.dob.value;
            var email= document.regForm.email.value;
            var mono= document.regForm.phno.value;
            var addArea= document.regForm.add_area.value;
            var addPin= document.regForm.add_pin.value;
            var addCity= document.regForm.add_city.value;
            var addState= document.regForm.add_state.value;

            var numbers = /^[0-9]+$/;
            var alpha = /^[a-zA-Z]+$/;
            var pass = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,15}$/;

            if (uname == "") {
                //alert("if execute");
                 document.getElementById("er_uname").innerHTML="enter username";
                // uname.focus();
                // alert("enter username");
                document.getElementById("uname").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("uname").focus();
                return false;
            }
            else{
                document.getElementById("er_uname").innerHTML="";
                document.getElementById("uname").style="border:none;box-shadow:none";           
            }
            
            if (pass1 == "" ) {
                document.getElementById("er_pass1").innerHTML="enter password";
                document.getElementById("pass1").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("pass1").focus();
                return false;
            }
            else{
                document.getElementById("er_pass1").innerHTML="";
                document.getElementById("pass1").style="border:none;box-shadow:none";           
            }
            if (!pass1.match(pass)) {
                document.getElementById("er_pass1").innerHTML="password combination must have character,number,and spcial symbol <br> and length should be greater than 6";
                document.getElementById("pass1").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("pass1").focus();
                return false;
            }
            else{
                document.getElementById("er_addpin").innerHTML="";
                document.getElementById("pin").style="border:none;box-shadow:none";           
            }
            if (pass2 == "") {
                document.getElementById("er_pass2").innerHTML="confirm password";
                document.getElementById("pass2").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("pass2").focus();
                return false;
            }
            else{
                document.getElementById("er_pass2").innerHTML="";
                document.getElementById("pass2").style="border:none;box-shadow:none";           
            }
            if (!pass2.match(pass)) {
                document.getElementById("er_pass2").innerHTML="password combination must have character,number,and spcial symbol <br> and length should be greater than 6";
                document.getElementById("pass2").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("pass2").focus();
                return false;
            }
            else{
                document.getElementById("er_addpin").innerHTML="";
                document.getElementById("pin").style="border:none;box-shadow:none";           
            }
            if (pass1 != pass2) {
                document.getElementById("er_pass2").innerHTML="password not matched";
                document.getElementById("pass2").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("pass2").focus();
                return false;
            }
            else{
                document.getElementById("er_pass2").innerHTML="";
                document.getElementById("pass2").style="border:none;box-shadow:none";           
            }

            if (secQue == "default" ) {
                document.getElementById("er_secque").innerHTML="choose security question";
                document.getElementById("secQue").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("secQue").focus();
                return false;
            }
            else{
                document.getElementById("er_secque").innerHTML="";
                document.getElementById("secQue").style="border:none;box-shadow:none";           
            }
            if (secAns == "" ) {
                document.getElementById("er_secans").innerHTML="enter security answare";
                document.getElementById("secAns").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("secAns").focus();
                return false;
            }
            else{
                document.getElementById("er_secans").innerHTML="";
                document.getElementById("secAns").style="border:none;box-shadow:none";           
            }

            if (fname == "" ) {
                document.getElementById("er_fname").innerHTML="enter first name";
                document.getElementById("fn").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("fn").focus();
                return false;
            }
            else{
                document.getElementById("er_fname").innerHTML="";
                document.getElementById("fn").style="border:none;box-shadow:none";           
            }
            if (!fname.match(alpha)) {
                document.getElementById("er_fname").innerHTML="enter only characters";
                document.getElementById("fn").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("fn").focus();
                return false;
            }
            else{
                document.getElementById("er_addpin").innerHTML="";
                document.getElementById("pin").style="border:none;box-shadow:none";           
            }
            if (mname == "" ) {
                document.getElementById("er_mname").innerHTML="enter middle name";
                document.getElementById("mn").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("mn").focus();
                return false;
            }    
            else{
                document.getElementById("er_mname").innerHTML="";
                document.getElementById("mn").style="border:none;box-shadow:none";           
            }        
            if ( !mname.match(alpha) ) {
                document.getElementById("er_mname").innerHTML="enter only characters";
                document.getElementById("mn").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("mn").focus();
                return false;
            }
            else{
                document.getElementById("er_addpin").innerHTML="";
                document.getElementById("pin").style="border:none;box-shadow:none";           
            }
            if (lname == "" ) {
                document.getElementById("er_lname").innerHTML="enter last name";
                document.getElementById("ln").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("ln").focus();
                return false;
            }
            else{
                document.getElementById("er_lname").innerHTML="";
                document.getElementById("ln").style="border:none;box-shadow:none";           
            }
            if ( !lname.match(alpha)) {
                document.getElementById("er_lname").innerHTML="enter only characters";
                document.getElementById("ln").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("ln").focus();
                return false;
            }
            else{
                document.getElementById("er_addpin").innerHTML="";
                document.getElementById("pin").style="border:none;box-shadow:none";           
            }
            // if (gender.checked == false) {
            //     document.getElementById("er_gender").innerHTML="select gender";
            //     document.getElementById("uname").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
            //     document.getElementById("gender").focus();
            //     return false;
            // }
            // else{
            //     document.getElementById("er_gender").innerHTML="";
            //     document.getElementById("gender").style="border:none;box-shadow:none";           
            // }
            if (dob == "" ) {
                document.getElementById("er_dob").innerHTML="select date of birth";
                document.getElementById("date").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("date").focus();
                return false;
            }
            else{
                document.getElementById("er_dob").innerHTML="";
                document.getElementById("date").style="border:none;box-shadow:none";           
            }

            if (email == "" ) {
                document.getElementById("er_email").innerHTML="enter email id";
                document.getElementById("mail").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("mail").focus();
                return false;
            }
            else{
                document.getElementById("er_email").innerHTML="";
                document.getElementById("mail").style="border:none;box-shadow:none";           
            }
            var atpos = email.indexOf("@");
            var dotpos = email.lastIndexOf(".");
         
            if (atpos < 1 || ( dotpos - atpos < 2 )) {
                document.getElementById("er_email").innerHTML="please enter correct email id";
                document.getElementById("mail").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("mail").focus();
                return false;
            }
            else{
                document.getElementById("er_email").innerHTML="";
                document.getElementById("mail").style="border:none;box-shadow:none";           
            }
            
            if (mono == "" ) {
                document.getElementById("er_phno").innerHTML="enter mobile no";
                document.getElementById("mono").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("mono").focus();
                return false;
            }
            else{
                document.getElementById("er_phno").innerHTML="";
                document.getElementById("mono").style="border:none;box-shadow:none";           
            }

            if (!mono.match(numbers)) {
                document.getElementById("er_phno").innerHTML="enter only numbers";
                document.getElementById("mono").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("mono").focus();
                return false;
            }
            else{
                document.getElementById("er_phno").innerHTML="";
                document.getElementById("mono").style="border:none;box-shadow:none";           
            }
            if (mono.length > 10 || mono.length < 10) {
                document.getElementById("er_phno").innerHTML="enter valid number of 10 digit";
                document.getElementById("mono").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("mono").focus();
                return false;
            }
            else{
                document.getElementById("er_phno").innerHTML="";
                document.getElementById("mono").style="border:none;box-shadow:none";           
            }

            if (addArea == "" ) {
                document.getElementById("er_addarea").innerHTML="enter area ";
                document.getElementById("area").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("area").focus();
                return false;
            }
            else{
                document.getElementById("er_addarea").innerHTML="";
                document.getElementById("area").style="border:none;box-shadow:none";           
            }

            if (addPin == "" ) {
                document.getElementById("er_addpin").innerHTML="enter pin no";
                document.getElementById("pin").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("pin").focus();
                return false;
            }
            else{
                document.getElementById("er_addpin").innerHTML="";
                document.getElementById("pin").style="border:none;box-shadow:none";           
            }
            if (!addPin.match(numbers)) {
                document.getElementById("er_addpin").innerHTML="enter only numbers";
                document.getElementById("pin").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("pin").focus();
                return false;
            }
            else{
                document.getElementById("er_addpin").innerHTML="";
                document.getElementById("pin").style="border:none;box-shadow:none";           
            }
            if (addPin.length > 6 || addPin.length < 6) {
                document.getElementById("er_addpin").innerHTML="enter valid number of 6 digit";
                document.getElementById("pin").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("pin").focus();
                return false;
            }
            else{
                document.getElementById("er_addpin").innerHTML="";
                document.getElementById("pin").style="border:none;box-shadow:none";           
            }

            if (addCity == "default" ) {
                document.getElementById("er_addcity").innerHTML="choose city";
                document.getElementById("city").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("city").focus();
                return false;
            }
            else{
                document.getElementById("er_addcity").innerHTML="";
                document.getElementById("city").style="border:none;box-shadow:none";           
            }

            if (addState == "default" ) {
                document.getElementById("er_addstate").innerHTML="choose state";
                document.getElementById("state").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("state").focus();
                return false;
            }
            else{
                document.getElementById("er_addstate").innerHTML="";
                document.getElementById("state").style="border:none;box-shadow:none";           
            }
            return true;


    	}



        function logvalidation(){
            var uname = document.logForm.username.value;
            var pass = document.logForm.password.value;

            if (uname == "") {
                // alert("this also");
                document.getElementById("er_username").innerHTML="enter username";
                // uname.focus();
                // alert("enter username");
                document.getElementById("uname").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("uname").focus();
                return false;
            }
            else{
                document.getElementById("er_username").innerHTML="";
                document.getElementById("uname").style="border:none;box-shadow:none";           
            }
            
            if (pass == "" ) {
                document.getElementById("er_password").innerHTML="enter password";
                document.getElementById("pass").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("pass").focus();
                return false;
            }
            else{
                document.getElementById("er_password").innerHTML="";
                document.getElementById("pass").style="border:none;box-shadow:none";           
            }
            return true;
        }
    // </script>



     function validtrain(){
        // alert("working");

        var trainno = document.train.trainno.value;
        var trainname = document.train.trainname.value;
        var seat = document.train.seat.value;
        // var clas = document.train.class.value;
        var src = document.train.src.value;
        var dest = document.train.dest.value;
        var depart = document.train.depart.value;
        var arr = document.train.arr.value;
        var fare = document.train.fare.value;

        var numbers = /^[0-9]+$/;
        var alpha = /^[a-zA-Z]+$/;


            if (trainno == "") {
                //alert("if execute");
                 document.getElementById("er_trainno").innerHTML="enter train no";
                // uname.focus();
                // alert("enter username");
                document.getElementById("trainnoid").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("trainnoid").focus();
                return false;
            }
            else{
                document.getElementById("er_trainno").innerHTML="";
                document.getElementById("trainnoid").style="border:none;box-shadow:none";           
            }

            if (!trainno.match(numbers)) {
                document.getElementById("er_trainno").innerHTML="enter only numbers";
                document.getElementById("trainnoid").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("trainnoid").focus();
                return false;
            }
            else{
                document.getElementById("er_trainno").innerHTML="";
                document.getElementById("trainnoid").style="border:none;box-shadow:none";           
            }
            if (trainno.length > 5 || trainno.length < 5) {
                document.getElementById("er_trainno").innerHTML="enter valid number of 5 digit";
                document.getElementById("trainnoid").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("trainnoid").focus();
                return false;
            }
            else{
                document.getElementById("er_trainno").innerHTML="";
                document.getElementById("trainnoid").style="border:none;box-shadow:none";           
            }

            if (trainname == "") {
                //alert("if execute");
                 document.getElementById("er_trainname").innerHTML="enter train name";
                // uname.focus();
                // alert("enter username");
                document.getElementById("trainnameid").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("trainnameid").focus();
                return false;
            }
            else{
                document.getElementById("er_trainname").innerHTML="";
                document.getElementById("trainnameid").style="border:none;box-shadow:none";           
            }

            if (seat == "") {
                //alert("if execute");
                 document.getElementById("er_seat").innerHTML="enter Availability of seats";
                // uname.focus();
                // alert("enter username");
                document.getElementById("seatid").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("seatid").focus();
                return false;
            }
            else{
                document.getElementById("er_seat").innerHTML="";
                document.getElementById("seatid").style="border:none;box-shadow:none";           
            }

            if (!seat.match(numbers)) {
                document.getElementById("er_seat").innerHTML="enter only numbers";
                document.getElementById("seatid").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("seatid").focus();
                return false;
            }
            else{
                document.getElementById("er_seat").innerHTML="";
                document.getElementById("seatid").style="border:none;box-shadow:none";           
            }

            if (src == "") {
                //alert("if execute");
                 document.getElementById("er_src").innerHTML="enter source location";
                // uname.focus();
                // alert("enter username");
                document.getElementById("srcid").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("srcid").focus();
                return false;
            }
            else{
                document.getElementById("er_src").innerHTML="";
                document.getElementById("srcid").style="border:none;box-shadow:none";           
            }

            if (!src.match(alpha)) {
                document.getElementById("er_src").innerHTML="enter only alphabets";
                document.getElementById("srcid").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("srcid").focus();
                return false;
            }
            else{
                document.getElementById("er_src").innerHTML="";
                document.getElementById("srcid").style="border:none;box-shadow:none";           
            }

            if (dest == "") {
                //alert("if execute");
                 document.getElementById("er_dest").innerHTML="enter source location";
                // uname.focus();
                // alert("enter username");
                document.getElementById("destid").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("destid").focus();
                return false;
            }
            else{
                document.getElementById("er_dest").innerHTML="";
                document.getElementById("destid").style="border:none;box-shadow:none";           
            }

            if (!dest.match(alpha)) {
                document.getElementById("er_dest").innerHTML="enter only alphabets";
                document.getElementById("destid").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("destid").focus();
                return false;
            }
            else{
                document.getElementById("er_dest").innerHTML="";
                document.getElementById("destid").style="border:none;box-shadow:none";           
            }

            if (depart == "") {
                //alert("if execute");
                 document.getElementById("er_depart").innerHTML="enter time of train depart";
                // uname.focus();
                // alert("enter username");
                document.getElementById("departid").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("departid").focus();
                return false;
            }
            else{
                document.getElementById("er_depart").innerHTML="";
                document.getElementById("departid").style="border:none;box-shadow:none";           
            }

            

            if (arr == "") {
                //alert("if execute");
                 document.getElementById("er_arr").innerHTML="enter time of train arr";
                // uname.focus();
                // alert("enter username");
                document.getElementById("arrid").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("arrid").focus();
                return false;
            }
            else{
                document.getElementById("er_arr").innerHTML="";
                document.getElementById("arrid").style="border:none;box-shadow:none";           
            }

            

            if (fare == "") {
                //alert("if execute");
                 document.getElementById("er_fare").innerHTML="enter fare of ticket";
                // uname.focus();
                // alert("enter username");
                document.getElementById("fareid").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("fareid").focus();
                return false;
            }
            else{
                document.getElementById("er_fare").innerHTML="";
                document.getElementById("fareid").style="border:none;box-shadow:none";           
            }

            if (!fare.match(numbers)) {
                document.getElementById("er_fare").innerHTML="enter only numbers";
                document.getElementById("fareid").style="border-color: #f00;box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25)";
                document.getElementById("fareid").focus();
                return false;
            }
            else{
                document.getElementById("er_fare").innerHTML="";
                document.getElementById("fareid").style="border:none;box-shadow:none";           
            }
            return true;
    }