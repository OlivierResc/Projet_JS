(function() {
    'use strict';
    $(() => {
        $.ajax({
            url: '/json/is_connected.php',
            method: 'get'
        }).done(function (data) {
            console.log(data);
            $('#deconn').hide();
            $('#voteEA').hide();
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

                $('#acc')
                    .on('click', function () {
                        window.location.href = 'index.html';
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


                /*$('body').append(
                    $('<button />')
                        .html('Grille')
                        .on('click', function () {
                                $.ajax({
                                    url: '/json/grille.php',
                                    method: 'get'
                                }).done(function(data) {
                                        for (let i = 0; i < 30; i++ ) {
                                            $('body').append(
                                                $('<section />').append(data.grille[i])
                                            )
                                        }
                                    }
                                )
                            }
                        )
                )*/


                $.ajax({
                    url:'/json/grille_equipe.php',
                    method:'get',
                }).done(function(data){
                        $('#nomE').append(' ' + data.nom);
                        $('#villeE').append(' ' + data.ville);
                        $('#classementE').append(' ' + data.classement);
                        $('#voteE').append(' ' + data.vote);
                        $('#logo').append();
                })


                $.ajax({
                    url: '/json/joueur.php',
                    method: 'get'
                }).done(function(data){
                    for (let i = 0; i < 1 ; ++i){
                        $('#nomJ0').append(data.nom[0]);
                        $('#numJ0').append(data.num[0]);
                        $('#natJ0').append(data.nat[0]);
                        console.log(data.nat[0]);

                        $('#nomJ1').append(data.nom[1]);
                        $('#numJ1').append(data.num[1]);
                        $('#natJ1').append(data.nat[1]);
                        $('#nomJ2').append(data.nom[2]);
                        $('#numJ2').append(data.num[2]);
                        $('#natJ2').append(data.nat[2]);
                        $('#nomJ3').append(data.nom[3]);
                        $('#numJ3').append(data.num[3]);
                        $('#natJ3').append(data.nat[3]);
                        $('#nomJ4').append(data.nom[4]);
                        $('#numJ4').append(data.num[4]);
                        $('#natJ4').append(data.nat[4]);
                        $('#nomJ5').append(data.nom[5]);
                        $('#numJ5').append(data.num[5]);
                        $('#natJ5').append(data.nat[5]);
                        $('#nomJ6').append(data.nom[6]);
                        $('#numJ6').append(data.num[6]);
                        $('#natJ6').append(data.nat[6]);
                        $('#nomJ7').append(data.nom[7]);
                        $('#numJ7').append(data.num[7]);
                        $('#natJ7').append(data.nat[7]);
                        $('#nomJ8').append(data.nom[8]);
                        $('#numJ8').append(data.num[8]);
                        $('#natJ8').append(data.nat[8]);
                        $('#nomJ9').append(data.nom[9]);
                        $('#numJ9').append(data.num[9]);
                        $('#natJ9').append(data.nat[9]);
                        //$('#nomJ').append(data.num[key]);
                        //$('#nomJ').append(data.nat[key]);
                        //console.log(data.nom[i]);
                    }
                })


                $.ajax({
                    url: '/json/verif_vote.php',
                    method: 'get'
                }).done(function(data){
                    console.log(data.a_vote);
                    console.log(data.id);
                    if(data.a_vote == true){
                        $('#bVote').attr("disabled", true);
                        $('#bVote').fadeOut();
                        $('#message').html(data.message).fadeIn().append(' ' + data.nom + ' !');
                    }
                })


                $('body').append(
                    $('<button id="bVote" />')
                        .html('Vote')
                        .on('click', function () {
                            //this.disabled = true;
                            $.ajax({
                                url: '/json/vote.php',
                                method: 'get'
                            }).done(function(data){
                                let voteP = data.vote;
                                let voteA = data.voteAct;
                                console.log(voteP);
                                console.log(voteA);
                                console.log(++voteP);
                                let nbP = Number(voteP);
                                console.log(nbP);
                                if(voteA == nbP)
                                {
                                    $('#bVote').attr("disabled", true);
                                    $('#bVote').fadeOut();
                                    $('#message').html(data.message).slideDown('1500').append(' ' + data.nom + ' !');
                                    $('#voteE').slideUp('slow');
                                    $('#voteEA').slideDown('slow').append(' ' + voteA);
                                }else{
                                    $('#message').html(data.message).fadeOut();
                                    $('#voteEA').hide();
                                }
                                //console.log(data.voteAct);
                            })
                        })
                )

            } else {
                /* le user n'est pas connecté */
                window.location.href = '/login.html';
            }
        }).fail(function () {
            $('body').html('Une erreur critique est arrivée.');
        });
    });

}) ();