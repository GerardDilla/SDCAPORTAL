
<style>
.acad_year{
  font-weight: 700;
  font-size: 20px;

}
.acad_label{
  color: green;
}

.sem{
   font-weight: 700;
  font-size: 20px;
  text-align: right;
}

#no_evaluator{
    font-weight: 700;
  font-size: 20px;
}

.result_label{
   color: red;
}

.filterable .filters input[disabled] {
    background-color: transparent;
    border: none;
    cursor: auto;
    box-shadow: none;
    padding: 0;
    height: auto;
}
.filterable .filters input[disabled]::-webkit-input-placeholder {
    color: #800;
    font-size: 16px;
    text-align: center;
}
.filterable .filters input[disabled]::-moz-placeholder {
    color: #800;
    font-size: 16px;
    text-align: center;
}
.filterable .filters input[disabled]:-ms-input-placeholder {
    color: #800;
    font-size: 16px;
    text-align: center;
}
.number{
  color: #800;
  font-weight: 700;
}




</style>
<!--content--!-->









<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default;">
<div class="container-fluid">
<div class="row" style="margin-top:auto; margin-bottom:auto;">
<div class="col-md-12"><!--HEADER--!-->
  
  <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-user"></span> Student Monitoring</div>
</div>
<!--HEADER--!-->

<div class="col-md-12" id="ContentContainer">
<!--BODY--!-->
<div class="container row" id="alignment" style="margin-top:20px; margin-bottom:30px; min-width:100%; overflow:auto;">

       <table id="tablermusic" class="table table-striped table-bordered" style="width:100%">
         <thead class="red lighten-1 filterable">
          <tr class="filters">

           <th class="number">#</th>
          
           <th>
          <form class="form-inline" method="post">
             <input type="text" name="studentnumber" class="form-control" placeholder="Student Number:"disabled>
          </form>
          </th>
    
           <th>
           <form class="form-inline" method="post">
           <input type="text" name="name" class="form-control" placeholder="Lastname:" disabled>
            </form>
           </th>
           
           <th>
           <form class="form-inline" method="post">
           <input type="text"  name="course"class="form-control" placeholder="Course:" disabled>
           </form>
           </th>
         
          </tr>
          </thead>
          <tbody>

       <?php echo $Student_Monitoring ?>

          </tbody>
     </table>

 
          </div>
        </div>
      </div>
      <!-- Row End--> 
   

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
     <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
$(document).ready(function() {
    $('#tablermusic').DataTable();
} );
    </script>