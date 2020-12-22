      <script src="<?=base_url();?>file/js/vendor/jquery-2.2.4.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="<?=base_url();?>file/js/vendor/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
      <script src="<?=base_url();?>file/js/easing.min.js"></script>
      <script src="<?=base_url();?>file/js/hoverIntent.js"></script>
      <script src="<?=base_url();?>file/js/superfish.min.js"></script>
      <script src="<?=base_url();?>file/js/jquery.ajaxchimp.min.js"></script>
      <script src="<?=base_url();?>file/js/jquery.magnific-popup.min.js"></script>
      <script src="<?=base_url();?>file/js/owl.carousel.min.js"></script>
      <script src="<?=base_url();?>file/js/parallax.min.js"></script>
      <script src="<?=base_url();?>file/js/jquery.nice-select.min.js"></script>
      <script src="<?=base_url();?>file/js/jquery.counterup.min.js"></script>
      <script src="<?=base_url();?>file/js/waypoints.min.js"></script>
      <script src="<?=base_url();?>file/js/mail-script.js"></script>
      <script src="<?=base_url();?>file/js/main.js"></script>
      <script src="https://unpkg.com/popper.js@1"></script>
      <script src="https://unpkg.com/tippy.js@4"></script>
      <script type="text/javascript">
         tippy('#my1', {
         content: "Account",
         placement: 'right',
         });
         tippy('#my2', {
         content: "View Calendar",
         placement: 'right',
         });
         tippy('#my3', {
         content: "Send Us A File",
         placement: 'right',
         });
         tippy('#my4', {
         content: "Call Us",
         placement: 'right',
         });
         tippy('#my5', {
         content: "Find Us",
         placement: 'right',
         });
      </script>
      <script type="text/javascript">
         /*global $ */
         $(document).ready(function () {

         			"use strict";

         			$('.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');
         //Checks if li has sub (ul) and adds class for toggle icon - just an UI


         			$('.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');
         //Checks if drodown menu's li elements have anothere level (ul), if not the dropdown is shown as regular dropdown, not a mega menu (thanks Luka Kladaric)

         			$(".menu > ul").before("<a href=\"#\" class=\"menu-mobile\"></a>");

         //Adds menu-mobile class (for mobile toggle menu) before the normal menu
         //Mobile menu is hidden if width is more then 959px, but normal menu is displayed
         //Normal menu is hidden if width is below 959px, and jquery adds mobile menu
         //Done this way so it can be used with wordpress without any trouble

         			$(".menu > ul > li").hover(function (e) {
             		if ($(window).width() > 943) {
                 		$(this).children("ul").stop(true, false).fadeToggle(150);
                 		e.preventDefault();
             		}
         			});
         //If width is more than 943px dropdowns are displayed on hover

         			$(".menu > ul > li").click(function () {
             		if ($(window).width() <= 943) {
                 		$(this).children("ul").fadeToggle(150);
             		}
         			});
         //If width is less or equal to 943px dropdowns are displayed on click (thanks Aman Jain from stackoverflow)

         			$(".menu-mobile").click(function (e) {
             		$(".menu > ul").toggleClass('show-on-mobile');
             		e.preventDefault();
         			});
         //when clicked on mobile-menu, normal menu is shown as a list, classic rwd menu story (thanks mwl from stackoverflow)

         });
      </script>
   </body>
</html>
<!-- GTranslate: https://gtranslate.io/ -->
<style type="text/css">
   #goog-gt-tt {display:none !important;}
   .goog-te-banner-frame {display:none !important;}
   .goog-te-menu-value:hover {text-decoration:none !important;
   }
   }
   body {top:0 !important;}
</style>
<script type="text/javascript">
   function googleTranslateElementInit() {new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE,autoDisplay: false, includedLanguages: ''}, 'google_translate_element');}
</script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
