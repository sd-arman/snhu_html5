//var myUrl = 'https://emergencycallworks.atlassian.net/rest/api/2/issue/MASS-1900';
//var proxy = 'https://cors-anywhere.herokuapp.com/';

$(document).ready(function()
{
    $.ajax(
    {
    	headers: 
    	{ 
    		"X-Atlassian-Token":"I8AXoP9ZU5TdlcL1VeQe8A8F",
    		"Accept": "application/json",
    		"Cache-Control": "no-cache",
    		"Access-Control-Allow-Origin": "https://emergencycallworks.atlassian.net"
    	},
    	type: 'GET',
//    	url: proxy + myUrl,
    	contentType: "application/jsonp",
		crossDomain: true,
		dataType: 'jsonp',
		jsonp: 'jsonp-callback'
    	url: "https://emergencycallworks.atlassian.net/rest/api/2/issue/MASS-2865"
    }).then(function(data) 
    {
       $('.greeting-self').append(data.id);
//       $('.greeting-name').append(data.id)
//       $('.greeting-resolution').append(data.self);
    });
});