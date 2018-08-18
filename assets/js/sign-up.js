$(document).ready(function () {
    // Action on Sigh Up button
    $('.validate-signup').on('click', function() {
        var errArray = new Array();
        // Loop through the inputs
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
                    } else if ($.trim($(this).val()).length === 0) {
                        $(this).css('border','1px solid red'); 
                        errArray.push('email');
                    } else {
                        $(this).css('border','1px solid red'); 
                        errArray.push('email');
                    }	
                    break;

                case 'password':
                case 'confirmPassword':
                    var filter = /^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/;
                    if (filter.test($(this).val())) {
                        $(this).css('border','1px solid #DBDCDE'); 
                    } else {
                        $(this).css('border','1px solid red'); 
                        errArray.push('password');
                    }

                    if ($.trim($('#password').val()) !== $.trim($('#confirmPassword').val())) {
                        $(this).css('border','1px solid red'); 
                        errArray.push('password');
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
                url: '/user/createUser',
                data: {
                    firstName: $.trim($('#firstName').val()),
                    lastName: $.trim($('#lastName').val()),
                    emailID: $.trim($('#emailID').val()),
                    password: $.trim($('#password').val()),
                    contactNumber: $.trim($('#contactNumber').val()),
                    recaptcha: grecaptcha.getResponse() 
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
});