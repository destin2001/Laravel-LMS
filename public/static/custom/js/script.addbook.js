function loadResults() {
  var url = "/books?category_id=" + $('.dropdown-item').data('value');
  var table = $('#all-books');
  var default_tpl = _.template($('#allbooks_show').html());

  $.ajax({
    url: url,
    success: function(data) {
      console.log(data);
      if ($.isEmptyObject(data)) {
        table.html('<tr><td colspan="7" class="align-middle text-center text-lg px-4 py-3"><span class="badge badge-pill badge-lg bg-gradient-danger">There are no books in this category</span></td></tr>');
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

  
$(document).on("click","#addbooks",function(event){
        var form = $(this).parents('form'),
            sendJSON ={},
            send_flag = true,
            f$ = function(selector) {
                return form.find(selector);
            };

        var inputs = [
            document.getElementById("title"),
            document.getElementById("author"),
            document.getElementById("publisher"),
            document.getElementById("number")
        ];

        title = f$('input[data-form-field~=title]').val();
        author = f$('input[data-form-field~=author]').val();
        publisher = f$('input[data-form-field~=publisher]').val();
        publish_year = f$('select[data-form-field~=publish_year]').val();
        description = f$('textarea[data-form-field~=description]').val();
        category_id = f$('select[data-form-field~=category]').val();
        number = parseInt(f$('input[data-form-field~=number]').val());
        auth_user = f$('input[data-form-field~=auth_user]').val();
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
                    title:title, author:author,
                    publisher:publisher,publish_year:publish_year,
                    description:description,
                    number:number, category_id : category_id, _token:_token,
                    auth_user:auth_user
                },
                url : '/books',
                success: function(data) {        
                    swal("Your book has been created!", {
                        buttons: false,
                        icon: "success",
                        timer: 2000
                      });            
                    // module_body.prepend(templates.alert_box( {type: 'success', message: data} ));
                    clearform();
                },
                error: function(xhr,status,error){
                    var err = JSON.parse(xhr.responseText);
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

loadResults();


});

function clearform(){
    $('#title').val('');
    $('#author').val('');
    $('#publisher').val('');
    $('#description').val('');
    $('#number').val('');
    $('#choices-button1').val('');
    $('#choices-button2').val('');}