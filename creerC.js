(function() {
    'use strict';
    $(() => {
        $('#form-new').submit(function (){
            $('#message').fadeOut();
            //let $self = $(this);
            $.ajax({
                url:'/json/creerC.php',/*$(this).attr('action')*/
                method:'post',/*$(this).attr('method')*/
                data:$(this).serialize()
            }).done(function (data){
                //console.log($self);
                console.log($(this));
                console.log(data);
                if(data.success === true){
                    window.location.href = '/login.html';
                } else{
                    $('#message').html(data.message).fadeIn();
                }

            }).fail(function() {
                $('body').html("une erreur critique est arrivée!!");
            });
            return false;
        });
    });
}) ();