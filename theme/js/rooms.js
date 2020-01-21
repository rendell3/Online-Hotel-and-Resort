$(function () {
    // var protocol = location.protocol;
    // var host = protocol + "//" + window.location.host;
    // var lastSegment = window.location.href.split("/").pop().replace("-", " ");
    // var url = window.location.href;
    // var uri = host;
    // uri = "http://localhost:9000";

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
    //                 var build = '<div class="col-md-4">' +
    //                     '<div class="hotel-content">' +
    //                     '<div class="hotel-grid" style="background-image: url(' + uri + '/uploads/' + photo + ');">' +
    //                     '<div class="price"><small>For as low as</small><span>₱ ' + price + '/night</span></div>' +
    //                     '<a class="book-now text-center" href="?page=book&room='+id+'"><i class="ti-calendar"></i> Book Now</a>' +
    //                     '</div>' +
    //                     '<div class="desc">' +
    //                     '<h3><a href="#">' + name + '</a></h3>' +
    //                     '<p>' + description + '</p>' +
    //                     '</div>' +
    //                     '</div>' +
    //                     '</div>';

    //                 $('#rowRooms').append(build);
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
});