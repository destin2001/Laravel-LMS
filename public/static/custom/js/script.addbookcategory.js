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

    $(document).on("click","#addbookcategory",function(){

        var form = $(this).parents('form'),
            module_body = $(this).parents('.card-body'),
            sendJSON ={},
            send_flag = true,
            f$ = function(selector) {
                return form.find(selector);
            };

        category = f$('input[data-form-field~=category]').val();
        _token = f$('input[data-form-field~=token]').val();

        if(category == ""){
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
                    module_body.prepend(templates.alert_box( {type: 'success', message: data} ));
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
    $('#category').val('');
}