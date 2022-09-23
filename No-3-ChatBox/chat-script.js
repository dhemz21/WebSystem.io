function ajax(){
/*
    Work by Dhemler A. Omapas
*/
/*
    The code below request data from the server by calling chat-display.php, data requested is then shown to the user.
*/
  $.ajax({url: "chat-display.php", success: function(result){
    $('#chat').html(result);
  }});
}

setInterval(function(){ajax();},1000);
