$(function () {
    var protocol = location.protocol;
    var host = protocol + "//" + window.location.host;
    var lastSegment = window.location.href.split("/").pop().replace("-", " ");
    var url = window.location.href;
    var uri = host + '/api';

    "use strict";

    initCategoriesData(uri);
    initProductsData(uri);
    initPackagesData(uri)(uri);

});

function initCategoriesData(uri) {
    $('#tableCategories tbody').html('');
    $.get(uri + '/categories')
        .done(function (response) {
            if ($.fn.DataTable.isDataTable("#tableCategories")) {
                $('#tableCategories').DataTable().clear().destroy();
            }
            categories = response.data;
            categories.forEach(category => {
                var id = category.fldCategoryId;
                var name = category.fldCategoryName;
                var created = category.fldCategoryCreated;
                var build = '<tr>' +
                    '<td>' + id + '</td>' +
                    '<td id="categoryName' + id + '">' + name + '</td>' +
                    '<td>' + created + '</td>' +
                    '</tr>';

                $('#tableCategories tbody').append(build);
            });

            $('a[data-toggle="tooltip"]').tooltip();
            $("#tableCategories").dataTable();
        });
}

function initProductsData(uri) {
    $('#tableProducts tbody').html('');
    $.get(uri + '/products')
        .done(function (response) {
            if ($.fn.DataTable.isDataTable("#tableProducts")) {
                $('#tableProducts').DataTable().clear().destroy();
            }
            products = response.data;
            products.forEach(product => {
                console.log(product);
                var id = product.fldProductId;
                var name = product.fldProductName;
                var category = product.fldCategoryName;
                var created = product.fldProductCreated;
                console.log(category);
                var build = '<tr>' +
                    '<td>' + id + '</td>' +
                    '<td id="product' + id + '">' + name + '</td>' +
                    '<td>' + category + '</td>' +
                    '<td>' + created + '</td>' +
                    '</tr>';

                $('#tableProducts tbody').append(build);
            });

            $('a[data-toggle="tooltip"]').tooltip();
            $("#tableProducts").dataTable();
        });
}

function initPackagesData(uri) {
    $('#tablePackages tbody').html('');
    $.get(uri + '/packages')
        .done(function (response) {
            if ($.fn.DataTable.isDataTable("#tablePackages")) {
                $('#tablePackages').DataTable().clear().destroy();
            }
            results = response.data;
            results.forEach(result => {
                var package = result.package;

                var id = package.fldPackageId;
                var name = package.fldPackageName;
                var price = package.fldPackagePrice;
                var person = package.fldPackagePerson;
                var days = package.fldPackageDays;
                var succeeding = package.fldPackageSucceeding;

                var products = result.products;
                var arrayProducts = [];
                products.forEach(product => {
                    arrayProducts.push(product.fldProductName);
                });

                if(succeeding == 0) {
                    succeeding = '<i>Not applicable</i>';
                }
                var stringProducts = arrayProducts.join(', ');
                var build = '<tr>' +
                    '<td>' + id + '</td>' +
                    '<td>' + name + '</td>' +
                    '<td>' + succeeding + '</td>' +
                    // '<td>' + person + '</td>' +
                    '<td>' + days + '</td>' +
                    '<td>' + stringProducts + '</td>' +
                    '</tr>';

                $('#tablePackages tbody').append(build);
            });
            $('a[data-toggle="tooltip"]').tooltip();

            $("#tablePackages").dataTable();

        });
}