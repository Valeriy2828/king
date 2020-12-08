jQuery(document).ready(function ($) {
    $('.commentlist li').each(function (i) {
        $(this).find('div.commentNumber').text('#' + (i + 1))//прономеровываем комментарий
    });

    $('#commentform').on('click','#submit',function (e) {//с кнопкой отправить
        e.preventDefault();//отменяем стандартное действие кнопки

        var comParent = $(this);

        $('.wrap_result').//всплывающее окно
                            css('color','green').//цвет зеленый текста
                            text('Сохранение комментария').//текст сообщения
                            fadeIn(500,function () {//плавно показать за 0.5 сек и дальше оброботка формы

                                var data = $('#commentform').serializeArray();
                                //alert(data);

                                $.ajax({
                                    url:$('#commentform').attr('action'),//обращаемя с атрибуту action
                                    data:data,
                                    //headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    type:'POST',
                                    datatype:'JSON',// получить данные в формате JSON
                                    success: function (html) {
                                       if (html.error){
                                            $('.wrap_result').
                                                              css('color','red').
                                                              append('<br><strong>Ошибка: </strong>' + html.error.join('<br>'));
                                           $('.wrap_result').delay(2000).fadeOut(500);
                                       }
                                       else if(html.success){
                                            $('.wrap_result')
                                                             .append('<br><strong>Сохранено!</strong>')
                                                             .delay(2000)//немного задержать надпись на 2 секунды "сохранено"
                                                             .fadeOut(500,function () {

                                                                 if (html.data.parent_id > 0){ //для ответов на комментарии
                                                                    comParent.parents('div#respond').prev().after('<ul class="children">' + html.comment + '</ul>');
                                                                 }else{
                                                                     if($.contains('#comments','ol.commentlist')){//проверить есть блок
                                                                          $('ol.commentlist').append(html.comment);//добавляем после содержимого
                                                                     }else{
                                                                          $('#respond').before('<ol class="commentlist group">' + html.comment + '</ol>');//добавить элемент перед выбранным - '#respond'
                                                                     }
                                                                 }

                                                                 $('#cancel-comment-reply-link').click();
                                                             })//скрыть,а 2-й аргумент показывает комментарий
                                                                //prev переместиться по дереву div вверх
                                                                //after после

                                       }
                                    },
                                    error:function () {
                                        $('.wrap_result').css('color','red'). append('<br><strong>Ошибка!</strong>');
                                        $('.wrap_result').delay(2000).fadeOut(500,function () {
                                            $('#cancel-comment-reply-link').click();
                                        });
                                    }
                                });
            
        });
    });
});