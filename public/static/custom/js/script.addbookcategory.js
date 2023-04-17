function loadResults(){

    var url =  "/book-categories";

    var table = $('#all-category');
    
    var default_tpl = _.template($('#allcategory_show').html());

    $.ajax({
        url : url,
        success : function(data){
            console.log(data);
            if($.isEmptyObject(data)){
                table.html('<tr><td class="align-middle text-lg px-4 py-3"><span class="badge badge-pill badge-lg bg-gradient-danger">There are no category in database</span></td></tr>');
            } else {
                table.html('');
                for (var categories in data) {
                    table.append(default_tpl(data[categories]));
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

    $(document).on("click",".category-status",function(event){
        event.preventDefault();

        var table = $('#all-category'),
        form = $(this).closest('form'),
        _token = form.data('csrf-token'),
        category_id = form.find('[name="category_id"]').val(),
        url = '/bookcategorydelete/' + category_id;

        console.log(_token);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this category!",
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
                        swal("Poof! Your category has been deleted!", {
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
                swal("Your category is safe!", {
                    buttons: false,
                    icon: "error",
                    timer: 2000,
                  });
            }
        });
        return false
    });

    $(document).on("click","#addbookcategory",function(){

        var form = $(this).parents('form'),
            module_body = $(this).parents('.card-body'),
            input = document.getElementById("category-input"),
            sendJSON ={},
            send_flag = true,
            f$ = function(selector) {
                return form.find(selector);
            };

        category = f$('input[data-form-field~=category]').val();
        _token = f$('input[data-form-field~=token]').val();

        if(category == ""){
            input.classList.add("shake");
            input.style.borderColor = "red";
            setTimeout(function() {
                input.classList.remove("shake");
                input.style.borderColor = "";
            }, 1000);
            
            module_body.prepend(templates.alert_box( {type: 'danger', message: 'Category Field is Required'} ));
            send_flag = false;
        }
        
        if(send_flag == true){
            $.ajax({
                type : 'POST',
                data : {
                    category : category, _token:_token
                },
                url : '/bookcategory',
                success: function(data) {      
                    console.log(data);
                    swal("Your category has been created!", {
                        icon: "success",
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

    $(".alert_box").hide().delay(5000).fadeOut();

    loadResults();

});

function clearform(){
    $('#category-input').val('');
}