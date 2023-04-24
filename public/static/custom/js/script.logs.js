function loadResults(){
    var url =  "/issue-log";

    var table = $('#issue-logs-table');
    
    var default_tpl = _.template($('#all_logs_display').html());

    $.ajax({
        url : url,
        success : function(data){
            console.log(data);
            if($.isEmptyObject(data)){
                table.html('<tr><td colspan="7" class="align-middle text-center text-lg px-4 py-3"><span class="badge badge-pill badge-lg bg-gradient-danger">There are no logs in database</span></td></tr>');
            } else {
                table.html('');
                // console.log(JSON.stringify(data));
                
                for(var log in data){
                    table.append(default_tpl(data[log]));
                }
            }
        },
        beforeSend : function(){
            table.css({'opacity' : 0.4});
        },
        complete : function() {
            table.css({'opacity' : 1.0});
        }
    });
}

function issueBook(bookID, studentID, selectedForm){
    var url = '/issue-log',
        data = {};

    data.bookID = bookID;
    data.studentID = studentID;
    var _token = $('#_token').val();
    // alert(_token);
    $.ajax({
        type : 'POST',
        data : { 
            data : data,
            _token:_token
        },
        url : url,
        success: function(data) {
            //selectedForm.prepend(templates.alert_box( {type: 'success', message: data} ));
            swal("Your book has been issued!", {
                buttons: false,
                icon: "success",
                timer: 2000
              });  
            ClearIssueBook();
            $('#issue_student_id').focus();
        },
        error: function(xhr, status, error){

            console.log(xhr);

            var err = jQuery.parseJSON(xhr.responseText).error;
            //selectedForm.prepend(templates.alert_box( {type: 'danger', message: err.message} ));
        },
        beforeSend: function() {
            selectedForm.css({'opacity' : '0.4'});
        },
        complete: function() {
            selectedForm.css({'opacity' : '1.0'});
        }
    });
}

function returnBook(bookID, selectedForm){
    var url =  '/issue-log/' + bookID + '/edit';
    $.ajax({
        type : 'GET',
        
        url : url,
        success: function(data) {
            // selectedForm.prepend(templates.alert_box( {type: 'success', message: data} ));
            swal("Your book has been returned!", {
                buttons: false,
                icon: "success",
                timer: 2000
              });  
            ClearReturn();
            $('#return_book_id').focus();

        },
        error: function(xhr, status, error){
            var err = jQuery.parseJSON(xhr.responseText).error;
            // selectedForm.prepend(templates.alert_box( {type: 'danger', message: err.message} ));
        },
        beforeSend: function() {
            selectedForm.css({'opacity' : '0.4'});
        },
        complete: function() {
            selectedForm.css({'opacity' : '1.0'});
        }
    });
}

function ClearReturn(){
    $('#return_book_id').val('') // if you want the value to be empty you will make the like this
}

function ClearIssueBook(){
    $('#issue_book_id').val('') // if you want the value to be empty you will make the like this
    $('#issue_student_id').val('') // if you want the value to be empty you will make the like this
}


$(document).ready(function(){

    $(document).on("click","#issuebook",function(){
        var selectedForm = $(this).parents('form'),
            studentID = selectedForm.find("input[data-form-field~=student-issue-id]").val(),
            bookID = selectedForm.find("input[data-form-field~=book-issue-id]").val(),
            inputs = [
                document.getElementById("issue_student_id"),
                document.getElementById("issue_book_id"),
            ];

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

        if(studentID == "" || bookID == ""){
            selectedForm.prepend(templates.alert_box( {type: 'danger', message: "Invalid Data"} ));
        } else {
            issueBook(bookID, studentID, selectedForm);
        }
    });

    $(document).on("click","#returnbook",function(){
        var selectedForm = $(this).parents('form'),
        input = document.getElementById("return_book_id"),
        bookID = selectedForm.find("input[data-form-field~=book-issue-id]").val();
        
        if(bookID == ""){
            input.classList.add("shake");
            input.style.borderColor = "red";
            setTimeout(function() {
                input.classList.remove("shake");
                input.style.borderColor = "";
            }, 1000);
            selectedForm.prepend(templates.alert_box( {type: 'danger', message: "Please Enter Book ID"} ));
        } else {
            returnBook(bookID, selectedForm);
        }
    });
    
    loadResults();

});

