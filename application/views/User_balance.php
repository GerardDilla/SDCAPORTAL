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
        <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-piggy-bank"></span> Balance</div>
      </div>
      <!--HEADER--!-->

      <div class="col-md-12" id="ContentContainer">
        <!--BODY--!-->
        <div class="container row" id="alignment" style="margin-top:50px; margin-bottom:20px; min-height:auto; overflow-y:auto;">

          <h4><strong>BALANCE AS OF: <u><?php echo $Bal_Semester . ', ' . $Bal_Schoolyear; ?></u></strong>

            <span class="searchloader">
              Loading <img src="<?php echo base_url(); ?>Assets/img/ajax-loader.gif">
            </span>

          </h4>

          <!--Legends input -->
          <input type="hidden" name="SYlegend" id="SYlegend" value="<?php echo $Bal_Schoolyear; ?>">
          <input type="hidden" name="Semlegend" id="Semlegend" value="<?php echo $Bal_Semester; ?>">
          <!--Legends input -->

          <table class="table table-striped" style="color:#666">
            <thead>
              <tr>
                <th></th>
                <th>Amount</th>
                <th>Remaining</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="background-color:#55c2ac; color:#FFF;">Upon Registration</td>
                <td style="font-weight: 700; color: #800; text-align:right;" id="uponregistration"></td>
                <td style="background-color:#ccc; font-weight: 700; color: #800; text-align:right;" id="uponregistrationbalance"></td>
              </tr>
              <tr>
                <td style="background-color:#55c2ac; color:#FFF;">Prelim</td>
                <td style="font-weight: 700; color: #800; text-align:right;" id="prelim"></td>
                <td style="background-color:#ccc; font-weight: 700; color: #800; text-align:right;" id="prelimbalance"></td>
              </tr>
              <tr>
                <td style="background-color:#55c2ac; color:#FFF;">Midterm</td>
                <td style="font-weight: 700; color: #800; text-align:right;" id="midterm"></td>
                <td style="background-color:#ccc; font-weight: 700; color: #800; text-align:right;" id="midtermbalance"></td>
              </tr>
              <tr>
                <td style="background-color:#55c2ac; color:#FFF;">Finals</td>
                <td style="font-weight: 700; color: #800; text-align:right;" id="finals"></td>
                <td style="background-color:#ccc; font-weight: 700; color: #800; text-align:right;" id="finalsbalance"></td>
              </tr>
            </tbody>
          </table>

          <table class="table table-striped" style="color:#666">
            <thead>
              <tr>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="background-color:#16A085; color:#FFF;">Total Assesment</td>
                <td style="font-weight: 700; color: #800; text-align:right;" id="sem_balance"></td>
              </tr>
              <tr>
                <td style="background-color:#16A085; color:#FFF;">Payments</td>
                <td style="font-weight: 700; color: #800; text-align:right;" id="sem_paid"></td>
              </tr>
              <tr>
                <td style="background-color:#666; color:#FFF; text-align: center;">Semestral Balance :</td>
                <td style="background-color:#666; color:#FFF; text-align:right; font-weight: 700;" id="sem_total_balance">

                </td>
              </tr>
              <tr>
                <td style="background-color:#666; color:#FFF; text-align: center;">Previous Balance :</td>
                <td style="background-color:#666; color:#FFF; text-align:right; font-weight: 700;" id="previous_balance">

                </td>
              </tr>
              <tr>
                <td style="background-color:#666; color:#FFF; text-align: center;">OUTSTANDING BALANCE :</td>
                <td style="background-color:#666; color:#FFF; text-align:right; font-weight: 700;" id="outstanding_balance">

                </td>
              </tr>
            </tbody>
          </table>



        </div>
        <div style="text-align:center">

          <div class="row">
            <!-- <div class="col-md-6">
              <form action="http://10.0.0.52/WEBDOSE/index.php/StatementOfAccount/soa_api" target="_blank">
                <input type="hidden" name="student_no" value="20180029">
                <input type="hidden" name="school_year" value="<?php echo $Bal_Schoolyear; ?>">
                <input type="hidden" name="semester" value="<?php echo $Bal_Semester; ?>">
                <button type="submit" class="btn btn-info btn-lg">Print SOA</button>
              </form>
            </div> -->
            <div class="col-md-12" style="text-align:center">
              <a href="https://stdominiccollege.edu.ph/SDCAPayment/" id="paymentlink" class="btn btn-info btn-lg" target="_blank">Pay Online</a>
            </div>
          </div>



        </div>




      </div>
    </div>
    <!--BODY--!-->

    <!-- Balance API Handler -->
    <script>
      $(document).ready(function() {
        $('#submit').hide();
        Init_BalanceAPI('https://www.stdominiccollege.edu.ph/SDCALMSv2/index.php/API/BalanceAPI', '<?php echo md5($this->session->userdata('Reference_Number')); ?>');
        // Init_BalanceAPI('http://10.0.0.52/SDCALMSv2/index.php/API/BalanceAPI', '<?php echo md5($this->session->userdata('Reference_Number')); ?>');

        $('.soa_print').click(function() {
          soa_print();
        });
      });
    </script>
    <!-- Balance API Handler -->

    <script>
      function Init_BalanceAPI(url = '', refnum = '') {
        //console.log(url);
        if (url == '') {
          config = {
            'message': 'Error: You must provide the API URL',
            'type': 'warning'
          }
          message_handler(config);
          return;
        }
        if (refnum == '') {

          //message_handler('No Token found');
          config = {
            'message': 'Error: No Token found',
            'type': 'warning'
          }
          message_handler(config);
          return;
        }
        if ($('#SYlegend').val() == '') {
          config = {
            'message': 'Error: No School Year passed',
            'type': 'warning'
          }
          message_handler(config);
          return;
        }
        if ($('#Semlegend').val() == '') {
          config = {
            'message': 'Error: No Semester passed',
            'type': 'warning'
          }
          message_handler(config);
          return;
        }


        ajax = $.ajax({
          url: url,
          type: 'GET',
          data: {
            Reference_Number: refnum,
            // School_Year: $('#SYlegend').val(),
            // Semester: $('#Semlegend').val()
          },
          success: function(response) {

            result = JSON.parse(response);
            console.log(result);
            if (result['Error'] == 0) {
              balance_display(result['Output']);

            } else {
              config = {
                'message': result['ErrorMessage'],
                'type': 'warning'
              }
              message_handler(config);
              return;
            }

          },
          fail: function() {

            alert('Error: request failed');
            return;

          }
        });

      }

      function soa_print() {

        window.open('http://10.0.0.52/WEBDOSE/index.php/StatementOfAccount/soa_api', '_blank');
        ajax = $.ajax({
          url: 'http://10.0.0.52/WEBDOSE/index.php/StatementOfAccount/soa_api',
          data: {
            student_no: '20180029',
            school_year: $('#SYlegend').val(),
            semester: $('#Semlegend').val()
          },
          success: function(response) {

            window.open('http://YOUR_URL', '_blank');

          },
          fail: function() {

            alert('Error: request failed');
            return;

          }
        });

      }

      function balance_display(resultdata) {

        result = resultdata['SemestralData'];
        result = result[result.length - 1];
        console.log(result);
        // $('#uponregistration').html(resultdata['InitialPayment']);
        // $('#prelim').html(resultdata['Prelim']);
        // $('#midterm').html(resultdata['Midterm']);
        // $('#finals').html(resultdata['Finals']);

        // $('#uponregistrationbalance').html(resultdata['UponRegistrationBalance']);
        // $('#prelimbalance').html(resultdata['PrelimBalance']);
        // $('#midtermbalance').html(resultdata['MidtermBalance']);
        // $('#finalsbalance').html(resultdata['FinalsBalance']);

        // $('#sem_balance').html(resultdata['Semestral_Fee']);
        // $('#sem_paid').html(resultdata['Semestral_Paid']);
        // $('#sem_total_balance').html(resultdata['Semestral_Balance']);
        // $('#previous_balance').html(resultdata['Previous_Balance']);
        // $('#outstanding_balance').html(resultdata['Outstanding_Balance']);
        // $('#pay_amount').val(resultdata['Outstanding_Balance']);
        // //$("input[name='reference_number']").val(new Date().getTime());

        $('#uponregistration').html(result['InitialPayment']);
        $('#prelim').html(result['Prelim']);
        $('#midterm').html(result['Midterm']);
        $('#finals').html(result['Finals']);

        $('#uponregistrationbalance').html(result['UponRegistrationBalance']);
        $('#prelimbalance').html(result['PrelimBalance']);
        $('#midtermbalance').html(result['MidtermBalance']);
        $('#finalsbalance').html(result['FinalsBalance']);

        $('#sem_balance').html(result['total']);
        $('#sem_paid').html(result['paid']);
        $('#sem_total_balance').html(result['balance']);
        $('#previous_balance').html(resultdata['Previous_Balance']);
        $('#outstanding_balance').html(resultdata['Outstanding_Balance']);
        // $('#pay_amount').val(result['Outstanding_Balance']);
        //$("input[name='reference_number']").val(new Date().getTime());

        if (resultdata['Outstanding_Balance'] <= 0) {
          $('#paymentlink').hide();
        }

      }
    </script>

    <!-- AJAX loading -->
    <script>
      $(document).ajaxStart(function() {
        $(".searchloader").show();
      });
      $(document).ajaxStop(function() {
        $(".searchloader").hide();
        $('#submit').show();
      });
    </script>
    <!-- AJAX loading -->