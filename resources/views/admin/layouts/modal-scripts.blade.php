<script>
       window.myBulkSelectCallback = function (data) {
            // the JSON data will come here 
          $.each(data, function(i, item) {

              $('#img-gallery').append('<div class="uploaded-image gimg"> <img src="'+data[i].absolute_url+'"> <span class="delete-image"><i class="fa fa-close"></i></span></div>');
              
          });
          
          var urls = [];
          $(".gimg").each(function() {  
              urls.push($(this).find('img').attr('src'));
          });
          $('#galleryimgval').val(urls);
        };
        
        $(document).on('click','.delete-image', function(){
          $(this).parents('.gimg').remove();
          
          var urls = [];
          $(".gimg").each(function() {  
              urls.push($(this).find('img').attr('src'));
          });
          $('#galleryimgval').val(urls);
           

        });



    $(document).ready(function() {
      


       $("button.alert-close").on('click',function(){
        $(this).parent().hide();
      });
        // Display City & attributes
      $(document).on('change','#country_ch',function () {
        var link = $(this).find(':selected').attr('data-href');
        if(link != "")
        {
          $('#city').load(link);
          $('#city').prop('disabled',false);
        }

      });
     // Display City Ends

    // Change Branches

        $('#store_ch').change(function(){
            var link = $(this).find(':selected').attr('data-href');    
            if(link){
              $.ajax({
                 type:"GET",
                 url:link,
                 success:function(res){               
                  if(res){

                      console.log(res);
                      $("#branch").empty();
                      
                     
                      $.each(res,function(key,value){
                          $("#branch").append('<option value="'+key+'">'+value+'</option>');
                      });
                      $("#branch").selectpicker('refresh');
                 
                  }else{
                     $("#branch").empty();
                  }
                 }
              });
            }else{
                  $("#branch").empty();
                 
            }      
        });
      // Display Branches Ends

        $('.summernote1').summernote({

            height: ($(window).height() - 800),
            focus: true,
            buttons: {
                filemanager: filemanager.btnSummernote
            },
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['fontsize', ['fontsize']],
                ['view', ['fullscreen']],
                ['custom', ['picture', 'filemanager']]
            ],
        });
        $('.summernote2').summernote({
            height: ($('.summernote2').attr('height')),
            focus: true,
            buttons: {
                filemanager: filemanager.btnSummernote
            },
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['fontsize', ['fontsize']],
                ['view', ['fullscreen']],
                ['custom', ['picture', 'filemanager']]
            ],
        });


        $('.summernote3').summernote({
            height: ($(window).height() - 800),
            focus: true,
            buttons: {
                filemanager: filemanager.btnSummernote
            },
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['fontsize', ['fontsize']],
                ['view', ['fullscreen']],
                ['custom', ['picture', 'filemanager']]
            ],
        });

        $('.summernote4').summernote({
            height: ($('.summernote2').attr('height')),
            focus: true,
            buttons: {
                filemanager: filemanager.btnSummernote
            },
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['fontsize', ['fontsize']],
                ['view', ['fullscreen']],
                ['custom', ['picture', 'filemanager']]
            ],
        });
        window.addEventListener('filemanager.select', function (e) {
            var data = e.detail.data;
            var first = data.note.split("%")[0];
             // alert(data.note.substr(0,data.note.indexOf(' ')));
            $(first).summernote('editor.insertImage', data.absolute_url);
        });

        





        $(document).ready(function() {
            //set initial state.
            $('.end_date_chk').on('click',function() {
                if(this.checked) {
                   $('.end_date_status').removeClass('not-show');
                }
                else{
                    $('.end_date_status').addClass('not-show');
                }      
            });
            $('.start_date_chk').on('click',function() {
                if(this.checked) {
                   $('.start_date_status').removeClass('not-show');
                }
                else{
                    $('.start_date_status').addClass('not-show');
                }      
            });

            $('.featured_chk').on('click',function() {
                if(this.checked) {
                   $('.featured_status').removeClass('not-show');
                }
                else{
                    console.log(11);
                    $('.featured_status').addClass('not-show');
                }      
            });
        });


    })

</script>

