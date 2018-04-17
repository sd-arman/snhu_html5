$(document).ready(function() 
{
    $.ajax(
    {
        url: "http://192.168.86.1/api/v1/welcome-mat"
    }).then((function(data) 
    {
//    	console.log('Testing console');
//    	console.log(data.requesterInfo[1].onGuestNetwork);)
       $('.greeting-enabled').append(data.requesterInfo[1].onGuestNetwork);
 //      $('.greeting-guest').append(data.enabled);
    });
});