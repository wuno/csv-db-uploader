function displayRecords(lim, off) {
  jQuery.ajax({
          type: "GET",
          async: false,
          url: assetPath,
          data: "limit=" + limit + "&offset=" + offset,
          cache: false,
          beforeSend: function() {
            $("#loader_message").html("").hide();
            $('#loader_image').show();
          },
          success: function(html) {
            $("#productResults").append(html);
            $('#loader_image').hide();
            if ($.trim(html) === "") {
             $("#loader_message").html('<p>There are no more results...</p>').show();
            } else {
             $("#loader_message").html('Loading... Scroll down for more...').show();
            }
            window.busy = false;
          }
        });
}