$(document).ready(function() {
    getUsers(); // Get users on page load

    // Action on Edit user button
    $(document).on('click', '.edit-user', function() {
        var userID = $(this).attr('lang');
        $.ajax({
            type: 'post',
            url: '/user/getUsers',
            data: {
                userID: userID
            },
            dataType: 'json',
            success: function(val) {
                if (val.status === 'success') {
                    $('#userID').val(val.message['0'].userID);
                    $('#firstName').val(val.message['0'].firstName);
                    $('#lastName').val(val.message['0'].lastName);
                    $('#emailID').val(val.message['0'].emailID);
                    $('#contactNumber').val(val.message['0'].contactNumber);
                    $('#myModal').modal('show');
                } else if (val.status === 'unauthorized'){
                    window.location.href = '/login/login';
                }
            }
        });
    });

    // Action on Update button
    $(document).on('click', '.update-user', function() {
        var errArray = new Array();
        $('.form-control').each(function() {
            var currentElement = $(this).attr('name');
            // console.log(currentElement)
            switch(currentElement) {
                case 'firstName':
                case 'lastName':
                    if ($.trim($(this).val()).length === 0) {
                        $(this).css('border','1px solid red'); 
                        errArray.push('name');
                    } else {
                        $(this).css('border','1px solid #DBDCDE'); 
                    }
                break;

                case 'emailID':
                    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                    if (filter.test($(this).val())) {
                        $(this).css('border','1px solid #DBDCDE'); 
                    } else if ($.trim($(this).val()).length === 0){
                        $(this).css('border','1px solid red'); 
                        errArray.push('email');
                    } else {
                        $(this).css('border','1px solid red'); 
                        errArray.push('email');
                    }	
                break;

                case 'contactNumber':
                    if (!/^\d{10}$/.test($(this).val())) {
                        $(this).css('border','1px solid red'); 
                        errArray.push('contactNumber');
                    } else {
                        $(this).css('border','1px solid #DBDCDE'); 
                    }
                break;
            }
        });
        // alert(errArray)
        if (errArray.length === 0) {
            $.ajax({
                type: 'post',
                url: '/user/updateUser',
                data: {
                    firstName: $.trim($('#firstName').val()),
                    lastName: $.trim($('#lastName').val()),
                    emailID: $.trim($('#emailID').val()),
                    contactNumber: $.trim($('#contactNumber').val()),
                    userID: $('#userID').val()
                },
                dataType: 'json',
                success:function(val) {
                    if (val.status === 'error') {
                        alert(val.message);
                    } else {
                        window.location.href = '/dashboard/dashboard';
                    }
                }
            });
        }
    });

    // Action on Delete user button
    $(document).on('click', '.delete-user', function() {
        if (confirm('Do you really want to delete this entry?')) {
            var userID = $(this).attr('lang');
            $.ajax({
                type: 'post',
                url: '/user/deleteUser',
                data: {
                    userID: userID
                },
                dataType: 'json',
                success: function(val) {
                    if (val.status === 'success') {
                        location.reload();
                    } else if (val.status === 'unauthorized'){
                        window.location.href = '/login/login';
                    }
                }
            });
        }
    });

});

function getUsers() {
    $.ajax({
        type: 'post',
        url: '/user/getUsers',
        dataType: 'json',
        success: function(val) {
            if (val.status === 'success') {
                var data = [];
                $.each(val.message, function(i, values) {
                    var edit = '<a href="javascript:;"><i class="fa fa-edit edit-user" aria-hidden="true" lang="' + values.userID + '"></i></a> &nbsp; | &nbsp;';
                        edit += '<a href="javascript:;"><i class="fa fa-trash delete-user" aria-hidden="true" lang="' + values.userID + '"></i></a>';

                    data.push([ 
                        (i + 1),
                        (values.firstName + ' ' + values.lastName),
                        values.emailID, 
                        values.contactNumber, 
                        edit
                    ]);
                });
                $('.table').DataTable({
                    data: data,
                    deferRender: true,
                    "order": [[ 0, "desc" ]]
                });
            } else if (val.status === 'unauthorized'){
                window.location.href = '/login/login';
            }
        }
    });
}