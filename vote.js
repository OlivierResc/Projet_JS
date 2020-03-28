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


                $.ajax({
                    url:'/json/imgV.php',
                    method: 'get'
                }).done(function(data){
                    console.log(data.grille);
                    console.log(data.grilleId);
                    for (let i = 0; i < 1; ++i){
                        $('#nomE0').append(data.grilleId[0])
                        $('#nomE1').append(data.grilleId[1])
                        $('#nomE2').append(data.grilleId[2])
                        $('#nomE3').append(data.grilleId[3])
                        $('#nomE4').append(data.grilleId[4])
                        $('#nomE5').append(data.grilleId[5])
                        $('#nomE6').append(data.grilleId[6])
                        $('#nomE7').append(data.grilleId[7])
                        $('#nomE8').append(data.grilleId[8])
                        $('#nomE9').append(data.grilleId[9])
                        $('#nomE10').append(data.grilleId[10])
                        $('#nomE11').append(data.grilleId[11])
                        $('#nomE12').append(data.grilleId[12])
                        $('#nomE13').append(data.grilleId[13])
                        $('#nomE14').append(data.grilleId[14])
                        $('#nomE15').append(data.grilleId[15])
                        $('#nomE16').append(data.grilleId[16])
                        $('#nomE17').append(data.grilleId[17])
                        $('#nomE18').append(data.grilleId[18])
                        $('#nomE19').append(data.grilleId[19])
                        $('#nomE20').append(data.grilleId[20])
                        $('#nomE21').append(data.grilleId[21])
                        $('#nomE22').append(data.grilleId[22])
                        $('#nomE23').append(data.grilleId[23])
                        $('#nomE24').append(data.grilleId[24])
                        $('#nomE25').append(data.grilleId[25])
                        $('#nomE26').append(data.grilleId[26])
                        $('#nomE27').append(data.grilleId[27])
                        $('#nomE28').append(data.grilleId[28])
                        $('#nomE29').append(data.grilleId[29])
                    }
                })

                $.ajax({
                    url:'/json/imgV.php',
                    method: 'get'
                }).done(function(data){
                    console.log(data.grille);
                    console.log(data.grilleId);
                    for (let i = 0; i < 1; ++i){
                        $('#nmE0').append(data.grille[0])
                        $('#nmE1').append(data.grille[1])
                        $('#nmE2').append(data.grille[2])
                        $('#nmE3').append(data.grille[3])
                        $('#nmE4').append(data.grille[4])
                        $('#nmE5').append(data.grille[5])
                        $('#nmE6').append(data.grille[6])
                        $('#nmE7').append(data.grille[7])
                        $('#nmE8').append(data.grille[8])
                        $('#nmE9').append(data.grille[9])
                        $('#nmE10').append(data.grille[10])
                        $('#nmE11').append(data.grille[11])
                        $('#nmE12').append(data.grille[12])
                        $('#nmE13').append(data.grille[13])
                        $('#nmE14').append(data.grille[14])
                        $('#nmE15').append(data.grille[15])
                        $('#nmE16').append(data.grille[16])
                        $('#nmE17').append(data.grille[17])
                        $('#nmE18').append(data.grille[18])
                        $('#nmE19').append(data.grille[19])
                        $('#nmE20').append(data.grille[20])
                        $('#nmE21').append(data.grille[21])
                        $('#nmE22').append(data.grille[22])
                        $('#nmE23').append(data.grille[23])
                        $('#nmE24').append(data.grille[24])
                        $('#nmE25').append(data.grille[25])
                        $('#nmE26').append(data.grille[26])
                        $('#nmE27').append(data.grille[27])
                        $('#nmE28').append(data.grille[28])
                        $('#nmE29').append(data.grille[29])
                    }
                })





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