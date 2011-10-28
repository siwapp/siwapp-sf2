jQuery(function($){
  
  /*
    To enable popover payments in invoice tables add the data-type="invoices"
    attribute to the <table> element. The link that shows the payments must
    have a class name of "payments" and its href attribute must be the URL from
    which retrieve the payments form.
    
    TODO: The payments form must be AJAX submitted, updating its div.content
          with the results.
    TODO: Removing items must be done in AJAX, updating div.content. Use checkboxs
          and a single button to remove selected.
  */
  
  // Payments form display events
  
  $('table[data-type="invoices"]').delegate('a.payments', 'click', function(e){
    e.preventDefault();
    
    var pos = $.extend({}, $(this).offset(), {
      width: this.offsetWidth,
      height: this.offsetHeight
    });
    
    $.get($(this).attr('href'), function(data){
      // Remove visible forms
      $('.payments-popover').remove();
      // Create new popover
      var tip = $(data).css({ top: 0, left: 0, display: 'block' })
        .prependTo(document.body);
      // Position popover
      $(tip).css({
        top: pos.top + pos.height / 2 - tip[0].offsetHeight / 2,
        left: pos.left - tip[0].offsetWidth - 5
      });
    }, 'html');
  });
  
  // Payments form closing events
  
  $(document.body).delegate('.payments-popover button.secondary', 'click', function(e){
    $('.payments-popover').remove();
  });
  
  jwerty.key('esc', function(){ $('.payments-popover').remove(); });
  
});
