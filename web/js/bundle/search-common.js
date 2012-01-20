/*
  SEARCH
  - Shortcuts: "alt+s" then <key>
    · "a" => Toggle Advanced Search options
    · "r" => Reset form
    · "s" => Submit form
*/
jQuery(function($){
  
  /*
    Advanced search toggle.
  */
  var search_advanced = $('#search-advanced');
  if (search_advanced.length) {
    search_advanced.click(function(e) {
      e.preventDefault();
      $('#search-secondary').toggle();
    });
    jwerty.key('alt+s, a', function(){ search_advanced.click(); });
  }
  
  // Reset and Submit
  jwerty.key('alt+s, r', function(){ $("#search-reset").click();  });
  jwerty.key('alt+s, s', function(){ $("#search-submit").click(); });
  
});