function afficher_menu(){
	document.getElementById("menu").style.display="block";
}

function fermer_menu(){
	document.getElementById("menu").style.display="none";
}
/*
$("#img_help").mouseover(function(){
    $(this).hide();
    $("#img_help2").show();
});

$("#img_help2").mouseout(function(){
    $(this).hide();
    $("#img_help").show();
});
*/
$("#link_help").mouseover(function(){
    $("#img_help").hide();
    $("#img_help2").show();
});

$("#link_help").mouseout(function(){
    $("#img_help2").hide();
    $("#img_help").show();
});

$("#form_newsletter").submit(function(e){
    
    var message_error='';
    var nom = $("#form_newsletter #nom [type='submit']").val();
    var email = $("#form_newsletter #email").val();
    var prenom = $("#form_newsletter #prenom").val();

    $("#alert_newsletter").hide();

    if(nom==""){
        message_error=message_error+"Saisir le nom<br />";
    }
    if(prenom==""){
        message_error=message_error+"Saisir le prénom<br />";
    }
    if(email==""){
        message_error=message_error+"Saisir l'email<br />";
    }
    if(message_error!=""){
        $("#alert_newsletter").html(message_error);
        $("#alert_newsletter").show();
        e.preventDefault();
    }
       
});