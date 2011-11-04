jQuery(function($){
  
  /*
    Global shortcuts:
    - Goto: "alt+g" then <key>
      · "d": Dashboard
      · "i": Invoices
      · "r": Recurring Invoices
      · "e": Estimates
      · "c": Customers
      · "n": New <section main item (Invoice|Estimate|Recurring Invoice...)>
      · "s": Settings
      · "q": Logout
  */
  
  // GLOBAL LINK SHORTCUTS SEARCH
  // Search links with href != "#" and a data-shortcut attribute. The shortcut
  // will redirect the user to the href page.
  $('a[data-shortcut]:not([href="#"])').each(function(){
    var href = $(this).attr('href');
    jwerty.key($(this).data('shortcut'), function(){ document.location.href = href; });
  });
  
});