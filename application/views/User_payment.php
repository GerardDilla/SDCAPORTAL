
<!--content--!-->
<div id="page-content-wrapper" style="width:100%; cursor:default; min-height:600px;">
	<div class="container-fluid">
		<div class="row" style="margin-top:auto; margin-bottom:auto;">
            <div class="col-md-12"><!--HEADER--!-->
            
                <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-credit-card"></span> Payment</div>
            
            </div><!--HEADER--!-->
        
            <div class="col-md-12" id="ContentContainer"><!--BODY--!-->
                <div class="container row" id="alignment" style="margin-top:50px; margin-bottom:30px; min-height:auto; overflow-y:auto;">

                    <?php if($this->session->flashdata('message')): ?>
                        <h3 style="color:yellowgreen"><?php echo $this->session->flashdata('message'); ?></h3>
                    <?php endIf; ?>

                    <hr>

                    <h3>[Place to display fees, idk the format yet hehe]</h3>

                    <hr>

                    <button type="button" class="btn btn-success payment-proceed">PROCEED TO PAYMENT</button>


                </div>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript'>
    $(document).ready(function(){
        $('.payment-proceed').click(function(){
            WPP.embeddedPayUrl(
                <?php
                echo '"' . $_SESSION['payment-redirect-url'] . '"';
                ?>
            );
        });
    });

</script>


