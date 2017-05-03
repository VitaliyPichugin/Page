$(document).ready(function(){

    //отправка сообщения
    $('#msg').click(function(event){
        event.preventDefault();
        var msg = $('#message').val();
        //alert(msg);
        if(msg == ''){
            $('#message').css('border', '2px solid red');
            return false;
        }
        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: 'submit='+msg,
            success: function(){
                $('#lbl_msg').html('Сообщение отправлено').css('color', 'green');
                $("#lbl_msg").fadeOut(500, function () {
                    show();
                });

            },
            error: function(){
                alert('error');
            }

        });
    });
    //отправка сообщения

    //комментирование
    $(".d1").each(function(){
        var self_d = $(this);

        $(this).dialog({
            autoOpen: false,
            height: 300,
            width: 400,
            show: "blind",
            modal: true,
            title: 'Комментарий',
            buttons: {
                "Отправить" : function(){
                    var  comment;
                    var id;
                    $('.comment').each(function(){
                        if($(this).attr('id') == self_d.attr('id')){
                            comment = $(this).val();
                            id = $(this).attr('id');
                        }
                    });

                    if(comment == ''){
                        alert('Заполните текстовое поле');
                        return false;
                    }else{
                        $('.comment').val('');
                        self_d.dialog('close');

                        $.ajax({
                            type: "POST",
                            url: "index.php",
                            data: "msg_id="+id+"&msg="+comment,
                            success: function(){
                                show();
                            }
                        });
                    }

                },

                "Отмена" : function(){
                    self_d.dialog("close");
                }
            }
        });
    });
    //комментирование

    //кнопка комментирования
    $(".b1").each(function(){
        $(this).click(function(){
            var b1 = $(this).attr('id');
            $(".d1").each(function(){
                if($(this).attr('id') == b1){
                    $('.d1').dialog('close');
                    $(this).dialog('open');
                }
            });
        });
    });
    //кнопка комментирования

    //редактирование
    $(".d_edit").each(function(){
        var self_d = $(this);

        $(this).dialog({
            autoOpen: false,
            height: 300,
            width: 400,
            show: "blind",
            modal: true,
            title: 'Редактирование',
            buttons: {
                "Отправить" : function(){
                    var  comment;
                    var id;
                    $('.comment_edit').each(function(){
                        if($(this).attr('id') == self_d.attr('id')){
                            comment = $(this).val();
                            id = $(this).attr('id');
                        }
                    });

                    if(comment == ''){
                        alert('Заполните текстовое поле');
                        return false;
                    }else{
                        $('.comment').val('');
                        self_d.dialog('close');

                        $.ajax({
                            type: "POST",
                            url: "index.php",
                            data: "msg_editId="+id+"&msg_edit="+comment,
                            success: function(){
                                show();
                            }
                        });
                    }


                },

                "Отмена" : function(){
                    self_d.dialog("close");
                }
            }
        });
    });
    //редактирование

    //кнопка редактирования
    $(".b_edit").each(function(){
        $(this).click(function(){
            var b_edit = $(this).attr('id');
            $(".d_edit").each(function(){
                if($(this).attr('id') == b_edit){
                    $('.d_edit').dialog('close');
                    $(this).dialog('open');
                }
            });
        });
    });
    //кнопка редактирования

    //перезагрузка
    function show(){
        $.ajax({
            url:'index.php',
            cashe: false,
            success:function(html){
                $(".reload").replaceWith(html);
            }
        });
    }
    //перезагрузка


});

