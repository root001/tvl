'use strict';

$(document).ready(function(){
    
    //WHEN "SEND MESSAGE" IS CLICKED IN THE CONTACT US PAGE
    $("#contactSubmit").click(function(e){
        e.preventDefault();
        
        var name = $("#contactName").val();
        var email = $("#contactEmail").val();
        var phone = $("#contactPhone").val();
        var msg = $("#contactMsg").val();
        var subject = $("#contactSubject").val();
        
        
        if(!msg || !email || !name){
            !msg ? $("#contactMsg").css("borderColor", "red") : $("#contactMsg").css("borderColor", "");
            !email ? $("#contactEmail").css("borderColor", "red") : $("#contactEmail").css("borderColor", "");
            !name ? $("#contactName").css("borderColor", "red") : $("#contactName").css("borderColor", "");
            
            return;
        }
        
        $("#contactErrMsg").html("<i class='"+spinnerClass+"'></i> Sending....").focus();
        
        $.ajax({
            url: appRoot+"misc/email_us",
            data: {name:name, email:email, phone:phone, msg:msg, subject:subject},
            method: "POST"
        }).done(function(returnedData){
            if(returnedData.status === 1){
                document.getElementById("contactUsForm").reset();
                
                $("#contactErrMsg").css('color', 'green').html("<b>Message Sent. Thank you for contacting us</b>").fadeOut(8000);
            }
            
            else{
                $("#contactErrMsg").css('color', 'red').html("Oops! An unexpected error occurred. Pls try again");
            }
        }).fail(function(){
            //call function to check online status and show necessary error message
        });
    });
    
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
   
   //remove the red border on fields when they have a value
    $("#contactName, #contactEmail, #contactMsg").change(function(){
        $(this).val() ? $(this).css("borderColor", "") : $(this).css("borderColor", "red");
    });
});