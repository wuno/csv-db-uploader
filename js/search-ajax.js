$("#itemID").keyup(function (){
    var url = searchPath;
    $.ajax({
        type  : "POST",
        async : false,
        url   : url,
        data: $('#itemID').serialize(),
        cache : false,
        success: function(html) {
           $( "#productResults" ).html( html );
    if ($.trim(html) === "") {
                  $("#loader_message").html('<p>There were no results that match your search criteria</p>').show();
              } else {
                  $("#loader_message").html('These are your search results...').show();
              }
    if( !$('#itemID').val() ) {                     
            displayRecords(limit, offset);   
        }
              html = null;
                window.busy = false;
          }
      });
});  