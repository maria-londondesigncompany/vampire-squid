// <!-- Testimonial Swiper -->

    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        freeMode: true,
        navigation: {
            nextEl: ".swiper-button-before",
            prevEl: ".swiper-button-after",
        },

        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            // When window width is <= 1024px (typical desktop size)
            1024: {
                slidesPerView: 3,
                spaceBetween: 30, // Adjust as needed
            },
            // When window width is <= 768px (tablet size)
            768: {
                slidesPerView: 2,
                spaceBetween: 20, // Adjust as needed
            },
            // When window width is <= 480px (mobile size)
            300: {
                slidesPerView: 1,
                spaceBetween: 10, // Adjust as needed
            }
        }
    });


// Header Code

// jQuery(document).ready(function () {
//     var header = jQuery(".header-navigation");
//     var sticky = header.offset().top;
//     var isSticky = false;

//     function setHeaderPosition() {
//         if (window.pageYOffset > sticky && !isSticky) {
//             header.css({
//                 'position': 'fixed',
//                 'top': '-100px', // Move the header up by 100px to hide it initially
//                 'width': '100%' // Move the header up by 100px to hide it initially
//             }).animate({ 'top': '0' }, 300); // Smoothly move the header back to its position
//             isSticky = true;
//         } else if (window.pageYOffset <= sticky && isSticky) {
//             // Smoothly move the header back to its initial position
//             header.animate({ 'top': '-100px' }, 300, function() {
//                 header.css({
//                     'position': 'relative', // Reset position after animation
//                     'top': '0' // Ensure it's back to the initial position
//                 });
//             });
//             isSticky = false;
//         }
//     }

//     setHeaderPosition(); // Call on document ready

//     jQuery(window).resize(function () {
//         sticky = header.offset().top;
//         setHeaderPosition(); // Call on window resize
//     });

//     jQuery(window).scroll(function () {
//         setHeaderPosition(); // Call on scroll
//     });
// });






// jQuery(document).ready(function () {
//     // Check if the body does not contain both classes
//     if (!jQuery('body').hasClass('woocommerce-account')) {
//         var header = jQuery(".header-navigation");
//         var sticky = header.offset().top;

//         function setHeaderPosition() {
//             var homePageUrl = window.location.origin + "/"; // Get the home page URL dynamically
//             // Add condition to check if it's the specific page where you want position absolute
//             if (window.location.pathname === homePageUrl) {
//                 header.css({
//                     'position': 'absolute',
//                     'top': '0',
//                     'width': '100%',
//                     'z-index': '1000'
//                 });
//             } else {
//                 if (window.innerWidth <= 767) {
//                     header.css({
//                         'position': 'relative'
//                     });
//                 } else {
//                     if (window.pageYOffset > sticky) {
//                         header.css({
//                             'position': 'fixed',
//                             'top': '0',
//                             'width': '100%',
//                             'z-index': '1000'
//                         });
//                     } else {
//                         header.css({
//                             'position': 'fixed',
//                             'width': '100%',
//                             'z-index': '1000'
//                         });
//                     }
//                 }
//             }
//         }

//         setHeaderPosition(); // Call on document ready

//         jQuery(window).resize(function() {
//             setHeaderPosition(); // Call on window resize
//         });

//         jQuery(window).scroll(function () {
//             if (window.innerWidth > 767 && window.location.pathname !== '/staging-websites/17110-vampire-squid-wp/') {
//                 if (window.pageYOffset > sticky) {
//                     header.css({
//                         'position': 'fixed',
//                         'top': '0',
//                         'width': '100%',
//                         'z-index': '1000'
//                     });
//                 } else {
//                     header.css({
//                         'position': 'relative',
//                         'width': '100%',
//                         'z-index': '1000'
//                     });
//                 }
//             }
//         });
//     }
// });







jQuery(document).ready(function() {
    // Select the element with the data-ajax attribute
    var $ajaxPostsLoad = jQuery('.post-filter-container .ajax-posts-load');
    // Add the new class dynamically
    $ajaxPostsLoad.addClass('d-flex flex-wrap align-items-center justify-content-center');
});



jQuery(document).ready(function($) {
    // Remove old class and add new class
    jQuery('.woocommerce-MyAccount-navigation-link--licenses i').removeClass('fa-shop').addClass('fa-file-invoice');
});


jQuery(document).ready(function() {
    jQuery('.sign-in-cta span').click(function() {
         jQuery('.signup-column-size').toggle();
         jQuery('.signin-column-size').toggle();
     });
 });

 jQuery(document).ready(function() {
    jQuery('.sign-up-cta span').click(function() {
         jQuery('.signin-column-size').toggle();
         jQuery('.signup-column-size').toggle();
     });
 });


 jQuery(document).ready(function () {
    jQuery('.add-payment-method-btn').click(function () {
        jQuery('.add-payment-method-section').show();
        jQuery('.paymentmethod-btnclickhidden-section').hide();
    });
});

jQuery(document).ready(function () {
    jQuery('.back-btn').click(function () {
        jQuery('.add-payment-method-section').hide();
        jQuery('.paymentmethod-btnclickhidden-section').show();
    });
});
jQuery(document).ready(function () {
    jQuery('.make-default-payment-method-btn').click(function () {
        // Remove "default" class from all elements
        jQuery('.payment-method-box').removeClass('default');

        // Add "default" class to the closest ancestor element
        jQuery(this).closest('.payment-method-box').addClass('default');

        // Reset text of all buttons
        jQuery('.make-default-payment-method-btn').css('font-weight', '').text('Make Default Payment Method');

        // Change text of the button within the element where "default" class is added
        jQuery(this).closest('.payment-method-box').find('.make-default-payment-method-btn').css('font-weight', 'bold').text('Default Payment Method');
    });
});

jQuery(document).ready(function () {
    jQuery(".remove-payment-method-button").click(function () {
        jQuery(this).closest(".col-md-4").remove();
    });
});



jQuery.noConflict();
jQuery(document).ready(function($){
    jQuery('.icon').click(function(){
        var textToCopy = jQuery(this).siblings('.text').text(); 
        copyToClipboard(textToCopy);
        var parentTd = jQuery(this).closest('td'); 
        jQuery(this).css('color', '#020202');
        jQuery(this).siblings('.text').css('color', '#020202'); 
        parentTd.css('background-color', '#C4FF00'); 
        var clickedIcon = jQuery(this);
        setTimeout(function(){
            clickedIcon.css('color', ''); 
            clickedIcon.siblings('.text').css('color', ''); 
            parentTd.css('background-color', ''); 
        }, 1500);
    });
    
    function copyToClipboard(text) {
        var tempInput = jQuery('<input>');
        jQuery('body').append(tempInput);
        tempInput.val(text).select();
        document.execCommand('copy');
        tempInput.remove();
    }
});


jQuery(document).ready(function(jQuery) {
    jQuery('.feature-container .row:odd').removeClass('black-bg').addClass('dark-grey-bg');
  });


  jQuery(document).ready(function() {
    // Find all elements with class .product-remove and add the text "Remove"
    jQuery('th.product-remove').text('Remove');
});


jQuery(document).ready(function($) {
 
    jQuery('.main-navigation-menu li').addClass('px-3');
    jQuery('.main-navigation-menu li a span').addClass('fs-2 fw-bold text-white');
});


