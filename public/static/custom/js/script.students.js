function loadResults(){
    var url = "/student/create?branch=" + $('#dropdownMenuButton_branch').data('value');
   
    if($('#dropdownMenuButton_year').val() != 0){
        url += "&year=" + $('#dropdownMenuButton_year').data('value');
    }

    if($('#dropdownMenuButton_student_category').val() != 0){
        url += "&category=" + $('#dropdownMenuButton_student_category').data('value');
    }

    var table = $('#students-table');
    
    var default_tpl = _.template($('#allstudents_show').html());

    $.ajax({
        url : url,
        success : function(data){
            console.log(data);
            if($.isEmptyObject(data)){
                table.html('<tr><td colspan="8" class="align-middle text-center text-lg px-4 py-3"><span class="badge badge-pill badge-lg bg-gradient-danger">No students for these filters</span></td></tr>');
            } else {
                table.html('');
                for (var student in data) {
                    console.log(data[student]);
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

$(document).ready(function(){
    $('.branch').click(function(e) {
        e.preventDefault();

        var value = $(this).data('value');
        var text = $(this).text();

        $('#dropdownMenuButton_branch').text(text);
        $('#dropdownMenuButton_branch').data('value', value);

        loadResults();
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

        loadResults();
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

        loadResults();
        $('#dropdownMenuButton_branch').text('All Branches');
        $('#dropdownMenuButton_branch').data('value', null);
        $('#dropdownMenuButton_student_category').text('All Categories');
        $('#dropdownMenuButton_student_category').data('value', null);
    });
    
    loadResults();

});