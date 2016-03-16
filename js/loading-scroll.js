$(window).scroll(function() {
          if ($(window).scrollTop() + $(window).height() > $("#productResults").height() && !busy) {
            offset = limit + offset;
       displayRecords(limit, offset);
 
          }
});