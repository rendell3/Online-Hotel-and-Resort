$(function () {
    var protocol = location.protocol;
    var host = protocol + "//" + window.location.host;
    var lastSegment = window.location.href.split("/").pop().replace("-", " ");
    var url = window.location.href;
    var uri = host + '/api';

    "use strict";

    initData(uri);
    $('#btnAdd').click(function () {
        $('#divError').html('');
        var name = $('#txtName').val();
        if (name == '') {
            $('#divError').html('<div class="alert alert-danger">Name is required.</div>');
            return;
        }

        var data = {
            name: name
        };

        $.post(uri + '/categories', data)
            .done(function (response) {
                if (response.code == 200) {
                    $('#txtName').val('');
                    $('#modalAdd').modal('hide');
                    initData(uri);
                } else {
                    console.log(response);
                }
            });
    });

    $('#btnSave').click(function () {
        $('#divEditError').html('');
        var id = $('#btnSave').attr('data-id');
        var name = $('#txtEditName').val();
        if (name == '') {
            $('#divEditError').html('<div class="alert alert-danger">Name is required.</div>');
            return;
        }

        var data = {
            id: id,
            name: name
        };

        $.post(uri + '/categories/edit', data)
            .done(function (response) {
                if (response.code == 200) {
                    $('#txtEditName').val('');
                    $('#modalEdit').modal('hide');
                    swal('Successful!', 'Category was successfully edited.', 'success').then(result => {
                        initData(uri);
                    });
                } else {
                    console.log(response);
                }
            });
    });


});

function initData(uri) {
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
                    '<td><a href="javascript:void(0)" class="text-inverse pr-10 edit-category" title="Edit" data-toggle="tooltip" data-id="' + id + '"><i class="zmdi zmdi-edit txt-warning"></i></a><a href="javascript:void(0)" class="text-inverse delete-category" title="Delete" data-toggle="tooltip" data-id="' + id + '"><i class="zmdi zmdi-delete txt-danger"></i></a></td>' +
                    '</tr>';

                $('#tableCategories tbody').append(build);
            });

            $('a[data-toggle="tooltip"]').tooltip();
            $("#tableCategories").dataTable();
            $('.delete-category').click(function () {
                var id = $(this).attr('data-id');
                swal({
                    title: 'Are you sure?',
                    text: 'Do you want to delete this category?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it',
                    cancelButtonText: 'No, cancel'
                }).then(result => {
                    if (result) {
                        var data = {
                            id: id
                        };
                        $.post(uri + '/categories/delete', data)
                            .done(function (response) {
                                if (response.code == 200) {
                                    swal('Successful!', 'Category was successfully deleted.', 'success').then(result => {
                                        initData(uri);
                                    });
                                } else {
                                    console.log(response);
                                }
                            });
                    }
                });
            });

            $('.edit-category').click(function () {
                var id = $(this).attr('data-id');
                var name = $('#categoryName' + id).text();
                $('#btnSave').attr('data-id', id);
                $('#txtEditName').val(name);
                $('#modalEdit').modal('show');
            });
        });


}
