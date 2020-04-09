<?php
require '../../vendor/autoload.php' ;
if (!isset($_SESSION)) {
    session_start();
}
?>
<!--content--!-->
<div id="page-content-wrapper" style="width:100%; cursor:default; min-height:600px;">
	<div class="container-fluid">
		<div class="row" style="margin-top:auto; margin-bottom:auto;">
            <div class="col-md-12"><!--HEADER--!-->
            
                <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-education"></span> Grades</div>
            
            </div><!--HEADER--!-->
        
            <div class="col-md-12" id="ContentContainer"><!--BODY--!-->
                <div class="container row" id="alignment" style="margin-top:50px; margin-bottom:30px; min-height:auto; overflow-y:auto;">
     
                    <script type='text/javascript'>
                        WPP.embeddedPayUrl(
                            <?php
                            echo '"' . $_SESSION['payment-redirect-url'] . '"';
                            ?>
                        );
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>


