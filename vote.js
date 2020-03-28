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


                /*$('#form-data').submit( function () {
                    $.ajax({
                        url:'/json/img.php',
                        method:'post',
                        data:$(this).serialize(),
                    }).done(function (data){
                        if(data.success === true){
                            console.log(data.success);
                            console.log(data.taille);
                            console.log(data.nom);
                            console.log(data.type);
                            console.log(data.blob);
                        } else{
                            $('#message').html(data.message).fadeIn();
                        }
                    }).fail(function() {
                        $('body').html("une erreur critique est arrivée!!");
                    })
                    return false;
                });*/


                /*$.ajax({
                    url:'/json/imgV.php',
                    method:'get',
                }).done(function(data){
                    console.log(data.image)
                    console.log(typeof (data.image))
                    let srci = "Bucks.png";
                    console.log(typeof (srci))
                    $('body').append(
                        $('<section class="lazone"/>').append(
                            $('<article class="zone"/>').append(
                                $('#image').attr("src",data.image)
                                    .css({"width": "300",
                                        "height": "300"})
                            )
                        )
                    )
                })*/


                $('body').append(
                    $('<button id="bGrille" />')
                        .html('Liste')
                        .on('click', function () {
                            $.ajax({
                                url: '/json/imgV.php',
                                method: 'get'
                            }).done(function (data) {
                                console.log(data.liste);
                                //window.location.href = '/login.html';
                                //$('body').append(data.detail["Mavericks"]);
                                for (let i = 0; i < 30; ++i) {
                                    console.log(data.liste[i])
                                    $('body').append(
                                        $('<section class="lazone"/>').append(
                                            $('<article class="zone"/>').append(
                                                $('<img />').attr("src",data.liste[i]).css({"width": "300",
                                                    "height": "300"})
                                            )
                                        )
                                    )
                                }
                            })
                        })
                )

                $('body').append(
                    $('<button id="bGrille" />')
                        .html('Liste2')
                        .on('click', function () {
                            $.ajax({
                                url: '/json/imgV.php',
                                method: 'get'
                            }).done(function (data) {
                                console.log(data.liste);
                                //window.location.href = '/login.html';
                                //$('body').append(data.detail["Mavericks"]);
                                for (let i = 0; i < 30; ++i) {
                                    $('body').append(
                                            $('<article class="zone"/>').append(
                                                $('<img />').attr("src",data.liste[i]).css({"width": "350",
                                                    "height": "350"})))
                                }
                            })
                        })
                )


                $.ajax({
                    url:'/json/userco.php',
                    method:'post',
                    data: $(this).serialize()
                }).done(function(data){
                    console.log($(this));
                    if(data.success === true) {
                        $('#userco').append(data.admin);
                        console.log(data.user);
                    }
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