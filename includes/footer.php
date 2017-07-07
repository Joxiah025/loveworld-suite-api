<!--Main Footer-->
    <footer class="main-footer footer-style-two" style="background-image:url(images/background/footer-style-two.jpg);">
    	
        <!--Footer Upper-->        
        <div class="footer-upper">
            <div class="auto-container">
                <div class="row clearfix">
                	
                    <div class="col-sm-6 col-xs-12 column">
                        <div class="footer-widget brighton-widget">
                            
                            <div class="sec-title-three">
                                <h2>About Gogie Petroleum</h2>
                            </div>
                            
                            <div class="text">
                                Our Vision is to be the Nigerian company of choice in the provision of high value Training and technical support services to the Nigerian Oil & Gas sector. Our Mission is to invest in specialized assets, and through the Extended Enterprise Concept develop competences to provide a spectrum of services to Organization, Schools, as well as the Oil & Gas industry.
                            </div>
                            
                           
                        
                        </div>
                    </div>
                    
                    
                    <div class="col-sm-offset-1 col-sm-4 col-xs-12">
                    	<div class="footer-widget">
                            <div class="sec-title-three">
                                <h2>Contact Us</h2>
                            </div>
                            
                        
                        	 <!--social-style-one-->
                            <ul class="social-style-one">
                                <li><a class="fa fa-facebook-f" href="#"></a></li>
                                <li><a class="fa fa-twitter" href="#"></a></li>
                                <li><a class="fa fa-google-plus" href="#"></a></li>
                                <li><a class="fa fa-flickr" href="#"></a></li>
                                <li><a class="fa fa-linkedin" href="#"></a></li>
                            </ul>
                        
            			</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Footer Bottom-->
    	<div class="footer-bottom">
            <div class="auto-container">
                <!--Copyright-->
                <div class="text-center">
                	<div class="copyright">Copyrights &copy; <?php echo date("Y");?> Gogie Petroleum. Powered by <a href="http://pearlstack.com" target="_blank">Pearlstack</a></div>
                </div>
                
            </div>
        </div>
        
    </footer>
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="icon fa fa-long-arrow-up"></span></div>


<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script src="js/revolution.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/validate.js"></script>
<script src="js/isotope.js"></script>
<script src="js/script.js"></script>
<script>
$("#contactForm").submit(function(e){
   e.preventDefault();
   var $data = $(this).serialize();
   $(".btn-submit").prop('disabled', true).html('<i class="fa fa-spinner fa-pulse"></i> Please Wait...');
    $.post('includes/email.php', $data,function(resp){
        if(resp.status == 200){
          $(".btn-submit").prop('disabled', false).html('SEND MESSAGE');
            $("#contactForm")[0].reset();
            $('.contact-info').html('<div class="alert alert-success">'+resp.message+'<button class="close" data-dismiss="alert">&times;</button></div>');
        }else{
           $(".btn-submit").prop('disabled', false).html('SEND MESSAGE');
            $('.contact-info').html('<div class="alert alert-warning">'+resp.message+'<button class="close" data-dismiss="alert">&times;</button></div>');
        }
    },'json');
});
</script>
</body>

</html>