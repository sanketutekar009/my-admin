$(document).ready(function () {
    // Action when the user presses Enter Key
    $('.form-control').on('keydown', function(e) {
        if (e.keyCode == 13) { // Action on Enter Key
            $('.validate-login').trigger('click');
        }
    });

    // Action on Login button
    $('.validate-login').on('click', function() {
        var errArray = new Array();

        // Loop through the inputs
        $('.form-control').each(function() {
            var currentElement = $(this).attr('name');
            switch(currentElement) {
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
                    if ($.trim($(this).val()).length === 0) {
                        $(this).css('border','1px solid red'); 
                        errArray.push('password');
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
                url: '/login/validateUser',
                data: {
                    emailID: $.trim($('#emailID').val()),
                    password: $.trim($('#password').val())
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