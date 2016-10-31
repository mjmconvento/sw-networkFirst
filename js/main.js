$(document).ready(function() {
    console.log('ready');

    if ('serviceWorker' in navigator) {
        console.log("Will service worker register?");
        navigator.serviceWorker.register('./serviceworker.js').then( reg => {
            console.log("Yes it did.");
        }).catch( err => {
             console.log("No it didn't. This happened: ", err);
        });
    }



    fetch('./php_actions/get_notifications.php').then(function(response) {
        response.json().then(function(data) {

            var append = '';
      
            for (var x = 0; x < data.length; x++) {
                append += '<div><span class="title">Title: </span> ' + data[x].title + '</div>'; 
                append += '<div><span class="body">Message: </span> ' + data[x].body + '</div>'; 
                append += '<div><span class="url">URL: </span> ' + data[x].url + '</div>'; 
                append += '<br/>'; 
            }

            $('div.posts').append(append);
        });
    });



    fetch('./php_actions/get_subscriptions.php').then(function(response) {
        response.json().then(function(data) {
            // console.log(data);
            var append = '';
      
            for (var x = 0; x < data.length; x++) {
                append += '<li class="registered">' + data[x].username + '</li>';
            }

            $('ul.registered-list').append(append);
        });
    });

    fetch('./php_actions/get_subscriptions_even.php').then(function(response) {
        response.json().then(function(data) {

            var append = '';
      
            for (var x = 0; x < data.length; x++) {
                append += '<li class="online"><span>' + data[x].username + '</span></li>';
            }

            $('ul.list-active').append(append);
        });
    });


}); 
