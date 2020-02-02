<footer>
 Zielony <?php echo date('Y'); ?>   
 <br>
 ver 0.01 beta   

 
</footer>
<script type="text/javascript" src="js/jRating.jquery.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="js/vendor/jquery.ui.widget.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="js/jquery.fileupload-validate.js"></script>
<script>
/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : 'server/php/',
        uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .text('Processing...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: false,
        maxNumberOfFiles: 4 ,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 5000000, // 5 MB
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        data.context = $('<div/>').appendTo('#files');
        $.each(data.files, function (index, file) {
        var i ++ ;   
         alert(i); 
            var node = $('<div class="lewo"/>')
                    .append($('<span/>').text(file.name));
            if (!index) {
                node
                    .append('<br>')
                    .append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
        }
        
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            if (file.url) {
                var link = $('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url);
                $(data.context.children()[index])
                    .wrap(link);
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            }
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {
            var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});

$("[name='target']").click(function() {
 var valek =  $(this).attr('id');
 load(valek);
 
});


$('[id="potwierdz"]').click(function( event ) {
var ilosc = $('[id="nip"]').attr('maxlength') ;
var dlugosc = $('[id="nip"]').val().length;   
if (dlugosc == ilosc) { var ok = 1; } else {  var error1 = 1 ; var error = 1 ; }  


var ilosc2 = $('[id="nr_konta"]').attr('maxlength') ;
var dlugosc2 = $('[id="nr_konta"]').val().length;   
if (dlugosc2 == ilosc2) { var ok = 1; } else { var error = 1 ;  var error2 = 1 ; }  



if(error1 == 1) {
$('[id="nip"]').addClass("cyfry_spr");
var nip_error = '<strong>-nip jest nieprawidłowy musi zawierać 10 cyfr</strong><br>';
} else {  var nip_error = ''; }

if(error2 == 1) {
$('[id="nr_konta"]').addClass("cyfry_spr");
var konto_error = '<strong>-numer konta jest nieprawidłowy musi zawierać 12 cyfr</strong><br>';
} else {  var konto_error = ''; } 

if ($('[id="naz"]').val().length == 0) {
var error = 1 ;    
$('[id="naz"]').addClass("cyfry_spr");
var nazwa_error = '<strong>-pole nazwa firmy nie może być puste</strong><br>';
 
} else {
var ok = 1;    
var nazwa_error = '';
}

if ($('[id="kod1"]').val().length != 6) {
var error = 1 ;    
$('[id="kod1"]').addClass("cyfry_spr");
var kod1_error = '<strong>-kod pocztowy rejestracji działalności jest nieprawidłowy</strong><br>';
} else { var ok = 1 ; var kod1_error = '' }


if ($('[id="kod2"]').val().length != 6) {
var error = 1 ;    
$('[id="kod2"]').addClass("cyfry_spr");
var kod2_error = '<strong>-kod pocztowy wykonywania działalności jest nieprawidłowy</strong><br>';
} else { var ok = 1 ; var kod1_error = '' }

if(error == 1){
$('[id="alert"]').html('<span style="color:black">Komnikat o błędzie :</span> <br>' + nip_error + konto_error + nazwa_error + kod1_error + kod2_error);    
}


if(ok == 1){    $("#konto_add").submit();   } 
        
        });
   
   

 function load(valek){
 $.ajax({
        type: "POST",
        url: "content/add_form.php",
        data: {
            ids: valek,
            type: 5
        },
      
        success: function(result) {

             
        
        $('#add_load'+valek).html(result); 
        },
        error: function() {
                alert( "Wystąpił błąd w połączniu :(");
        }
    });    
     
     
 }
 
 
$('[id="user_prv"]').change( function(){
$('[id="naz_prv"]').val($('[id="user_prv"] option:selected').text()); 
});
 
 $('[id="update_roz"]').click( function(){
var valek2 = $.trim($('[id="select_roz"] option:selected').text());
var valek = $.trim($('[id="select_roz"]').val());
 location.href=$.trim('?page=slownik&update=1&id='+valek+"&opis="+valek2);
    });
    
    
    

 $('[id="update_branza"]').click( function(){
var valek2 = $.trim($('[id="select_branza"] option:selected').text());
var valek = $.trim($('[id="select_branza"]').val());
 location.href=$.trim('?page=slownik&update=2&id='+valek+"&opis="+valek2);
    });    
    


 $('[id="update_biznes"]').click( function(){
var valek2 = $.trim($('[id="select_biznes"] option:selected').text());
var valek = $.trim($('[id="select_biznes"]').val());
 location.href=$.trim('?page=slownik&update=3&id='+valek+"&opis="+valek2);
    });    
    

 
    
$("[name='target']").click(function() {
 var valek =  $(this).attr('id');
 load(valek);
 
});

            $('[id="telefony_ile"]').change(function(){  
                var ai =  $(this).val(); 
   if (ai > 1) { document.getElementById("kontakt1").style.display="block"; } else { document.getElementById("kontakt1").style.display="none"; }
   if (ai > 2) { document.getElementById("kontakt2").style.display="block"; } else { document.getElementById("kontakt2").style.display="none"; }
   if (ai > 3) { document.getElementById("kontakt3").style.display="block"; } else { document.getElementById("kontakt3").style.display="none"; }
   if (ai > 4) { document.getElementById("kontakt4").style.display="block"; } else { document.getElementById("kontakt4").style.display="none"; }
    });  
$('#autocomplete').autocomplete({
    serviceUrl: '/autocomplete/countries',
    onSelect: function (suggestion) {
        alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
    }
});
</script>    
</body>
</html>
      
