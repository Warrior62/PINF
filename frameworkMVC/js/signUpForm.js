// Capitalize the first letter of first name's and last name's input
function enMajuscule(str) 
{
   return str.split(/\s+/).map(s => s.charAt(0).toUpperCase() + s.substring(1).toLowerCase()).join(" ");
}

// Show user if he wrote in the last name input
$("#nomSU").keyup(function(){
    var longueur = $(this).val().length;
    
    if( longueur == 0 ) {
        $("#nomHelp").text("Votre nom n'est pas renseigné.");
        $(this).css("border-color","lightgrey");
    }
    else {
        $("#nomHelp").text("");
        $(this).css("border-color","green");
    }

    $(this).val( enMajuscule( $(this).val() ) );
});


// Show user if he wrote in the first name input
$("#prenomSU").keyup(function(){
    var longueur = $(this).val().length;
    
    if( longueur == 0 ) {
        $("#prenomHelp").text("Votre prénom n'est pas renseigné.");
        $(this).css("border-color","lightgrey");
    }
    else {
        $("#prenomHelp").text("");
        $(this).css("border-color","green");
    }

    $(this).val( enMajuscule( $(this).val() ) );
});


// Show user if he wrote a right email adress
$("#mailSU").keyup(function(){
    var str = $(this).val();

    if( (str.includes('.fr') || str.includes('.com') || str.includes('.net')) && str.includes('@') ) {
        $("#emailHelp").html("");
        $(this).css("border-color","green");
    }
    else {
        $("#emailHelp").text("Ceci n'est pas une adresse mail.");
        $(this).css("border-color","lightgrey");
    } 

    if( str == '' ) {
        $("#emailHelp").html("");
        $(this).css("border-color","lightgrey");
    }
});


// Show user if he wrote a password between 6 and 20 characters
$("#pwdSU").keyup(function(){
    var longueur = $(this).val().length;

    if( longueur >= 6 && longueur <= 20 ) {
        $("#pwdHelp").text("");
        $(this).css("border-color","green");
    }
    else {
        $("#pwdHelp").text("Ce mot de passe contient moins de 6 caractères");
        $(this).css("border-color","lightgrey");
    }
    
    if( longueur == 0 ) {
        $("#pwdHelp").text("Entre 6 et 20 caractères.");
        $(this).css("border-color","lightgrey");
    } 
});


// Show user if he wrote a phone number consisted of 10 figures
$("#numSU").keyup(function(){
    var longueur = $(this).val().length;

    if( longueur < 10 ) {
        $("#numHelp").text("Ce numéro contient moins de 10 chiffres.");
        $(this).css("border-color","lightgrey");
    }
    else {
        $("#numHelp").text("");   
        $(this).css("border-color","green");
    }
        
    if( longueur == 0 ) {
        $("#numHelp").text("");   
        $(this).css("border-color","lightgrey");
    }
});


