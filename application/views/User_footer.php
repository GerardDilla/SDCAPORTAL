<div class="col-md-12"><!--FOOTER--!-->
       
        <div class="row" style="background-color: rgba(0,0,0,0.5); color:#FFF; font-size:16; margin-top:auto; margin-bottom:auto; height:50px; line-height:50px; height:auto;">
  
        <span style="margin-left:20px; margin-top:20px; margin-bottom:20px;">
        </span>
        
        <p style="padding:5px 5px 5px 20px; font-size:90%;">This is the pre-alpha version of the Student Portal. Some features may be unstable and some data might not be complete.</p>
        
        </div>
       
</div><!--FOOTER--!-->
       
       
</div>
</div>
</div><!--Content--!-->
</div>


<!-- Modal -->
<!--
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>
        You still have a previous balance of: <u></u> <br>
        Please settle your account to access your portal.
        </h3>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-default" href="<?php echo base_url(); ?>index.php/Student/logout">Logout</a>
      </div>
    </div>
  </div>
</div>
-->
<!-- Privacy Policy -->
<div class="modal fade" id="privacy_policy_modal"  tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 id="largeModalLabel">Privacy Policy</h2>
			</div>
			<div class="modal-body">

        <input type="hidden" id="privacy_id" value="<?php echo $this->session->userdata('Reference_Number'); ?>">
        <input type="hidden" id="privacy_system" value="HEI Portal">
        <input type="hidden" id="privacy_base_url" value="<?php echo base_url(); ?>">

        <div id="PolicyContainer" style="overflow-y: scroll; max-height:300px; padding: 15px 0px 15px 0px; color:#000">
          <p>
            I <u><strong><?php echo $this->session->userdata('First_Name').' '.$this->session->userdata('Middle_Name').' '.$this->session->userdata('Last_Name'); ?></strong></u> of legal age, hereby voluntarily and knowingly authorize St. Dominic College of Asia to collect, process or release my personal and sensitive information that may be used for internal and external school official and legal transactions.
            I agree on the following conditions:
          </p>
          <ol>
            <li>Personal Information will be released unless written notice of revocation is received by the Data Privacy Office of St. Dominic College of Asia.</li>
            <li>Personal information may be released for school official and legal purposes only.</li>
            <li>Sensitive information will be kept confidential unless the school deemed it necessary to release on valid and legal purposes only. </li>
            <li>Updating and modifying of incorrect, inaccurate or incomplete personal information will be done upon submission of letter of request to St. Dominic College of Asia.</li>
            <li>St. Dominic College of Asia and its officials and employees are not held liable for the collection and release of any information that I voluntarily provided.</li>
          </ol>
          <p>
           I have read this form, understood its contents and consent to the collecting, processing and releasing of my personal data. I understand that my consent does not preclude the existence of other criteria for lawful processing of personal data, and does not waive any of my rights under the Data Privacy Act of 2012 and other applicable laws.
          </p>
        </div>
			</div>
      <div class="modal-footer row">
        <div id="policy_options">
          <div class="col-md-12" style="text-align:left; padding: 0px 25px 0px 25px">
            <input type="checkbox" id="student_agree" value="1"> I Agree to The Privacy Policy Stated Above.
            <br>
            <input type="checkbox" id="parent_agree" value="1"> I Allow my parents to view my data.
            <hr>
          </div>
          <div class="col-md-12">
            <a href="<?php echo base_url(); ?>index.php/Student/Logout" class="btn btn-link waves-effect pull-left">BACK</a>
            <button type="button" id="policy_agree" value="" class="btn btn-success pull-right" onclick="policy_agree()"></button>
          </div>
        </div>
      </div>
		</div>
	</div>
</div>
<!-- /Privacy Policy -->
<!-- Privacy Policy Script -->
<script>
//Checks if user already agreed
$( document ).ready(function() {

  //policy_agree_check();

});
</script>
<!-- /Privacy Policy Script -->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<script type="text/javascript">
			
            function printpage(){
				window.print();
				}

</script>
<script>
$("#menu-toggle").click( function (e){
            e.preventDefault();
            $("#wrapper").toggleClass("menuDisplayed");
        });
</script>


</body>



</html>
