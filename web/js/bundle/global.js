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
  
  
  
  /*
    Global TABLE functions:
    - Row selection
  */
  
  // ROW SELECTION
  $(document)
    // "Select all" toggle.
    .delegate('table :checkbox[name="all"]', 'click', function(e){
      var table  = $(this).closest('table');
      var checks = table.find(':checkbox:not([name="all"])');
      
      if ($(this).is(':checked'))
        checks.attr('checked', 'checked');
      else
        checks.removeAttr('checked');
    })
    // All other checkboxes
    .delegate('table :checkbox:not([name="all"])', 'click', function(e){
      var table   = $(this).closest('table');
      var all     = table.find(':checkbox[name="all"]');
      var checks  = table.find(':checkbox').not(all);
      var checked = table.find(':checkbox:checked').not(all);
      
      if (checks.length == checked.length)
        all.attr('checked', 'checked');
      else
        all.removeAttr('checked');
    })
  ;
});