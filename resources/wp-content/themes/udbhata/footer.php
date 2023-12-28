      

 
     <footer>
         <div class="container">
            <div class="row">
               <div class="col-sm-4 text-sm-left text-center">
                  <p>&copy; 2023 - All rights reserved to Udbhata Technologies Pvt Ltd.</p>
               </div>
		<div class="col-sm-4">
                  <ul class="social-icons text-center mb-sm-0 mt-sm-0 mb-3 mt-3">
                      <li><a href="https://www.facebook.com/udbhata/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                  </ul>
               </div>
                <div class="col-sm-4">
                  <p class="text-sm-right text-center"><a href ="https://udbhata.com/privacy.html" style="color: #fff">Privacy Policy</a></p>
               </div>
            </div>
         </div>
      </footer>



 <script src="<?php echo home_url();?>/assets/js/jquery-2.1.1.js"></script> 
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
          <script src="https://cdn.jsdelivr.net/jquery.validation/1.13.1/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.13.1/additional-methods.min.js"></script>

      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>
<script type="text/javascript">
   $('.submit-contact-us').click(function(){ 
   $(".contact-us-form").validate({
   rules: {
   fname_2: {           
   required: true,   

   },
   lname_2: {              
   required: true,  

   },
   email_id_2: {           
   required: true,   

   },
   phone_number_2: {           
   required: true,

   }
   },
   messages: {              
required:true
   },
   submitHandler: function (form) {
      $.LoadingOverlay("show");
      $('#btn_pop_Submit').attr('disabled', true);
      $("form[name='form_contact_us']").submit();           
   }
   }); 
   $.LoadingOverlay("hide");
   });
</script>


      <script type="text/javascript">
         $(document).ready(function()
         {
           
            $(".contact_us").click(function(e)
            {
              e.preventDefault(); 
               $('html, body').animate({ scrollTop: $('#about-contact').offset().top - 120 }); }); 
            });

</script>
<script type="text/javascript">
         $(document).ready(function(){
           if($(window).width() <= 577){
          $('.inner-link').click(function()
         {
               $('.menu').css("opacity",0);
                $('.menuu').click(function()
         {
         
         $(".menu").css("opacity",1);
         });
             
         });
         }
         
         
         });
      </script>
      <script>
         window.onscroll = function() {myFunction()};
         
         var header = document.getElementById("Header");
         var sticky = header.offsetTop;
         
         function myFunction() {
           if (window.pageYOffset > sticky) {
             header.classList.add("sticky");
           } else {
             header.classList.remove("sticky");
           }
         }
      </script>
<?php wp_footer(); ?>
<link rel="stylesheet preload" type="text/css" href="<?php echo get_template_directory_uri();?>/assets/css/cookiebanner.css" >
</body>
</html>