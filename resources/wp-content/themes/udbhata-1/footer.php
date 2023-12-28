      

 <section class="contact-us" id="about-contact">
         <div class="container">
            <h2 class="text-center" >Contact </h2>
            <div class="row contact-us-">
               <div class="col-lg-2"></div>
               <div class="col-sm-6 col-md-6 col-lg-4">
                  <h4>Corporate office</h4>
                  <p class="corporate-office"> Udbhata Technologies </p>
                  <p class="corporate-office">91 Springboard, LVS Arcade, Plot #71, Jubilee Enclave,
                     Hitech City, Madhapur, Hyderabad, Telangana 500081, India.
                  </p>
                  <p class="contact-us-phone">
                     Tel : +91 9121004559
                  </p>
                  <p class="contact-us-email">info@udbhata.com</p>
                 <!--  <p class="contact-us-icon">
                     <i class="fa fa-linkedin"></i>
                     <i class="fa fa-twitter"></i>
                  </p> -->
               </div>
               <div class="col-sm-6 col-md-6 col-lg-4">
                   <h4 class="call-back"><small>Fill in the form to</small><br>Seek a 30 min discovery call</h4>
                 <form class="footer-form leadform contact-us-form submit-contact-us" name="form_contact_us" id="leadform" method="POST" enctype="multipart/form-data" action="<?php echo home_url();?>/leadgrab.php">
                     <div class="row row-footer-form">
                        <div class="col-sm-6">
                     <div class="form-group form_name">
                        <input type="text" name="fname" id="fname" class="first_name" placeholder="First Name*" value="" required="required">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group form_name">
                        <input type="text" name="lname" id="lname" placeholder="Last Name*" class="last_name" value="" required="required">
                     </div>
                  </div>
                  </div>
                     <div class="form-group">
                        <input type="email" name="email" id="email_id" placeholder="Email*" class="email_id" value="" required="required">
                     </div>
                     <div class="form-group">
                        <input type="tel" name="phone" id="phone_number" placeholder="Phone number *" value="" class="phone_number" required="required" maxlength=10 minlength=10>
                     </div>
                     <div class="form-group">
                       <textarea rows="4"  name="messages" id="messages" class="messages" placeholder="How can we help you? *" required="required"></textarea>
    </div>
                     <button type="submit" id="btn_contact_Submit" class="ajaxFormButton formSubmit">Reach us</button>
                     <input type="hidden" id="leadutmsource" name="leadutmsource" value="" />
                     <input type="hidden" id="leadutmcampaign" name="leadutmcampaign" value=""/>
                     <input type="hidden" id="leadutmmedium" name="leadutmmedium" value="" />
                     <input type="hidden" id="leadutmterm" name="leadutmterm" value="" />
					 <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                  </form>
               </div>
               <div class="col-lg-2"></div>
            </div>
         </div>
      </section>
     <footer>
         <div class="container">
            <div class="row">
               <div class="col-sm-6">
                  <p class="text-center">&copy; 2019 - All rights reserved to Udbhata Technologies Pvt Ltd.</p>
               </div>
                <div class="col-sm-6">
                  <p class="text-center"><a href ="http://www.udbhata.com/privacy.html" style="color: #fff">Privacy Policy</a></p>
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