 $(document).ready(function(){
    $(".button-collapse").sideNav();

    $('.button-collapse').sideNav({menuWidth: 240, activationWidth: 70});

    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();

    $('.dropdown-button').dropdown({
      constrain_width: false, // Does not change width of dropdown to that of the activator
      alignment: 'right', // Aligns dropdown to left or right edge (works with constrain_width)
      gutter: 4, // Spacing from edge
      width: 500,
        }
    );

    $('.parallax').parallax();
        
    $('ul.tabs').tabs();

  });