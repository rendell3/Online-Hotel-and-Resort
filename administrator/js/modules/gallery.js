$(function () {
    var protocol = location.protocol;
    var host = protocol + "//" + window.location.host;
    var lastSegment = window.location.href.split("/").pop().replace("-", " ");
    var url = window.location.href;
    var uri = host + '/api';

    "use strict";

    $('#inputImage').fileinput({
        showPreview: false,
        browseLabel: "Select an image file...",
        // msgPlaceholder: null,
        // removeClass: 'btn btn-danger',
        // uploadClass: 'btn btn-success',
        showCancel: false,
        allowedFileExtensions: ["jpg", "svg", "png"],
        uploadUrl: uri + '/gallery/upload',
        elErrorContainer: '#divImageError',
        mainClass: 'fileinput fileinput-new input-group'
    }).on('filebatchpreupload', function (event, data, id, index) {
        $('#divImageError').html('');
        // $('#div-success').hide();
    }).on('fileuploaded', function (event, data, id, index) {
        $('#divImageError').html('');
        response = data.response;
        filename = response['filename'];
        $('#inputFilename').val(filename);
    });

    initData(uri);
    $('#btnAdd').click(function () {
        $('#divError').html('');
        var name = $('#txtName').val();
        var description = $('#txtDescription').val();
        var path = $('#inputFilename').val();

        if(path == '') {
            $('#divError').html('<div class="alert alert-danger">Image is required. Please don\'t forget to click upload.</div>');
            return;
        }

        if(name == '') {
            $('#divError').html('<div class="alert alert-danger">Name is required.</div>');
            return;
        }

        var data = {
            name: name,
            description: description,
            path: path
        };

        $.post(uri + '/gallery', data)
            .done(function (response) {
                if (response.code == 200) {
                    $('#txtName').val('');
                    $('#txtDescription').val('');
                    $('#txtDescription').val('');
                    $('#modalAdd').modal('hide');
                    location.reload();
                } else {
                    console.log(response);
                }
            });
    });
});

function initData(uri) {
    $('.portfolioContainer').html('');
    $.ajax({
        url: uri + '/gallery',
        type: 'get',
        async: false
    }).done(function (response) {
        images = response.data;
        images.forEach(image => {
            var id = image.fldImageId;
            var created = image.fldImageCreated;
            var name = image.fldImageName;
            var description = image.fldImageDescription;
            var filename = image.fldImagePath;
            // description = description.substr(0,5) + '...';

            var build = '<div class="col-sm-4 col-md-3 webdesign illustrator">' +
                '<a href="uploads/' + filename + '" class="image-popup">' +
                '<div class="portfolio-masonry-box">' +
                '<div class="portfolio-masonry-img">' +
                '<img src="uploads/' + filename + '" class="thumb-img img-responsive" alt="work-thumbnail">' +
                '</div>' +
                '<div class="portfolio-masonry-detail">' +
                '<h4 class="font-18">' + name + '</h4>' +
                '<p>'+created+'</p>' +
                '<p><button class="btn btn-danger delete-image" style="margin-bottom:5px;" data-id="'+id+'">Delete <i class="fa fa-trash"></i></button></p>' +
                '</div>' +
                '</div>' +
                '</a>' +
                '</div>';

            $('.portfolioContainer').append(build);

            // $('#rowGallery').append(build);
        });

        $('.delete-image').click(function() {
            var id = $(this).attr('data-id');
            swal({
                title: 'Are you sure?',
                text: 'You are about to delete an image.',
                type: 'warning',
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it',
                cancelButtonText: 'No, cancel'
            }).then( result => {
                if(result) {
                    var imageData = {
                        id : id
                    };
                    $.post(uri + '/gallery/delete', imageData)
                        .done(function(response) {
                            if (response.code == 200) {
                                swal('Successful!', 'Image was successfully deleted.', 'success').then(result => {
                                    location.reload();
                                });
                            } else {
                                console.log(response);
                            }
                        });
                        
                }
            });
            
        });
        // masonryPortfolio();

        // $('#rowGallery').lightGallery({
        //     showThumbByDefault: false,
        //     hash: false,
        //     selector: '.item'
        // });

        setTimeout(function () {
            /* Gallery */
            var $container = $('.portfolioContainer');
            $container.isotope({
                filter: '*',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });

            $('.portfolioFilter a').click(function () {
                $('.portfolioFilter .current').removeClass('current');
                $(this).addClass('current');

                var selector = $(this).attr('data-filter');
                $container.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });
                return false;
            });

            $('.image-popup').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                mainClass: 'mfp-fade',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
                }
            });
        }, 2000);
    });
}
