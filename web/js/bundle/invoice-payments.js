jQuery(function($){
  
  /*
    To enable popover payments in invoice tables add the data-type="invoices"
    attribute to the <table> element. The link that shows the payments must
    have a class name of "payments" and its href attribute must be the URL from
    which retrieve the payments form.
    
    <table data-type="invoices">
      ...
      <tr>
        ...
        <td>
          <a href="/url/to/the/payments" class="... payments">Payments</a>
        </td>
      </tr>
      ...
    </table>
  */
  
  // Payments form: display events
  
  $('table[data-type="invoices"]').delegate('a.payments', 'click', function(e){
    e.preventDefault();
    e.stopPropagation();
    
    var pos = $.extend({}, $(this).offset(), {
      width: this.offsetWidth,
      height: this.offsetHeight
    });
    
    // Remove visible forms and do nothing if this is a toggle state.
    var invoiceId = parseInt($(this).data('invoice-id'));
    if ($('.payments-popover[data-invoice-id="' + invoiceId + '"]').length > 0)
    {
      $('.payments-popover').remove();
      return false;
    };
    
    // Else, load the popover with payments for the invoice.
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
  
  // Payments form: closing events and actions
  
  $(document.body)
    // Close popover
    .delegate('.payments-popover .buttons button.secondary', 'click', function(e){
      $('.payments-popover').remove();
    })
    // Add payment via AJAX and update div.content
    .delegate('.payments-popover .buttons button[type="submit"]', 'click', function(e){
      e.preventDefault();
      var form = $(this).closest('form');
      
      $.post(form.attr('action'), form.serialize(), function(html){
        form.closest('div.content').html(html);
      }, 'html');
    })
    // Remove payments via AJAX and update div.content
    .delegate('.payments-popover .buttons a.trash', 'click', function(e){
      e.preventDefault();
      var form = $(this).closest('form');
      
      $.post($(this).attr('href'), form.serialize(), function(html){
        form.closest('div.content').html(html);
      }, 'html');
    })
  ;
  // Hide popovers with ESC key
  jwerty.key('esc', function(){ $('.payments-popover').remove(); });
  
});
