var pwd = document.getElementById('pwdSU');
var eye = document.getElementById('eye');

eye.addEventListener('click',togglePass);

function togglePass()
{
    eye.classList.toggle('active');

    (pwd.type == 'password') ? pwd.type = 'text' :
    pwd.type = 'password';
}

// Capitalize the first letter of first name's and last name's input
function uppercase(str) {
   return str.split(/\s+/).map(s => s.charAt(0).toUpperCase() + s.substring(1).toLowerCase()).join(" ");
}

// Analyse the user's lastname and firstname's field
function namesInput(bool, str) {
    var nLength = str.length;
    var label = "";

    if( bool == 0 ) label = "nom";
    else label = "prenom";

    if( nLength == 0 ) {
        $("#"+label+"Help").text("Votre "+label+" n'est pas renseigné.");
        $("#"+label+"SU").css("border-color","red");
        return -1;
    }
    else {
        for(var i=0; i<10; i++){
            if( !(str.includes(i.toString())) ) {
                $("#"+label+"Help").text("");
                $("#"+label+"SU").css("border-color","green");
                $("#"+label+"SU").val( uppercase(str) );
            }
            else {
                $("#"+label+"Help").text("La saisie n'est pas correcte.");
                $("#"+label+"SU").css("border-color","red");  
                break;
            }
        }   
    }
    
}

// Show user wether he wrote in the last name input
$("#nomSU").keyup(function(){
    var str = $(this).val();
    namesInput(0, str);
});


// Show user wether he wrote in the first name input
$("#prenomSU").keyup(function(){
    var str = $(this).val();
    namesInput(1, str);
});


// Show user wether he wrote a right email adress
$("#mailSU").keyup(function(){
    var str = $(this).val();

    if( str == '' ) {
        $("#emailHelp").text("Votre mail n'est pas renseigné.");
        $(this).css("border-color","red");
    }
    else {
        if( (str.includes('.fr') || str.includes('.com') || str.includes('.net')) && str.includes('@') ) {
            $("#emailHelp").html("");
            $(this).css("border-color","green");
        }
        else {
            $("#emailHelp").text("Ceci n'est pas une adresse mail.");
            $(this).css("border-color","red");
        } 
    }
});


// Show user wether he wrote a password between 6 and 20 characters
$("#pwdSU").keyup(function(){
    var pwdLength = $(this).val().length;

    if( pwdLength == 0 ) {
        $("#pwdHelp").text("Minimum 6 caractères.");
        $(this).css("border-color","red");
    } 
    else {
        if( pwdLength >= 6 ) {
            $("#pwdHelp").text("");
            $(this).css("border-color","green");
        }
        else {
            $("#pwdHelp").text("Ce mot de passe contient moins de 6 caractères");
            $(this).css("border-color","red");
        }
    }
});


// Show user wether he wrote a phone number consisted of 10 figures
$("#numSU").keyup(function(){
    var str = $(this).val();
    var numLength = str.length;

    if( numLength == 0 ) {
        $("#numHelp").text("");  
        $(this).css("border-color","red"); 
    }
    else {
        if( str%1 == 0 && str.charAt(0) == "0" ) {
            if( numLength < 10 ) {
                $("#numHelp").text("Ce numéro contient moins de 10 chiffres.");
                $(this).css("border-color","red");
            }
            else {
                $("#numHelp").text("");   
                $(this).css("border-color","green");
            }      
        }
        else {
            $("#numHelp").text("La saisie n'est pas un numéro de téléphone.");
            $(this).css("border-color","red");
        }
    }
});


$( function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 500
      },
      hide: {
        effect: "explode",
        duration: 500
      }
    });
 
    $( "#btnSbmtSU" ).on( "click", function() {
      $( "#dialog" ).dialog( "open" );
    });
  } );

