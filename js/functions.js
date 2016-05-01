jQuery(function($) {

    $('.voir-actu').click(function(){
        $(this).parent().find('.popup').css({
            display: 'block'
        });
    });

    $('.ion-close').click(function(){
        $(this).parent().css({
            display: 'none'
        });
    });

    $('.ion-help').click(function(){
        $(this).next().toggleClass( "show" );
    });
  //  Au focus
  $('.champ-input').focus(function(){
    $(this).parent().addClass('is-focused has-label');
  });

  // à la perte du focus
  $('.champ-input').blur(function(){
    $parent = $(this).parent();
    if($(this).val() == ''){
      $parent.removeClass('has-label');
    }
    $parent.removeClass('is-focused');
  });

  // si un champs est rempli on rajoute directement la class has-label
  $('.champ-input').each(function(){
    if($(this).val() != ''){
      $(this).parent().addClass('has-label');
    }
  });

  $('.edit-actu').click(function(){
      var x= $(this).attr('id');
      alert(x);
      $(".title, .ajout-acc, .actu").fadeOut("500", function(){
          var y= ".login-container--" + x;
          $(y).fadeIn("fast");
          });
      });

  $(".suppr-actu").click(function(){
      $(".title, .ajout-acc, .actu").fadeOut("500", function(){
          $(".login-container-del").fadeIn("fast");
          });
      });

  $(".login-close").click(function(){
      $(".login-container").fadeOut("500", function(){
          $(".title, .ajout-acc, .actu").fadeIn("fast");
          });
      });

  $(".valider-btn").click(function(){
      if($("#user").val() == 'demo' && $("#mdp").val() == '123456'){
        $(".login-container").fadeOut("1000", function(){
            $("#57").fadeIn("fast");
        });
    }
    });

    $(".valider-btn-del").click(function(){
        if($("#user-del").val() == 'demo' && $("#mdp-del").val() == '123456'){
          $(".login-container-del").fadeOut("1000", function(){
              $("#suppr").fadeIn("fast");
          });
      }
      });
})
