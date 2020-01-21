$(function () {
    // var protocol = location.protocol;
    // var host = protocol + "//" + window.location.host;
    // var lastSegment = window.location.href.split("/").pop().replace("-", " ");
    // var url = window.location.href;
    // var uri = host;
    // uri = "http://localhost:9000";


    "use strict";

    initData(uri);

});

// function initData(uri) {
//     $('#rowGallery').html('');
//     $.ajax({
//         url: uri + '/api/gallery',
//         type: 'get',
//         async: false
//     }).done(function (response) {
//         images = response.data;
//         images.forEach(image => {
//             var id = image.fldImageId;
//             var created = image.fldImageCreated;
//             var name = image.fldImageName;
//             var description = image.fldImageDescription;
//             var filename = image.fldImagePath;
//             // description = description.substr(0,5) + '...';

//             var build = '<div class="col-sm-4 col-md-3 webdesign illustrator">' +
//                 '<a href="'+uri+'/uploads/' + filename + '" class="image-popup">' +
//                 '<div class="portfolio-masonry-box">' +
//                 '<div class="portfolio-masonry-img">' +
//                 '<img src="'+uri+'/uploads/' + filename + '" class="thumb-img img-responsive" alt="work-thumbnail">' +
//                 '</div>' +
//                 '<div class="portfolio-masonry-detail">' +
//                 '<h4 class="font-18">' + name + '</h4>' +
//                 '<p style="margin-bottom:5px;">'+created+'</p>' +
//                 '</div>' +
//                 '</div>' +
//                 '</a>' +
//                 '</div>';

//             $('.portfolioContainer').append(build);

//             // $('#rowGallery').append(build);
//         });

    

//         setTimeout(function () {
//             /* Gallery */
//             var $container = $('.portfolioContainer');
//             $container.isotope({
//                 filter: '*',
//                 animationOptions: {
//                     duration: 750,
//                     easing: 'linear',
//                     queue: false
//                 }
//             });

//             $('.portfolioFilter a').click(function () {
//                 $('.portfolioFilter .current').removeClass('current');
//                 $(this).addClass('current');

//                 var selector = $(this).attr('data-filter');
//                 $container.isotope({
//                     filter: selector,
//                     animationOptions: {
//                         duration: 750,
//                         easing: 'linear',
//                         queue: false
//                     }
//                 });
//                 return false;
//             });

//             $('.image-popup').magnificPopup({
//                 type: 'image',
//                 closeOnContentClick: true,
//                 mainClass: 'mfp-fade',
//                 gallery: {
//                     enabled: true,
//                     navigateByImgClick: true,
//                     preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
//                 }
//             });
//         }, 2000);
//     });
// }
