jQuery(function($){
  
  /*
    Advanced search options. HOTKEY: "s" then "a"
  */
  var search_advanced = $('#search-advanced');
  if (search_advanced.length)
  {
    search_advanced.click(function(e) {
      e.preventDefault();
      $(this).toggleClass("active");
      $('#search-secondary').toggle();
    });
    jwerty.key('s, a', function(){ search_advanced.click(); });
  }
  
  jwerty.key('s, r', function(){ $("#search-reset").click(); });
  jwerty.key('s, s', function(){ $("#search-submit").click(); });
  
});