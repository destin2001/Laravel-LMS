function loadResults() {
  var url = "/books?category_id=" + $('.dropdown-item').data('value');
  var table = $('#all-books');
  var default_tpl = _.template($('#allbooks_show').html());

  $.ajax({
    url: url,
    success: function(data) {
      console.log(data);
      if ($.isEmptyObject(data)) {
        table.html('<tr><td class="align-middle text-lg px-4 py-3"><span class="badge badge-pill badge-lg bg-gradient-danger">There are no books in this category</span></td></tr>');
    } else {
        table.html('');
        for (var book in data) {
          table.append(default_tpl(data[book]));
        }
      }
    },
    beforeSend: function() {
      table.css({'opacity': 0.4});
    },
    complete: function() {
      table.css({'opacity': 1.0});
    }
  });
}

$(document).ready(function(){

    $('.dropdown-item').click(function(e) {
        e.preventDefault();

        var value = $(this).data('value');
        var text = $(this).text();

        // Update the text of the button with the selected category
        $('#dropdownMenuButton').text(text);
        $('#dropdownMenuButton').data('value', value);

        var url =  "/bookBycategory/" + $(this).data('value');
        var table = $('#all-books');
        var default_tpl = _.template($('#allbooks_show').html());
        $.ajax({
            url : url,
            success : function(data){
                console.log(data);
                if($.isEmptyObject(data)){
                    table.html('<tr><td class="align-middle text-lg px-4 py-3"><span class="badge badge-pill badge-lg bg-gradient-danger">There are no books in this category</span></td></tr>');
                } else {
                    table.html('');
                    for (var book in data) {
                        table.append(default_tpl(data[book]));
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
    });

  
$(document).on("click","#addbooks",function(){

        var form = $(this).parents('form'),
            module_body = $(this).parents('.module-body'),
            sendJSON ={},
            send_flag = true,
            f$ = function(selector) {
                return form.find(selector);
            };

        title = f$('input[data-form-field~=title]').val();
        author = f$('input[data-form-field~=author]').val();
        description = f$('textarea[data-form-field~=description]').val();
        category_id = f$('select[data-form-field~=category]').val();
        number = parseInt(f$('input[data-form-field~=number]').val());
        auth_user = f$('input[data-form-field~=auth_user]').val();
        _token = f$('input[data-form-field~=token]').val();

        if(title == "" || author == "" || description == "" || number == null){
            module_body.prepend(templates.alert_box( {type: 'danger', message: 'Book Details Not Complete'} ));
            send_flag = false;
        }
        
        if(send_flag == true){

            $.ajax({
                type : 'POST',
                data : {
                   title:title, author:author, description:description,
                    number:number, category_id : category_id, _token:_token,
                    auth_user:auth_user
                },
                url : '/books',
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

loadResults();


});

function clearform(){
    $('#title').val('');
    $('#author').val('');
    $('#description').val('');
    $('#number').val('');
    $('#category').val('');
}