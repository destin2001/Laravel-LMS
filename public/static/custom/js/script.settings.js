function loadResults(){

    var url =  "setting-all";

    var branchTable = $('#all-branch');
    var categoryTable = $('#all-student-category');
    
    var branchTpl = _.template($('#allbranch_show').html());
    var categoryTpl = _.template($('#allstudentcategory_show').html());

    $.ajax({
        url : url,
        success : function(data){
            console.log(data);
            if($.isEmptyObject(data)){
                //
            } else {
                branchTable.html('');
                categoryTable.html('');
                if (data.branches.length == 0) {
                    branchTable.html('<tr><td colspan="3" class="align-middle text-center text-lg px-4 py-3"><span class="badge badge-pill badge-lg bg-gradient-danger">There are no branches in the database</span></td></tr>');
                } else {
                    for (var i = 0; i < data.branches.length; i++) {
                        branchTable.append(branchTpl(data.branches[i]));
                    }
                }
                if (data.student_categories.length == 0) {
                    categoryTable.html('<tr><td colspan="4" class="align-middle text-center text-lg px-4 py-3"><span class="badge badge-pill badge-lg bg-gradient-danger">There are no student categories in the database</span></td></tr>');
                } else {
                    for (var j = 0; j < data.student_categories.length; j++) {
                        categoryTable.append(categoryTpl(data.student_categories[j]));
                    }
                 }   
            }
        },
        beforeSend : function(){
            branchTable.css({'opacity' : 0.4});
            categoryTable.css({'opacity' : 0.4});
        },
        complete : function() {
            branchTable.css({'opacity' : 1.0});
            categoryTable.css({'opacity' : 1.0});
        }
    });
}

$(document).ready(function(){


    $(document).on("click","#addStudentCategory",function(){

        var form = $(this).parents('form'),
            module_body = $(this).parents('.card-body'),
            sendJSON ={},
            send_flag = true,
            f$ = function(selector) {
                return form.find(selector);
            };

            var inputs = [
                document.getElementById("student_category"),
                document.getElementById("max_allow"),
            ];

        category = f$('input[data-form-field~=student_category]').val();
        max_allowed = f$('input[data-form-field~=max_allowed]').val();
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

            $.ajax({
                type : 'POST',
                data : {
                    category : category, _token:_token, max_allowed:max_allowed
                },
                url : '/setting',
                success: function(data) {     
                    swal("Your branch has been created!", {
                        buttons: false,
                        icon: "success",
                        timer: 2000
                      });                 
                    // module_body.prepend(templates.alert_box( {type: 'success', message: data} ));
                    loadResults();
                    clearform();
                },
                error: function(xhr,status,error){
                    var err = eval("(" + xhr.responseText + ")");
                    module_body.prepend(templates.alert_box( {type: 'danger', message: err.error.message} ));
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

    $(document).on("click","#addBranch",function(){

        var form = $(this).parents('form'),
            module_body = $(this).parents('.card-body'),
            input = document.getElementById("branch"),
            sendJSON ={},
            send_flag = true,
            f$ = function(selector) {
                return form.find(selector);
            };

        branch = f$('input[data-form-field~=branch]').val();
        _token = f$('input[data-form-field~=token]').val();

        if(branch == ""  ){
            input.classList.add("shake");
            input.style.borderColor = "red";
            setTimeout(function() {
                input.classList.remove("shake");
                input.style.borderColor = "";
            }, 1000);

            send_flag = false;
        }
        
        if(send_flag == true){

            $.ajax({
                type : 'POST',
                data : {
                    branch : branch, _token:_token
                },
                url : '/setting',
                success: function(data) {              
                    swal("Your branch has been created!", {
                        buttons: false,
                        icon: "success",
                        timer: 2000
                      });         
                    // module_body.prepend(templates.alert_box( {type: 'success', message: data} ));
                    loadResults();
                    clearform1();
                },
                error: function(xhr,status,error){
                    var err = eval("(" + xhr.responseText + ")");
                    module_body.prepend(templates.alert_box( {type: 'danger', message: err.error.message} ));
                },
                beforeSend: function() {
                    form.css({'opacity' : '0.4'});
                },
                complete: function() {
                    form.css({'opacity' : '1.0'});
                }
            });
        }
    });

    $(document).on("click",".category-status",function(event){
        event.preventDefault();

        var table = $('all-student-category'),
            form = $(this).closest('form'),
            _token = form.data('csrf-token'),
            category_id = form.find('[name="category_id"]').val(),
            resource = 'category',
            url = '/student'+ '/' + resource + '/' + category_id;

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this student category!",
            icon: "warning",
            buttons: ["Cancel", "Delete"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {

                $.ajax({
                    type : 'POST',
                    data : { 
                        _token:_token
                    },
                    url : url,
                    success: function(data) {
                        swal("Poof! Your student category has been deleted!", {
                            buttons: false,
                            icon: "success",
                            timer: 2000
                          });
                        $('tr[data-id="'+category_id+'"]').remove();
                        loadResults();
                    },
                    error: function(xhr, msg){
                        console.log(msg);     
                    },
                    beforeSend: function() {
                        table.css({'opacity' : '0.4'});
                    },
                    complete: function() {
                        table.css({'opacity' : '1.0'});
                    }
                });
            } else {
                swal("Your studet category is safe!", {
                    buttons: false,
                    icon: "error",
                    timer: 2000,
                  });
            }
        });
        return false
    });

    $(document).on("click",".branch-status",function(event){
        event.preventDefault();

        var table = $('#all-branch'),
        form = $(this).closest('form'),
        _token = form.data('csrf-token'),
        branch_id = form.find('[name="branch_id"]').val(),
        resource = 'branch',
        url = '/student'+ '/' + resource + '/' + branch_id;

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this branch!",
            icon: "warning",
            buttons: ["Cancel", "Delete"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type : 'POST',
                    data : { 
                        _token:_token
                    },
                    url : url,
                    success: function(data) {
                        swal("Poof! Your branch has been deleted!", {
                            buttons: false,
                            icon: "success",
                            timer: 2000
                          });
                        $('tr[data-id="'+ branch_id+'"]').remove();
                        loadResults();
                    },
                    error: function(xhr, msg){
                        console.log(msg);     
                    },
                    beforeSend: function() {
                        table.css({'opacity' : '0.4'});
                    },
                    complete: function() {
                        table.css({'opacity' : '1.0'});
                    }
                });
            } else {
                swal("Your branch is safe!", {
                    buttons: false,
                    icon: "error",
                    timer: 2000,
                  });
            }
        });
        return false
    });
    
    $(".alert_box").hide().delay(5000).fadeOut();

    loadResults();

});

function clearform(){
    $('#student_category').val('');
    $('#max_allow').val('');
}

function clearform1(){
    $('#branch').val('');
}