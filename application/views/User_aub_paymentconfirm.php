<?php
$msg = "";
$msg2 = "";
$hide = "";
?>
<!--content--!-->

<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default; min-height:600px;">
<div class="container-fluid">
<div class="row" style="margin-top:auto; margin-bottom:auto;">


<div class="col-md-12">

<!--HEADER--!-->
  <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-credit-card"></span> Payment Confirmation</div>
</div>
<!--HEADER--!-->

<div class="col-md-12" id="ContentContainer">
  <!--BODY--!-->
  <div class="container row" id="alignment" style="margin-top:50px; margin-bottom:20px; min-height:auto; overflow-y:auto;">   
    
    <table class="table table-striped" style="color:#666">
        <tbody>
          <tr>
            <td style="background-color:#55c2ac; color:#FFF;">Student Number</td>
            <td style="font-weight: 700; color: #800; text-align:left;"><?php echo $this->session->userdata('Student_Number'); ?></td>
          </tr>
          <tr>
            <td style="background-color:#55c2ac; color:#FFF;">School Year</td>
            <td style="font-weight: 700; color: #800; text-align:left;"><?php echo $Bal_Schoolyear; ?></td>
          </tr>
          <tr>
            <td style="background-color:#55c2ac; color:#FFF;">Semester</td>
            <td style="font-weight: 700; color: #800; text-align:left;"><?php echo $Bal_Semester; ?></td>
          </tr>
          <tr>
            <td style="background-color:#55c2ac; color:#FFF;">Amount (PHP)</td>
            <td style="font-weight: 700; color: #800; text-align:left;"><?php echo $amount; ?></td>
          </tr>
        </tbody>
    </table>
    <form id="payment_confirmation" action="https://testsecureacceptance.cybersource.com/pay" style="text-align:center" method="post"/>

      <?php echo $posts; ?>
      <button type="submit" id="submit" value="Confirm" class="btn btn-info btn-lg">Proceed to Payment</button>
    </form>
      
  </div>
</div>
<!--BODY--!-->


<!-- AJAX loading -->
<script>
  $(document).ajaxStart(function() {
  $(".searchloader").show();
  });
  $(document).ajaxStop(function() {
  $(".searchloader").hide();
  });
</script>
<!-- AJAX loading -->
