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


                $('body').append(
                    $('<button id="bGrille" />')
                        .html('Grille')
                        .on('click', function () {
                            $.ajax({
                                url: '/json/grille.php',
                                method: 'get'
                            }).done(function (data) {
                                //window.location.href = '/login.html';
                                //$('body').append(data.detail["Mavericks"]);
                                for(let i = 0; i < 30; ++i) {
                                    console.log(data.ids[i]);
                                    //for (let key in data.grille) {
                                    $('body').append(

                                        $('<section class="lazone"/>').append(
                                            $('<article class="zone"/>').append(
                                                $('<button />').append(data.grille[i])
                                                    .on('click', function () {
                                                        let idS = data.ids[i];
                                                        $.ajax({
                                                            url: '/json/grille.php',
                                                            method: 'post',
                                                            data: {
                                                                "idE" : idS
                                                            }
                                                        }).done(function (res) {
                                                            console.log(data.ids[i]);
                                                            console.log(idS);
                                                            console.log(res);
                                                            window.location.href = 'grille_equipe.html';
                                                            /*$('.zone').append(res.nom + ' de ' + res.ville);
                                                            console.log(res.nom);*/
                                                        })
                                                    })
                                            )
                                        )
                                    )
                                    //}
                                }
                            })
                        })
                );


                $('#acc')
                    .on('click', function () {
                        window.location.href = 'index.html';
                    });


                $('body').append(
                    $('<div />').append(
                        $('<button id="img" />')
                            .html('image')
                            .on('click',function() {
                                window.location.href = '/vote.html';
                            })
                    )
                )

                /*$('body').append(
                    $('<div />').append(
                        $('<button id="dequipe" />')
                            .html('joueur')
                            .on('click',function() {
                                $.ajax({
                                    url: '/json/joueur.php',
                                    method: 'get'
                                }).done(function(data){
                                    for (let key in data.detail) {
                                        $('body').append(
                                            $('<div />').append(
                                                $('<div />').append(data.detail[key])
                                            )
                                        )
                                    }
                                })
                            })
                    )
                );*/


                $.ajax({
                    url:'/json/userco.php',
                    method:'post',
                    data: $(this).serialize()
                }).done(function(data){
                    console.log($(this));
                    if(data.success === true) {
                        $('#userco').append(data.user + ' connecté en tant que ' + data.admin);
                        //console.log(data.user);
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