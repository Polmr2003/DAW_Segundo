//Jquery
//cuando cargue la página
$(document).ready(function() {

    // Cojemos todas las classes que tengan draggable i los inicializamos draggable
    $(".draggable").draggable({
      revert: "invalid",
      cursor: "move"
    });

    $(".categoria").droppable({
      accept: ".draggable",
      drop: function(event, ui) {
        $(this).append(ui.helper);
      }
    });
  });