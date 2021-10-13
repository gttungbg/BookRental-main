        <!-- JAVASCRIPT -->
        <script src="{{ URL::asset('libs/jquery/jquery.min.js')}}"></script>
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> --}}
        <script src="{{ URL::asset('libs/bootstrap/bootstrap.min.js')}}"></script>
        <script src="{{ URL::asset('libs/metismenu/metismenu.min.js')}}"></script>
        <script src="{{ URL::asset('libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ URL::asset('libs/node-waves/node-waves.min.js')}}"></script>
        <script src="{{ URL::asset('ckeditor/ckeditor.js')}}"></script>

     <!--    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
        <script src="{{ URL::asset('dist/js/notify.js')}}"></script> --}}
        
        <script src="{{URL::asset('/dist/js/alertify.js')}}"></script>
        <script src="{{URL::asset('/dist/js/alertify.min.js')}}"></script> -->
        <script src="{{URL::asset('/dist/js/jquery.nestable.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="{{ asset('js/all1.js') }}" defer></script>

        {{-- <script src="{{URL::asset('/libs/select2/select2.min.js')}}"></script> --}}
        @yield('script')

        <!-- App js -->
        <script src="{{ URL::asset('js/app.min.js')}}"></script>
        <script src="{{URL::asset('/libs/select2/select2.min.js')}}"></script>
        <script src="{{URL::asset('/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{URL::asset('/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
        <script src="{{URL::asset('/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
        <script src="{{URL::asset('/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

        <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
        <script src="http://qovex-v.laravel.themesbrand.com/libs/simplebar/simplebar.min.js"></script>

        <!-- form advanced init -->
        <script src="{{URL::asset('/js/pages/form-advanced.init.js')}}"></script>

        <script src="{{ URL::asset('/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
        <!-- Summernote js -->
        <script src="{{ URL::asset('/libs/summernote/summernote.min.js')}}"></script>
        <!-- form repeater js -->
        <script src="{{ URL::asset('/libs/jquery-repeater/jquery-repeater.min.js')}}"></script>
        <script src="{{ URL::asset('/js/pages/task-create.init.js')}}"></script>
       {{--  <script>
            (function() {
                'use strict';
                window.addEventListener('load', function() {

                    // Get the forms we want to add validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission


                    var validation = Array.prototype.filter.call(forms, function(form) {

                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }

                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);

            })();
        </script> --}}

        @yield('script-bottom')
        <script>
            $("input").on("keypress",function(e){
                var val = $(this).val();
                var regex = /(<[^>]*(>|$))/ig;
                // var regex = /<(/)?(body|html|head|p|b|strong|a|i|span|div)*>/ig;
                var result = val.replace(regex, "");
                $(this).val(result);
            });
        </script>

        <script>
            CKEDITOR.replace( 'content' );
            $(window).on('load', function (){
                $( '#content' ).ckeditor();
            });
        </script>
        <script>
            var toggler = document.getElementsByClassName("caret");
            var i;

            for (i = 0; i < toggler.length; i++) {
              toggler[i].addEventListener("click", function() {
                this.parentElement.querySelector(".nested").classList.toggle("active");
                this.classList.toggle("caret-down");
              });
            }
        </script>
        <script>    
            $("#a-add-cate").click(function () {
                if ($("#add-cate").is(":hidden")){
                    $("#add-cate").show();
                }else {
                     $("#add-cate").hide();
                }
            });

            var isMultiSelected = true;
            $("input:checkbox").on('click', function() {
              // in the handler, 'this' refers to the box clicked on
              if (isMultiSelected == false) {
                var $box = $(this);
                  if ($box.is(":checked")) {
                    // the name of the box is retrieved using the .attr() method
                    // as it is assumed and expected to be immutable
                    var group = "input:checkbox[name='" + $box.attr("name") + "']";
                    // the checked state of the group/box on the other hand will change
                    // and the current value is retrieved using .prop() method
                    $(group).prop("checked", false);
                    $box.prop("checked", true);
                  }else {
                    $box.prop("checked", false);
                  }
              }
            });
            $('#selectoneimage').on('click',function(){
                $('#myModal').modal('show');
                isMultiSelected = false;
            });
            $('#selectFavicon').on('click',function(){
                $('#myModal').modal('show');
                isMultiSelected = false;
            });
            $('#selectShareIcon').on('click',function(){
                $('#myModal1').modal('show');
                isMultiSelected = false;
            });

        $('#btn-oke').on('click',function(){
            if (isMultiSelected == true) {
                var $boxes = $('input[name=media_id]:checked');
                var id_imgs=[];
                $('#div_albumb').empty();
                $boxes.each(function(){
                    img_id = $(this).val();
                    // alert(img_id);
                    ///Do stuff here with this
                    var img = "<img src='" + $('#img_' + img_id).attr("src") + "' width='50px' height='50px'>";
                    $('#div_albumb').append(img);
                    id_imgs.push(img_id);
                });

                $('#albumb_id').val(id_imgs);
                    // alert(id_imgs);
            }else {
                var img_id = $('input[name=media_id]:checked').val();
                //alert(img_id);
                $('#img_product').attr("src", $('#img_' + img_id).attr("src"));
                $('#image_pro').val(img_id);
                // alert(img_id);
            }
        });
        $('#btn-oke-product').on('click',function(){
            if (isMultiSelected == true) {
                var $boxes = $('input[name=media_id]:checked');
                var id_imgs=[];
                $('#div_albumb').empty();
                $boxes.each(function(){
                    img_id = $(this).val();
                    // alert(img_id);
                    ///Do stuff here with this
                    var img = "<img src='" + $('#img_' + img_id).attr("src") + "' width='50px' height='50px'>";
                    $('#div_albumb').append(img);
                    id_imgs.push(img_id);
                });
                $('#albumb_id').val(id_imgs);
                    // alert(id_imgs);
            }else {
                var img_id = $('input[name=media_id]:checked').val();
                //alert(img_id);
                $('#img_product').attr("src", $('#img_' + img_id).attr("src"));
                $('#image_pro').val(img_id);
            }
        });
        
         $('#btn-oke-share').on('click',function(){
                var $boxess1 = $('input[name=share_icon_c]:checked');
                var id_img;
                $('#share_icon_s').empty();
                $boxess1.each(function(){
                img_id2 = $(this).val();
                    ///Do stuff here with this
                    var img = "<br><img src='" + $('#img_' + img_id2).attr("src") + "' width='150px' height='150px'>";
                    $('#share_icon_s').append(img);
                });
                $('#hidden_media_share_icon').val($boxess1.val());
        });
        $('#btn-oke-favicon').on('click',function(){
                var $boxess2 = $('input[name=favicon]:checked');
                var id_img;
                $('#share_icon_fa').empty();
                $boxess2.each(function(){
                    img_id1 = $(this).val();
                    ///Do stuff here with this
                    var img = "<br><img src='" + $('#img_' + img_id1).attr("src") + "' width='150px' height='150px'>";
                    $('#share_icon_fa').append(img);
                });
                 $('#hidden_media_favicon').val($boxess2.val());
        });
        // function check_checkbox(checkbox){
        //     if (this.checked) {
        //          $('input[name="product_id"]').each(function() {
        //              this.checked = true;                        
        //          });
        //      } else {
        //       $('input[name="product_id"]').each(function() {
        //          this.checked = false;                        
        //      });
        //     }
    </script>

    {{--load image --}}
    {{-- <script type="text/javascript">
        $.ajax({
            url:"{{route('media.store')}}",
            success::function(data)
            {
                $('#img-row').append()
            }
        })
    </script> --}}

    <script type="text/javascript">
        $('#add_image').on('click',function(){
           window.location.reload();
        }); 
    Dropzone.options.dropzone =
    {
        maxFilesize: 2, // MB
        maxFiles: 4,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        dictFileTooBig: 'Image is larger than 2MB',
        timeout: 10000,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
           return time+file.name;
        },
        init: function() {
            this.on('success', function(){
                if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                        // location.reload();
                }
            });
        },
       
        success: function(file, response) 
        {
            console.log(response);
        },
        error: function(file, response)
        {
           return false;
        }
    };
</script>
    

   