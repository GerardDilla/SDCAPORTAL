<!--content--!-->

<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default;">
<div class="container-fluid">
  <div class="row" style="margin-top:auto; margin-bottom:auto;">
    <div class="col-md-12"><!--HEADER--!-->
      
      <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-user"></span> Administrators</div>
    </div>
    <!--HEADER--!-->
    
    <div class="col-md-12" id="ContentContainer"><!--BODY--!-->
      <div class="container row" id="alignment" style="margin-top:20px; margin-bottom:30px; min-width:100%; overflow:auto;">
        <h4 style="color:#666">
          <?php 
			$msg = $this->session->userdata('a_p_msg'); 
			echo $msg; 
			$this->session->unset_userdata('a_p_msg');
			?>
        </h4>
        <form method="get" action="<?php echo site_url(); ?>index.php/administrator/admin_list" class="inline" style="margin-top:50px;">
          <input type="text" class="form-control" id="search" name="admin_query" placeholder="Search..">
          <button class="btn btn-info inline" style="margin:auto; margin-bottom:10px; margin-top:20px;" name="submit" type="submit">Search</button>
        </form>
        <div id="list_table" style="max-height:400px; overflow-y:auto; margin-top:20px;">
          <?php 
                    //$result = $this->db->query($list);
                echo $Admin_list;
             
                ?>
        </div>
        <?php
			//echo "<div class='pagination' id='pagination'>".$this->pagination->create_links()."</div>";
		?>
      </div>
    </div>
    <!--BODY--!--> 
    
  </div>
</div>
