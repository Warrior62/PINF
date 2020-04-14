  <title>PANNEL GALERIE</title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<body>
  <div class="container">
    <div class="row text-center mt-5 mb-5 w-75" style="margin:auto">
      <div class="col-4">
        <hr class="w-50">
      </div>
      <div class="col-4">
        <p class="h4 text-center">Voici le contenu de votre galerie</p>
      </div>
      <div class="col-4">
        <hr class="w-50">
      </div>
    </div>
    <br />
    
    <form action="uploadimg.php" class="dropzone" id="dropzoneFrom"></form>
    
    <br /><br />

    <div text-align="center">
      <button type="button" class="btn btn-outline-secondary" id="submit-all">Envoyer</button>
    </div>

    <br /><br />

    <div id="idGalerie"></div>
    <br /><br />
  </div>
 
</body>
<script>

$(document).ready(function(){
  //Gestion des messages par défaut
  Dropzone.prototype.defaultOptions.dictDefaultMessage = "Déposez vos fichier ou cliquez ici !";
  Dropzone.prototype.defaultOptions.dictFallbackMessage = "Votre navigateur ne supporte pas le drag and drop";
  Dropzone.prototype.defaultOptions.dictFallbackText = "Please use the fallback form below to upload your files like in the olden days.";
  Dropzone.prototype.defaultOptions.dictFileTooBig = "Fichier trop volumineux ({{filesize}}MiB). Taille maximale: {{maxFilesize}}MiB.";
  Dropzone.prototype.defaultOptions.dictInvalidFileType = "Vous ne pouvez pas upload ce type de fichiers.";
  Dropzone.prototype.defaultOptions.dictResponseError = "Le serveur a envoyé un code : {{statusCode}} .";
  Dropzone.prototype.defaultOptions.dictCancelUpload = "Upload annulé";
  Dropzone.prototype.defaultOptions.dictCancelUploadConfirmation = "Voulez-vous vraiment annuler l'upload ?";
  Dropzone.prototype.defaultOptions.dictRemoveFile = "Supprimer le fichier";
  Dropzone.prototype.defaultOptions.dictMaxFilesExceeded = "Vous ne pouvez pas upload d'autres fichiers.";
   



 Dropzone.options.dropzoneFrom = {
  autoProcessQueue: false,
  acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
  init: function(){
   var submitButton = document.querySelector('#submit-all');
   myDropzone = this;
   submitButton.addEventListener("click", function(){
    myDropzone.processQueue();
   });

   this.on("complete", function(){
    if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
    {
     var _this = this;
     _this.removeAllFiles();
    }
    list_image();
   });
  },
 };

 list_image();

 function list_image()
 {
  $.ajax({
   url:"uploadimg.php",
   success:function(data){
    $('#idGalerie').html(data);
   }
  });
 }

 $(document).on('click', '.remove_image', function(){
  var name = $(this).attr('id');
  $.ajax({
   url:"uploadimg.php",
   method:"POST",
   data:{name:name},
   success:function(data)
   {
    list_image();
   }
  })
 });
 
});
</script>