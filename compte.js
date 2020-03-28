(function() {
    'use strict';
    $(() => {
        $.ajax({
            url: '/json/is_connected.php',
            method: 'get'
        }).done(function (data) {
            console.log(data);
            $('#deconn').hide();
            if (data) {
                /* le user est connecté */
                $('#userco').show();
                $('#conn').hide();
                $('#deconn').show();

                $('#deconn').on('click',function(){
                    $.ajax({
                        url: '/json/logout.php',
                        method: 'get'
                    }).done(function () {
                        window.location.href = '/login.html';
                    });
                })

                $.ajax({
                    url:'/json/userco.php',
                    method:'post',
                    data: $(this).serialize()
                }).done(function(data){
                    $('#nomU').append(data.user)
                    $('#mailU').append(data.mail)
                    $('#idU').append(data.id)
                    $('#adU').append(data.admin)
                })

                $('#acc')
                    .on('click', function () {
                        window.location.href = 'index.html';
                    });

                $('#classem')
                    .on('click', function () {
                        window.location.href = 'vote.html';
                    });


                $.ajax({
                    url:'/json/userco.php',
                    method:'post',
                    data: $(this).serialize()
                }).done(function(data){
                    console.log($(this));
                    if(data.success === true) {
                        $('#userco').append(data.user + ' connecté en tant que ' + data.admin);
                        console.log(data.user);
                    }
                })

                $('#form-change').submit(function(){
                    $('#message').fadeOut();
                    $.ajax({
                        url:'/json/compte.php',
                        method:'post',
                        data: $(this).serialize(),
                    }).done(function (data){
                        if(data.success === true){
                            console.log(data.success);
                            $.ajax({
                                url: '/json/logout.php',
                                method: 'get'
                            }).done(function () {
                                window.location.href = '/login.html';
                            });

                        } else{
                            $('#message').html(data.message).fadeIn();
                        }
                    }).fail(function() {
                        $('body').html("une erreur critique est arrivée!!");
                    })
                    return false;
                })


            } else {
                /* le user n'est pas connecté */
                window.location.href = '/login.html';
            }
        }).fail(function () {
            $('body').html('Une erreur critique est arrivée.');
        });
    });
}) ();

