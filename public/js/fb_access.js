'use strict';

//var monitoringFBLoginResponseTime;
var monitorRespTimeForAPICall;

$(document).ready(function(){
    window.fbAsyncInit = function () {
        FB.init({
            appId: '158277964559623',
            xfbml: false,
            version: 'v2.5'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
            
            
    
    //when the log in button is clicked (STEP ONE)
    $("#fbLogin").click(function (e) {
        e.preventDefault();
        
        $("#signLogModal").modal('hide');
        
        displayFlashMsg("Connecting to Facebook...", spinnerClass, '', '', false);
        
        callFBLogin();//trigger FB login dialog
    });
});




/**
 * Try to log user into FB if user was not previously logged into FB or our app (STEP TWO 1/2)
 * @returns {undefined}
 */
function callFBLogin() {
    console.log("Launching login dialog");
    
    //await response from FB for 30secs and show error if nothing was received
    /*
    monitoringFBLoginResponseTime = setTimeout(function(){
        //FB.logout();
        
        //display error message and stop execution
        $("#logInFMsg").css({'color':'red', 'fontSize':'11px'}).html("Taking too long to connect to Facebook. Check your internet connection and try again");
        
        $("#signLogModal").modal('show');//launch login modal
        
        return;
        
    }, 30000);
    */
    
    hideFlashMsg();//hide flash msg
        
    $("#logInFMsg").html("");//remove text
        
    
    //call fb login
    FB.login(function (response) {
        //clearTimeout(monitoringFBLoginResponseTime);//clear monitoring timeout once response is received 
        
        getReturnedInfoFromFB(response);//call function to handle response from FB
        
    }, {scope: 'email'});
}




/**
 * Take action based on the response gotten from FB (STEP TWO)
 * @param {type} response
 * @returns {undefined}
 */
function getReturnedInfoFromFB(response) {
    if (response.status === "connected") {
        console.log("Connected. About to make FB API call");
        
        //make API call to get necessary info
        makeFBAPICall();
    } 
    
    else if ((response.status === "not_authorized") || (response.status === "unknown")) {
        console.log(response.status);
        
        //display error message and stop execution
        $("#logInFMsg").css({'color':'red', 'fontSize':'11px'}).html("Could not complete the log in process");
        
        $("#signLogModal").modal('show');//launch login modal
    }
    
    else {//if unknown response was returned by FB
        console.log(response);
        
        //display error message and stop execution
        $("#logInFMsg").css({'color':'red', 'fontSize':'11px'}).html("Could not connect to Facebook at this time");
        
        $("#signLogModal").modal('show');//launch login modal
        return;
    }
}




/**
 * Make API call to get user's details if user is connected to FB (STEP THREE)
 * @returns {undefined}
 */
function makeFBAPICall() {
    console.log("Making FB API call");
    
    displayFlashMsg("Connected to Facebook. Getting info....", spinnerClass, 'black', '');
    
    
    //await response from FB for a while and show error if nothing was received
    monitorRespTimeForAPICall = setTimeout(function(){
        FB.logout();
        
        //display error message and stop execution
        changeFlashMsgContent("Taking too long to retrieve your data from Facebook. Check your internet connection and try again", '', 'red', '', '');
        
        //$("#signLogModal").modal('show');//launch login modal
        
        return;
        
    }, 15000);
    
    
    
    FB.api('/me?fields=email, first_name, last_name', function (response) {
        //clear time out monitoring response from FB for calling FB.api
        clearTimeout(monitorRespTimeForAPICall);
        
        var email = response.email;
        var firstName = response.first_name;
        var lastName = response.last_name;
        
        //send details to server to complete log in
        //method header: handleSocialLogIn(email, firstName, lastName, socialLoginType, callback)
        handleSocialLogIn(email, firstName, lastName, "Facebook", '');//in main.js
    });
}