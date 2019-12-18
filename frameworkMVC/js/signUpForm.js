// Show user if he wrote a right email adress
$("#mailSU").keyup(function(e){
    var str = $(this).val();
    if( str.includes('.fr') || str.includes('.com') || str.includes('.net') ) {
        $(this).css('color','initial');
        $("#emailHelp").text("exemple: dupont@gmail.com");
    }
    else {
        $(this).css('color','rgba(255,0,0,0.8)');
        $("#emailHelp").text("Ceci n'est pas une adresse mail.");
    }

    if( str=='' ) {
        $(this).css('color','initial');
        $("#emailHelp").text("exemple: dupont@gmail.com");
    }
});