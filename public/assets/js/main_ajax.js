$(document).ready(function(){

    // message methods
    function messageHide(){
        $('.message').animate({ opacity: 0,top: '0px' }, 'slow');
        setTimeout(function(){ $(".message").html(''); }, 1000);
    }
    messageHide();

    function messageShow(data){
        $(".message").html(data);
        $('.message').animate({ opacity: 1,top: '60px' }, 'slow');

        setTimeout(function(){ messageHide() }, 3000);
    }

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

     // delete data common function
     function destroy_data(name,url){
        var el = name;
        var id= el.attr('data-id');
        var dltUrl = url+id;
        if(confirm('Are you Sure Want to Delete This')){
            $.ajax({
                url: dltUrl,
                type: "DELETE",
                cache: false,
                
                success: function (dataResult) {
                    if (dataResult == '1') {
                        messageShow("<div class='alert alert-success'>Deleted Successfully.</div>");
                        el.parent().parent('tr').remove();
                    }
                },
                error: function(data){
                    if(data.status == 422){
                        $.each(data.responseJSON.errors, function(i, error){
                            var el = $(document).find('[name="' + i + '"]');
                            el.after($('<span class="error">' + error[0] + '</span>'));
                        });
                    }
                }
            });
        }
    }

    // ========================================
    // script for Student module
    // ========================================
    
    $('#add_student').validate({
        rules: {
            first_name: {required:true},
            last_name: {required:true},
            student_gender: {required:true},
            email: {required:true},
            student_class: {required:true},
            student_age: {required:true},
        },
        messages: {
            first_name: {required: "Please Enter Student First Name"},
            last_name: {required: "Please Enter Student Last Name"},
            student_gender: {required: "Please Enter Student Gender"},
            email: {required: "Please Enter Student Email"},
            student_class: {required: "Please Enter Student Class"},
            student_age: {required: "Please Enter Student Age"},
        },
        submitHandler: function(form){
            var url = $('.url').val();
            var formdata = new FormData(form);
            $.ajax({
                url: url,
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(dataResult){
                    if(dataResult == '1'){
                        messageShow("<div class='alert alert-success'>Student Saved Successfully.</div>");
                        setTimeout(function(){ window.location.href= url;}, 1000);
                    }
                },
                error: function(data){
                    if(data.status == 422){
                        $.each(data.responseJSON.errors, function(i, error){
                            var el = $(document).find('[name="' + i + '"]');
                            el.after($('<span class="error">' + error[0] + '</span>'));
                        });
                    }
                }
            });
        }
    });

    $('#update_student').validate({
        rules: {
            first_name: {required:true},
            last_name: {required:true},
            student_gender: {required:true},
            email: {required:true},
            student_class: {required:true},
            student_age: {required:true},
        },
        messages: {
            first_name: {required: "Please Enter Student First Name"},
            last_name: {required: "Please Enter Student Last Name"},
            student_gender: {required: "Please Enter Student Gender"},
            email: {required: "Please Enter Student Email"},
            student_class: {required: "Please Enter Student Class"},
            student_age: {required: "Please Enter Student Age"},
        },
        submitHandler: function(form){
            var url = $('.url').val();
            var formdata = new FormData(form);
            $.ajax({
                url: url,
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(dataResult){
                    if(dataResult == '1'){
                        messageShow("<div class='alert alert-success'>Student Updated Successfully.</div>");
                        setTimeout(function(){ window.location.href= $('.rdt-url').val();}, 1000);
                    }
                },
                error: function(data){
                    if(data.status == 422){
                        $.each(data.responseJSON.errors, function(i, error){
                            var el = $(document).find('[name="' + i + '"]');
                            el.after($('<span class="error">' + error[0] + '</span>'));
                        });
                    }
                }
            });
        }
    });

    $(document).on("click", '.delete-student', function() {
        destroy_data($(this), 'students/')
    });



});


