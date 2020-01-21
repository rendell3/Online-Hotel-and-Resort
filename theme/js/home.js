$(function () {
    // var protocol = location.protocol;
    // var host = protocol + "//" + window.location.host;
    // var lastSegment = window.location.href.split("/").pop().replace("-", " ");
    // var url = window.location.href;
    // var uri = host;
    // uri = "http://localhost:9000";


    // var dateToday = new Date();
    // $('#date-start, #date-end').datepicker({
    //     startDate:dateToday
    // });
    // var tabs = function () {
    //     $('#hotel-facilities').css('height', $('.tab-content.active').height() + 600);

    //     $(window).resize(function () {
    //         $('#hotel-facilities').css('height', $('.tab-content.active').height() + 600);
    //     });

    //     $('.tabs-nav > a').on('click', function (e) {

    //         var tab = $(this).data('tab');

    //         $('.tabs-nav > a').removeClass('active');
    //         $(this).addClass('active');

    //         $('.tab-content').removeClass('active show');

    //         setTimeout(function () {
    //             $('.tab-content[data-tab-content="' + tab + '"]').addClass('active');
    //             $('#hotel-facilities').css('height', $('.tab-content.active').height() + 600);
    //         }, 200);
    //         setTimeout(function () {
    //             $('.tab-content[data-tab-content="' + tab + '"]').addClass('show');
    //         }, 400);


    //         e.preventDefault();
    //     });
    // };


    // // var today = new Date();

    // // $('#txtDatepicker').datepicker({
    // //     startDate: today
    // // });
    // $.get(uri + '/api/packages')
    //     .done(function (response) {
    //         if (response.code == 200) {
    //             var packages = response.data;
    //             $('#counterPackages').html(packages.length);
    //             $('#counterPackages').attr('data-from', 0);
    //             $('#counterPackages').attr('data-to', packages.length);

    //             $('#counterPackages').countTo({
    //                 formatter: function (value, options) {
    //                     return value.toFixed(options.decimals);
    //                 }
    //             });
    //             // specializations = response.data;
    //             // $('#txtSpecializations').append('<option disabled="" selected="" value="">Speciality</option>');
    //             // specializations.forEach(specialization => {
    //             //     id = specialization.id;
    //             //     name = specialization.name;
    //             //     build = "<option value='" + id + "'>" + name + "</option>";
    //             //     $('#txtSpecializations').append(build);
    //             // });
    //         } else {
    //             console.log(response.status);
    //         }
    //     });

    // $.get(uri + '/api/products')
    //     .done(function (response) {
    //         if (response.code == 200) {
    //             var products = response.data;
    //             $('#counterProducts').html(products.length);
    //             $('#counterProducts').attr('data-from', 0);
    //             $('#counterProducts').attr('data-to', products.length);

    //             $('#counterProducts').countTo({
    //                 formatter: function (value, options) {
    //                     return value.toFixed(options.decimals);
    //                 }
    //             });
    //             // specializations = response.data;
    //             // $('#txtSpecializations').append('<option disabled="" selected="" value="">Speciality</option>');
    //             // specializations.forEach(specialization => {
    //             //     id = specialization.id;
    //             //     name = specialization.name;
    //             //     build = "<option value='" + id + "'>" + name + "</option>";
    //             //     $('#txtSpecializations').append(build);
    //             // });
    //         } else {
    //             console.log(response.status);
    //         }
    //     });

    // var data = {
    //     type: 'rooms'
    // };

    // $.get(uri + '/api/products', data)
    //     .done(function (response) {
    //         if (response.code == 200) {
    //             $('#rowRooms').html('');
    //             var products = response.data;

    //             for (const [index, product] of products.entries()) {
    //                 var id = product.fldProductId;
    //                 var name = product.fldProductName;
    //                 var description = product.fldProductDescription;
    //                 var price = product.fldProductPrice;
    //                 var photo = product.fldProductImagePath;
    //                 if (index === 0) {
    //                     var build = '<div class="feature-full-1col">' +
    //                         '<div class="image" style="background-image: url(' + uri + '/uploads/' + photo + ');">' +
    //                         '<div class="descrip text-center">' +
    //                         '<p><small>For as low as</small><span>₱' + price + '/night</span></p>' +
    //                         '</div>' +
    //                         '</div>' +
    //                         '<div class="desc">' +
    //                         '<h3>' + name + '</h3>' +
    //                         '<p>' + description + '</p>' +
    //                         '<p><a href="?page=book&room='+id+'" class="btn btn-primary btn-luxe-primary">Book Now <i class="ti-angle-right"></i></a></p>' +
    //                         '</div>' +
    //                         '</div>';
    //                     $('#rowRooms').append(build);
    //                 } else if (index === 1) {
    //                     var build = '<div class="feature-full-2col"><div class="f-hotel">' +
    //                         '<div class="image" style="background-image: url(' + uri + '/uploads/' + photo + ');">' +
    //                         '<div class="descrip text-center">' +
    //                         '<p><small>For as low as</small><span>₱' + price + '/night</span></p>' +
    //                         '</div>' +
    //                         '</div>' +
    //                         '<div class="desc">' +
    //                         '<h3>' + name + '</h3>' +
    //                         '<p>' + description + '</p>' +
    //                         '<p><a href="?page=book&room='+id+'" class="btn btn-primary btn-luxe-primary">Book Now <i class="ti-angle-right"></i></a></p>' +
    //                         '</div>' +
    //                         '</div></div>';
    //                     $('#rowRooms').append(build);
    //                 } else {
    //                     var build = '<div class="f-hotel">' +
    //                         '<div class="image" style="background-image: url(' + uri + '/uploads/' + photo + ');">' +
    //                         '<div class="descrip text-center">' +
    //                         '<p><small>For as low as</small><span>₱' + price + '/night</span></p>' +
    //                         '</div>' +
    //                         '</div>' +
    //                         '<div class="desc">' +
    //                         '<h3>' + name + '</h3>' +
    //                         '<p>' + description + '</p>' +
    //                         '<p><a href="?page=book&room='+id+'" class="btn btn-primary btn-luxe-primary">Book Now <i class="ti-angle-right"></i></a></p>' +
    //                         '</div>' +
    //                         '</div>';
    //                     $('#rowRooms .feature-full-2col').append(build);
    //                 }

    //                 if (index === 2) break;
    //             }
    //             // specializations = response.data;
    //             // $('#txtSpecializations').append('<option disabled="" selected="" value="">Speciality</option>');
    //             // specializations.forEach(specialization => {
    //             //     id = specialization.id;
    //             //     name = specialization.name;
    //             //     build = "<option value='" + id + "'>" + name + "</option>";
    //             //     $('#txtSpecializations').append(build);
    //             // });
    //         } else {
    //             console.log(response.status);
    //         }
    //     });

    // var data = {
    //     types: '"amenities", "recreational activities"'
    // };

    // $.get(uri + '/api/products', data)
    //     .done(function (response) {
    //         if (response.code == 200) {
    //             $('#amenitiesTabs').html('');
    //             $('#amenitiesTabsContents').html('');
    //             var products = response.data;

    //             for (const [index, product] of products.entries()) {
    //                 var id = product.fldProductId;
    //                 var name = product.fldProductName;
    //                 var description = product.fldProductDescription;
    //                 var price = product.fldProductPrice;
    //                 var photo = product.fldProductImagePath;
    //                 var category = product.fldCategoryName;

    //                 $('#amenitiesTabs').append('<a href="javascript:;" data-tab="tab' + id + '"><i class="flaticon-bicycle icon"></i><span>' + name + '</span></a>');
    //                 if (index === 0) {
    //                     var build = '<div class="tab-content active show" data-tab-content="tab' + id + '">' +
    //                         '<div class="container">' +
    //                         '<div class="row">' +
    //                         '<div class="col-md-6">' +
    //                         '<img src="' + uri + '/uploads/' + photo + '" class="img-responsive" alt="Image">' +
    //                         '</div>' +
    //                         '<div class="col-md-6">' +
    //                         '<span class="super-heading-sm">' + category + '</span>' +
    //                         '<h3 class="heading">' + name + '</h3>' +
    //                         '<p style="height:320px;">' + description + '</p>' +
    //                         '<p class="service-hour">' +
    //                         '<span>Price</span>' +
    //                         '<strong>₱' + price + '</strong>' +
    //                         '</p>' +
    //                         '</div>' +
    //                         '</div>' +
    //                         '</div>' +
    //                         '</div>';
    //                     $('#amenitiesTabsContents').append(build);
    //                 } else {
    //                     var build = '<div class="tab-content" data-tab-content="tab' + id + '">' +
    //                         '<div class="container">' +
    //                         '<div class="row">' +
    //                         '<div class="col-md-6">' +
    //                         '<img src="' + uri + '/uploads/' + photo + '" class="img-responsive" alt="Image">' +
    //                         '</div>' +
    //                         '<div class="col-md-6">' +
    //                         '<span class="super-heading-sm">' + category + '</span>' +
    //                         '<h3 class="heading">' + name + '</h3>' +
    //                         '<p style="height:320px;">' + description + '</p>' +
    //                         '<p class="service-hour">' +
    //                         '<span>Price</span>' +
    //                         '<strong>₱' + price + '</strong>' +
    //                         '</p>' +
    //                         '</div>' +
    //                         '</div>' +
    //                         '</div>' +
    //                         '</div>';
    //                     $('#amenitiesTabsContents').append(build);
    //                 }

    //                 if (index === 5) break;
    //             }

    //             tabs();
    //             // specializations = response.data;
    //             // $('#txtSpecializations').append('<option disabled="" selected="" value="">Speciality</option>');
    //             // specializations.forEach(specialization => {
    //             //     id = specialization.id;
    //             //     name = specialization.name;
    //             //     build = "<option value='" + id + "'>" + name + "</option>";
    //             //     $('#txtSpecializations').append(build);
    //             // });
    //         } else {
    //             console.log(response.status);
    //         }
    //     });


    // $('#date-start').change(function () {
    //     var start = $(this).val();
    //     start = moment(start);
    //     var end = start.add('days', 1);
    //     end = end.format('MM/DD/YYYY');
    //     $('#date-end').val(end);
    // });

    // $('#checkAvailability').click(function () {
    //     var start = $('#date-start').val();
    //     var end = $('#date-end').val();

    //     location.href = '?page=book&start='+start;
    // });
});