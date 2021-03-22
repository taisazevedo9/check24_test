(function($) {
  "use strict"; // Start of use strict
    $(".deletModal").on('click',deletModal);
    $(".deletArticle").on('click',sendDelet);
    

  })(jQuery); // End of use strict
  
  function deletModal()
  {
    var param = $(this).attr('data-rel');
    var result = param.split("|");
    $("#deletModal").modal().find(".modal-body").text(result[1]);
    $("#hiddenId").val(result[0]);
    // $('.deletArticle').val(result[0]);

    
  }
  function sendDelet(){
    
        $.post( "http://localhost/check24_test/admin/delete/" + $("#hiddenId").val(),  
        function(response) {
          if(response.message == 'false'){
            $('#deletModal').modal('hide');
            $('#dataTable').DataTable().draw();
          }else{
            window.reload();
          }
            
        });
      }
