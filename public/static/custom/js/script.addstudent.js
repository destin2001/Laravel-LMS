$(document).ready(function(){

$(document).on("click","#addstudents",function(event){
        var form = $(this).parents('form'),
            sendJSON ={},
            send_flag = true,
            f$ = function(selector) {
                return form.find(selector);
            };

        var inputs = [
            document.getElementById("first"),
            document.getElementById("last"),
            document.getElementById("rollnumber"),
            document.getElementById("email")
        ];

        console.log(inputs);

        first = f$('input[data-form-field~=first]').val();
        last = f$('input[data-form-field~=last]').val();
        rollnumber = parseInt(f$('input[data-form-field~=rollnumber]').val());
        branch = f$('select[data-form-field~=branch]').val();
        year = f$('select[data-form-field~=year]').val();
        email = f$('input[data-form-field~=email]').val();
        category = f$('select[data-form-field~=category]').val();
        _token = f$('input[data-form-field~=token]').val();


        inputs.forEach(function(input) {
            if (input.value == '' || input.value == null) {
                send_flag = false;
                input.classList.add("shake");
                input.style.borderColor = "red";
                
                setTimeout(function() {
                    input.classList.remove("shake");
                    input.style.borderColor = "";
                }, 1000);
            } else {
                // Remove shake class from valid input field
                input.classList.remove("shake");
                input.style.borderColor = "";
            }
        });
        
        if(send_flag == true){
            console.log(_token);
            $.ajax({
                type : 'POST',
                data : {
                    first:first, last:last,
                    rollnumber:rollnumber,branch:branch,
                    year:year,email:email, category : category,
                     _token:_token
                },
                url : '/student-registration',
                success: function(data) {        
                    swal("Your registration has been successful!", {
                        buttons: false,
                        icon: "success",
                        timer: 2000
                      });            
                    // module_body.prepend(templates.alert_box( {type: 'success', message: data} ));
                    clearform();
                },
                error: function(xhr,status,error){
                    var err = JSON.parse(xhr.responseText);
                    swal("Oops!", xhr.responseText, "error");
                    // module_body.prepend(templates.alert_box( {type: 'danger', message: err.error.message} ));
                },
                beforeSend: function() {
                    form.css({'opacity' : '0.4'});
                },
                complete: function() {
                    form.css({'opacity' : '1.0'});
                }
            });
        }
}); // add books to database

});

function clearform(){
    $('#first').val('');
    $('#last').val('');
    $('#rollnumber').val('');
    $('#email').val('');
    $('#choices-button').val('');
    $('#choices-button1').val('');
    $('#choices-button2').val('');
}