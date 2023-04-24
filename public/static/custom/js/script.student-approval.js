function loadResults(){
    var url =  "/student?branch=" + $('#dropdownMenuButton_branch').data('value');

    if($('#dropdownMenuButton_year').val() != 0){
        url += "&year=" + $('#dropdownMenuButton_year').data('value');
    }

    if($('#dropdownMenuButton_student_category').val() != 0){
        url += "&category=" + $('#dropdownMenuButton_student_category').data('value');
    }

    var table = $('#approval-table');
    
    var default_tpl = _.template($('#approvalstudents_show').html());

    $.ajax({
        url : url,
        success : function(data){
            if($.isEmptyObject(data)){
                console.log(data);
                table.html('<tr><td colspan="8" class="align-middle text-center text-lg px-4 py-3"><span class="badge badge-pill badge-lg bg-gradient-danger">No Students for approval for these filters</span></td></tr>');
            } else {
                table.html('');
                for (var student in data) {
                    table.append(default_tpl(data[student]));
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

function StudentByBranch(){
    var url =  "/studentByattribute/";

    var branch  = $('#dropdownMenuButton_branch').data('value');
    var _token = $('#_token').val();
    var table = $('#approval-table');
    
    var default_tpl = _.template($('#approvalstudents_show').html());

    $.ajax({

        type : 'POST',
        data : { 
            branch : branch,
            _token:_token
        },
        url : url,
        success : function(data){
            if($.isEmptyObject(data)){
                table.html('<tr><td colspan="8" class="align-middle text-center text-lg px-4 py-3"><span class="badge badge-pill badge-lg bg-gradient-danger">No Students for approval for these filters</span></td></tr>');
            } else {
                table.html('');
                for (var student in data) {
                    table.append(default_tpl(data[student]));
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

function StudentByCategory(){
    var url =  "/studentByattribute/";

    var category  = $('#dropdownMenuButton_student_category').data('value');
    var _token = $('#_token').val();
    var table = $('#approval-table');
    
    var default_tpl = _.template($('#approvalstudents_show').html());

    $.ajax({

        type : 'POST',
        data : { 
            category : category,
            _token:_token
        },
        url : url,
        success : function(data){
            if($.isEmptyObject(data)){
                table.html('<tr><td colspan="8" class="align-middle text-center text-lg px-4 py-3"><span class="badge badge-pill badge-lg bg-gradient-danger">No Students for approval for these filters</span></td></tr>');
            } else {
                table.html('');
                for (var student in data) {
                    table.append(default_tpl(data[student]));
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

$('#refresh').on('click', function(){
    $('#dropdownMenuButton_branch').text('All Branches');
    $('#dropdownMenuButton_branch').data('value', null);
    $('#dropdownMenuButton_student_category').text('All Categories');
    $('#dropdownMenuButton_student_category').data('value', null);
    $('#dropdownMenuButton_year').text('All Years');
    $('#dropdownMenuButton_year').data('value', null);
    loadResults();
})

function StudentByYear(){
    var url =  "/studentByattribute/";

    var year  = $('#dropdownMenuButton_year').data('value');
    var _token = $('#_token').val();
    var table = $('#approval-table');

    console.log(year);
    
    var default_tpl = _.template($('#approvalstudents_show').html());

    $.ajax({

        type : 'POST',
        data : { 
            year : year,
            _token:_token
        },
        url : url,
        success : function(data){
            if($.isEmptyObject(data)){
                table.html('<tr><td colspan="8" class="align-middle text-center text-lg px-4 py-3"><span class="badge badge-pill badge-lg bg-gradient-danger">No Students for approval for these filters</span></td></tr>');
            } else {
                table.html('');
                for (var student in data) {
                    table.append(default_tpl(data[student]));
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


function approveStudent(studentID, flag) {
    table = $('#approval-table');

    console.log(flag);

    $.ajax({
        type : 'POST',
        data : { 
            _method : "PUT", 
            flag : flag,
            _token:_token
        },
        url : '/student/' + studentID,
        success: function(data) {
            console.log(data.flag);
            if (data.flag == 0) {
                swal("Student reject has been successful!", {
                    icon: "error",
                    buttons: false,
                    timer: 2000
                });      
            } swal("Student approve has been successful!", {
                buttons: false,
                icon: "success",
                timer: 2000
            });
               
            loadResults();
        },
        error: function(xhr, msg){
            swal("Oops!", xhr.responseText, "error");
        },
        beforeSend: function() {
            table.css({'opacity' : '0.4'});
        },
        complete: function() {
            table.css({'opacity' : '1.0'});
        }
    });
}

$(document).ready(function(){

    $('.branch').click(function(e) {
        e.preventDefault();

        var value = $(this).data('value');
        var text = $(this).text();

        $('#dropdownMenuButton_branch').text(text);
        $('#dropdownMenuButton_branch').data('value', value);

        StudentByBranch();
        $('#dropdownMenuButton_student_category').text('All Categories');
        $('#dropdownMenuButton_student_category').data('value', null);
        $('#dropdownMenuButton_year').text('All Years');
        $('#dropdownMenuButton_year').data('value', null);
    });

    $('.student_category').click(function(e) {
        e.preventDefault();

        var value = $(this).data('value');
        var text = $(this).text();

        $('#dropdownMenuButton_student_category').text(text);
        $('#dropdownMenuButton_student_category').data('value', value);

        StudentByCategory();
        $('#dropdownMenuButton_branch').text('All Branches');
        $('#dropdownMenuButton_branch').data('value', null);
        $('#dropdownMenuButton_year').text('All Years');
        $('#dropdownMenuButton_year').data('value', null);
    });

    $('.year').click(function(e) {
        e.preventDefault();

        var value = $(this).data('value');
        var text = $(this).text();

        $('#dropdownMenuButton_year').text(text);
        $('#dropdownMenuButton_year').data('value', value);

        StudentByCategory();
        $('#dropdownMenuButton_branch').text('All Branches');
        $('#dropdownMenuButton_branch').data('value', null);
        $('#dropdownMenuButton_student_category').text('All Categories');
        $('#dropdownMenuButton_student_category').data('value', null);
    });

    $(document).on("click",".student-status",function(){
        var selectedRow = $(this).parents('tr'),
            studentID = selectedRow.data('student-id')
            flag = $(this).data('status');
        
        console.log(studentID);
        console.log(flag);
        
        approveStudent(studentID, flag);
    });
    
    loadResults();

});