
<!--content--!-->
<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default; min-height:600px;">
	<div class="container-fluid">
		<div class="row" style="margin-top:auto; margin-bottom:auto;">
        <div class="col-md-12"><!--HEADER--!-->
        
        <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-calendar"></span> What's New</div>
          
        </div><!--HEADER--!-->
        
        <div class="col-md-12" id="ContentContainer"><!--BODY--!-->
        <div class="container row" id="alignment" style="margin-top:50px; margin-bottom:30px; min-height:auto; overflow-y:auto;">

        <form class="form-inline" style="margin-top:20px; display:inline-block; display:none" action="event" method="post">
        <label for="cate">Department:</label>
 				<select style="width:250px;" class="form-control" id="cate" name="cate">
                <option>All</option>
                <option>SIHTM</option>
                <option>SASE</option>
                <option>SHSP</option>
                <option>SBCS</option>
                </select>
                <button class="btn btn-info" type="submit">Sort</button>
        
        
        </form>
        <form class="form-inline" style="margin-top:20px; display:inline-block; display:none" action="event" method="post">
        <button class="btn btn-info" type="submit" name="events_refresh" value="">Refresh</button>
      	</form>
        

        
        <div class="col-md-12" style="padding:10px">
          <div class="boxhover" style="padding:20px">
            <h3><span class="glyphicon glyphicon-bullhorn" style="padding:5px; color:#cc0000"></span> ANNOUNCEMENTS  </h3>
            <hr>
            <div style="min-width:300px; max-height:340px; overflow:auto">
            <?php if($events->num_rows() != 0): ?>
            <table class="table table-striped" style="color:#666">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Title</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($events->result_array() as $row): ?>
                <tr>
                  <td width="30%"><?php echo date("d-m-Y", strtotime($row['Date'])); ?></td>
                  <td width="70%"><a href="#"><?php echo $row['Event_Name']; ?></a></td>
                  <td>
                  <a href="<?php echo base_url(); ?>index.php/Student/view_announcement?announcement_id=<?php echo $row['Event_ID']; ?>" target="_blank">
                  <button class="btn btn-info">View</button>
                  </a>
                  </td>
                </tr>
              <?php endForeach; ?>
              </tbody>
            </table>
            <?php else: ?>
            <h3>No Announcements</h3>
            <?php endIf; ?>
            </div>
            <?php if($events->num_rows() != 0): ?>
            <?php echo $this->pagination->create_links(); ?>
            <?php endIf; ?>
          </div>
        </div>
        <div class="col-md-6"  style="padding:10px">
          <div class="boxhover">
            <a class="twitter-timeline" data-height="340" data-theme="light" data-link-color="#19CF86" href="https://twitter.com/SDCA_SSC?ref_src=twsrc%5Etfw">Tweets by SDCA_SSC</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          </div>
        </div>
        <div class="col-md-6"  style="padding:10px">
          <div class="boxhover" style="min-width:250px; max-height:400px; overflow:auto">
            <div class="fb-page"  data-href="https://www.facebook.com/stdominiccollege/" data-tabs="timeline" data-width="400" data-height="340" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
            <blockquote cite="https://www.facebook.com/stdominiccollege/" class="fb-xfbml-parse-ignore">
            <a href="https://www.facebook.com/stdominiccollege/">
            St. Dominic College of Asia
            </a>
            </blockquote>
            </div>
          </div>
        </div>



            
        </div>
         
        </div><!--BODY--!-->