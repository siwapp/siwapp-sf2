jQuery(function($){
  
  /*
    To enable popover payments in invoice tables add the data-type="invoices"
    attribute to the <table> element. The link that shows the payments must
    have a class name of "payments" and its href attribute must be the URL from
    which retrieve the payments form.
    
    TODO: Create a pretty confirm translated to the user language.
    TODO: The payments form must be AJAX submitted, updating its div.content
          with the results.
    TODO: Removing items must be done in AJAX, updating div.content. Use checkboxs
          and a single button to remove selected.
    TODO: Use http://keithcirkel.co.uk/jwerty/ to hide payments with ESC key
  */
  $('table[data-type="invoices"]').delegate('a.payments', 'click', function(e){
    // SHOW PAYMENTS FORM
    e.preventDefault();
    
    var pos = $.extend({}, $(this).offset(), {
      width: this.offsetWidth,
      height: this.offsetHeight
    });
    
    $.get($(this).attr('href'), function(data){
      $('.payments-popover').remove();
      var tip = $(data).css({ top: 0, left: 0, display: 'block' })
        .prependTo(document.body);
      $(tip).css({
        top: pos.top + pos.height / 2 - tip[0].offsetHeight / 2,
        left: pos.left - tip[0].offsetWidth - 5
      });
    }, 'html');
  });
  
  $(document.body).delegate('.payments-popover button.secondary', 'click', function(e){
    // CLOSE PAYMENTS FORM
    var remove = true;
    if ($(this).closest('form').is('[data-changed="true"]'))
      remove = confirm("TODO: i18n alert: FORM HAS CHANGED!!!");
    if (remove)
      $(this).closest('.payments-popover').remove();
  }).delegate('.payments-popover input[type="text"]', 'change', function(){
    // PAYMENTS FORM CHANGED
    $(this).closest('form').attr('data-changed', 'true');
  });
  
});
