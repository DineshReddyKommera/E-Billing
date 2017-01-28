
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">

  <script type="text/javascript" src="//code.jquery.com/jquery-1.8.3.js"></script>

    <link rel="stylesheet" type="text/css" href="/css/result-light.css">
  


  <title>Demo</title>

  
    




<script type='text/javascript'>

$(window).load(function(){
   $(document).ready(function() {
var currentItem = $('#items').val();

$('#data').on('keyup', '.prevqty, .thisqty, .qty, .rate, .cal', calculateRow);

$('#addnew').click(function() {
    currentItem++;
    $('#items').val(currentItem);
    $('#data').append('<tr>\n\
        <td align="center"><textarea name="descrip_' + currentItem + '" cols="70" class="form-input-textareasm"></textarea></td>\n\
            <td align="center"><input type="text" size="6" maxlength="9" maxlength="6" name="thisqty_' + currentItem + '" class="thisqty form-input-rate"//></td>\n\
            <td align="center"><input type="text" size="6" maxlength="9" maxlength="6" name="rate_' + currentItem + '" class="rate form-input-rate"/></td>\n\
            <td align="center"><input type="text" size="6" maxlength="9" maxlength="6" name="amt_' + currentItem + '" class="cal  form-input-amt"/></td>\n\
        </tr>'
                     );
    $('#data').off('keyup').on('keyup', '.prevqty, .thisqty, .qty, .rate, .cal', calculateRow);
});

function calculateSum() {
    var sum = 0;
    $(".cal").each(function () {
        if (!isNaN(this.value) && this.value.length != 0) {
            sum += parseFloat(this.value);
        }
    });
    $("#total").val(sum.toFixed(2));
}

function calculateRow() {
    var cost = 0;
    var $row = $(this).closest("tr");
    var prevqty = parseFloat($row.find('.prevqty').val());
    var thisqty = parseFloat($row.find('.thisqty').val());
    var mcond = prevqty + thisqty;
    

    $row.find('.qty').val(mcond.toFixed(2));
    var qty = mcond;
        
   var rate = parseFloat($row.find('.rate').val());
   console.log(qty + " * " + rate);
    cost = qty * rate;
    console.log(cost);
    if (isNaN(cost)) {
        $row.find('.cal').val("0");
    } else {
        $row.find('.cal').val(cost);
    }
    calculateSum();
}
});

});

</script>

  
</head>

<body>
  <table border="1px" width="90%" id="data">                  
                  <tr>
                     <td width="580px" align="center"><label for=""><font color="#0099FF" size="3px">Description</font><span></span></label></td>
                     <td width="130px" align="center"><label for=""><font color="#0099FF" size="3px">This Bill Qty</font><span></span></label></td>
                     <td width="130px" align="center"><label for=""><font color="#0099FF" size="3px">Rate</font><span></span></label></td>
                     <td width="130px" align="center"><label for=""><font color="#0099FF" size="3px">Amount</font><span></span></label></td>
                  </tr>
</table>                      
<input type="button" id="addnew" class="classname" name="addnew" value="+" />
  


</body>

</html>

