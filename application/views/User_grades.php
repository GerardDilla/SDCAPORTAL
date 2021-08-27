<meta charset="UTF-8">
<?php

$sem = $this->input->post('getSEM');
$sy = $this->input->post('getSY');

if ($sy == "") {
    $test3 = 1;
    $css = "panel-collapse collapse in";
} else {
    $test3 = 2;
    $css = "panel-collapse collapse";
}
?>
<!--content--!-->
<div id="page-content-wrapper" style="width:100%; cursor:default; min-height:600px;">
    <div class="container-fluid">
        <div class="row" style="margin-top:auto; margin-bottom:auto;">
            <div class="col-md-12">
                <!--HEADER--!-->

                <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-education"></span> Grades</div>

            </div>
            <!--HEADER--!-->

            <div class="col-md-12" id="ContentContainer">
                <!--BODY--!-->
                <div class="container row" id="alignment" style="margin-top:50px; margin-bottom:30px; min-height:auto; overflow-y:auto;">

                    <!--Legends input -->
                    <input type="hidden" name="SYlegend" id="SYlegend" value="<?php echo $Bal_Schoolyear; ?>">
                    <input type="hidden" name="Semlegend" id="Semlegend" value="<?php echo $Bal_Semester; ?>">
                    <!--Legends input -->

                    <div class="message_box">

                    </div>

                    <div class="panel-group" id="accordion" style="min-width:250px;">
                        <!--accordion1--!-->
                        <div class="panel panel-default">
                            <!--panel1--!-->

                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                <div class="panel-heading" style="background-color:#666; color:#FFF;">
                                    <h4 class="panel-title">
                                        Choose Year and Semester:
                                    </h4>
                                </div>
                            </a>

                            <div id="collapse1" class="<?php echo $css; ?>">
                                <div class="panel-body">

                                    <span class="searchloader">
                                        Loading <img src="<?php echo base_url(); ?>Assets/img/ajax-loader.gif">
                                    </span>

                                    <form action="<?php echo site_url(); ?>index.php/Student/grades" method="post" style="margin-top:30px;">
                                        <div class="form-group">
                                            <label for="Schoolyear_Choice">Academic Year:</label>
                                            <select id="Schoolyear_Choice" class="form-control" name="getSY" id="Schoolyear_Choice" <!--onchange="showcont(this.value)-->">

                                                <?php
                                                echo $resultSY;
                                                ?>

                                            </select>
                                        </div>

                                        <div id="cont_appear" class="form-group" style="display:none;">
                                            <label for="Schoolyear_Choice">Semester:</label>
                                            <div id="acad_sem">
                                                <select class="form-control" name="getSEM" id="sel2">



                                                </select>
                                            </div>
                                        </div>



                                        <button id="btn_appear" class="btn center-block" style="margin:auto; margin-bottom:30px; margin-top:20px; width:100px; display:none;" name="submit" id="submitD" type="button">Select</button>
                                    </form>


                                </div>
                            </div>



                        </div>
                        <!--panel1--!-->
                    </div>
                    <!--accordion--!-->


                    <table class="table table-striped" style="color:#666">

                        <thead>
                            <tr>
                                <th>Subject Code</th>
                                <th>Description</th>
                                <th>Prelim</th>
                                <th>Midterm</th>
                                <th>Finals</th>
                                <th>Final Grade</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>

                        <tbody id="gradingsheet">



                        </tbody>

                    </table>





                </div>

                <script>
                    var hidden = document.getElementById('hidden');
                    var active = "<?php echo $test3 ?>";
                    if (active == 1) {
                        hidden.style.display = "none";

                    } else {
                        hidden.style.display = "block";
                    }
                </script>

            </div>

        </div>
        <!--BODY--!-->






        <script>
            $(document).ready(function() {

                $(".searchloader").hide();
                //Balance checker
                //Init_BalanceAPI('http://stdominiccollege.edu.ph/SDCALMSv2/index.php/API/BalanceAPI','<?php echo $this->session->userdata('ENCRYPT_Reference_Number'); ?>');
                var userkey = "<?php echo $this->session->userdata('ENCRYPT_Reference_Number'); ?>";
                var gradingAPI = 'https://www.stdominiccollege.edu.ph/SDCALMSv2/index.php/API/GradingAPI';
                var balanceAPI = 'https://www.stdominiccollege.edu.ph/SDCALMSv2/index.php/API/BalanceAPI';

                $("#btn_appear").click(function() {
                    //Init_GradingAPI('http://stdominiccollege.edu.ph/SDCALMSv2/index.php/API/GradingAPI','<?php echo $this->session->userdata('ENCRYPT_Reference_Number'); ?>');
                    Init_GradingAPI(gradingAPI, balanceAPI, '<?php echo $this->session->userdata('ENCRYPT_Reference_Number'); ?>');
                });

                $('#Schoolyear_Choice').change(function() {

                    showcont($(this).val());

                });

            });

            function showcont(Sy) {

                if (Sy == "") {
                    $('#acad_sem').html();
                    return;
                }

                ajax = $.ajax({
                    url: "<?php echo base_url(); ?>index.php/Student/get_sem",
                    type: 'GET',
                    data: {
                        q: Sy
                    },
                    success: function(response) {

                        $('#acad_sem').html(response);

                    },
                    fail: function() {

                        alert('Error: request failed');
                        return;

                    }
                });

                cont_appear.style.display = "block";
                btn_appear.style.display = "block";

            }

            /*
            function showcont(str) {
              var xhttp;
             
              if (str == "") {
                    document.getElementById("acad_sem").innerHTML = "";
                    return;
              }
              
              xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("acad_sem").innerHTML = this.responseText;
                    
                    }
              };
              
              xhttp.open("GET", "<?php echo base_url(); ?>index.php/Student/get_sem?q="+str, true);
              xhttp.send();
              cont_appear.style.display="block";	
              btn_appear.style.display="block";	
              
            }
            */

            function Init_GradingAPI(gradingapi = '', balanceapi, refnum = '') {
                //console.log(url);
                if (gradingapi == '') {
                    config = {
                        'message': 'You must provide the API URL',
                        'type': 'warning'
                    }
                    message_handler(config);
                    return;
                }
                if (refnum == '') {

                    //message_handler('No Token found');
                    config = {
                        'message': 'No Token found',
                        'type': 'warning'
                    }
                    message_handler(config);
                    return;
                }
                if ($('#Schoolyear_Choice').val() == '') {
                    //message_handler('You must provide School Year');
                    config = {
                        'message': 'You must provide School Year',
                        'type': 'warning'
                    }
                    message_handler(config);
                    return;
                }
                if ($('#sel2').val() == '') {
                    //message_handler('You must provide Semester');
                    config = {
                        'message': 'You must provide Semester',
                        'type': 'warning'
                    }
                    message_handler(config);
                    return;
                }

                input = {
                    Reference_Number: refnum,
                    School_Year: $('#Schoolyear_Choice').val(),
                    Semester: $('#sel2').val()
                }


                ajax = $.ajax({
                    url: gradingapi,
                    type: 'GET',
                    data: input,
                    success: function(response) {

                        result = JSON.parse(response);
                        if (result['ResultCount'] != 0) {

                            BalanceChecker = Init_BalanceAPI(balanceapi, input);
                            BalanceChecker.done(function(balresult) {


                                balresult = JSON.parse(balresult);
                                SemestralData = balresult['Output']['SemestralData'];

                                legendsem = $('#Semlegend').val();
                                legendsy = $('#SYlegend').val();
                                chosensem = balresult['Output']['Chosen_Semester'];
                                chosensy = balresult['Output']['Chosen_Schoolyear'];

                                console.log(SemestralData);
                                if (SemestralData.length != 0) {

                                    console.log(legendsem + '-' + legendsy);
                                    console.log(chosensy + ':' + chosensem);
                                    if (chosensy == (legendsy + 11) && chosensem == legendsem) {

                                        $('.message_box').html('');
                                        grading_display(result['data']);
                                        return;

                                    }
                                    if (SemestralData[0]['balance'] > 1) {

                                        balance_stopper();
                                        $('#gradingsheet').html('');
                                        return;

                                    }

                                    $('.message_box').html('');
                                    grading_display(result['data']);



                                } else {

                                    config = {
                                        'message': 'Error: Could not find Balance data',
                                        'type': 'warning'
                                    }
                                    message_handler(config);
                                    $('#gradingsheet').html('');


                                }

                            });




                        } else {

                            $("#gradingsheet").html('');
                            message_handler({
                                'message': result['ErrorMessage'],
                                'type': 'warning'
                            });
                            //message_handler(result['ErrorMessage'],'warning');
                        }

                    },
                    fail: function() {

                        alert('Error: request failed');
                        return;

                    }
                });




            }

            function grading_display(resultdata) {


                //Displays Grades in container
                showtable = $('#gradingsheet');
                //clears the table before append
                showtable.html('');

                $('.message_box').html('');
                console.log(resultdata);
                $.each(resultdata, function(index, result) {

                    row = $("<tr/>");

                    row.append($("<td/>").text(result['Course_Code']));
                    row.append($("<td/>").text(result['Course_Title']));
                    row.append($("<td/>").text(result['Prelim']));
                    row.append($("<td/>").text(result['Midterm']));
                    row.append($("<td/>").text(result['Finals']));
                    row.append($("<td/>").text(result['FINALGRADE']));
                    row.append($("<td/>").text(result['REMARKS']));

                    showtable.append(row);

                });

            }

            function Init_BalanceAPI(balanceapi = '', input = {}) {
                //console.log(url);
                if (balanceapi == '') {
                    config = {
                        'message': 'Error: You must provide the API URL',
                        'type': 'warning'
                    }
                    message_handler(config);
                    return;
                }
                return ajax = $.ajax({
                    url: balanceapi,
                    type: 'GET',
                    data: input,
                });

            }

            function balance_stopper() {

                $balmessage = '\
        <h2>\
        It seems you still have a balance for this chosen semester, please settle the balance to view this semester\'s grade<br><br>\
        </h2>\
        <h3>\
        View your balance <a href="<?php echo base_url(); ?>index.php/Student/Balance"><u>Here</u></a>\
        </h3>\
        <hr>\
        Get in touch with us through our <a target="_blank" href="https://www.stdominiccollege.edu.ph/index.php/helpdesk"><u>Helpdesk</u></a> if you have concerns, Thank you.\
    ';
                $("#gradingsheet").html('');
                config = {
                    'message': $balmessage,
                    'type': 'info'
                }
                message_handler(config);


            }


            function message_handler(settings) {


                console.log(length.settings);
                if (length.settings == 0 || settings == undefined) {
                    settings = {
                        'type': 'warning',
                        'message': 'No Data passed to message_handler()',
                        'object': '.message_box',
                    };
                } else {
                    if (settings.type == '') {
                        settings['type'] = 'info';

                    }
                    if (settings.message == '') {
                        settings['message'] = '';
                        console.log('No Message provided for message_handler');

                    }
                    if (settings.object == '') {
                        settings['object'] = '.message_box';

                    }
                }



                var box = '';
                box += '<div class="alert alert-' + settings.type + '">';
                box += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                box += settings.message;
                box += '</div>'
                $('.message_box').html(box);

            }
        </script>

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