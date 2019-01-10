<?php include 'header.php'; ?>
<div id="page-wrapper">
    <div class="grid_3 grid_5" style="margin-top:20px;">
        <h3 class="blank1">List Submitted Projects</h3>
        <div class="tab-content">
            <div class="tab-pane active" id="horizontal-form">
                    <div class="alert alert-success" style="display:none" id="success" role="alert">
                        <strong>Well done!</strong> You successfully read this important alert message.
                    </div>
                    <div class="alert alert-danger" id="error" style="display:none" role="alert">
                        <strong>Well done!</strong> You successfully read this important alert message.
                    </div>
                <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Type</th>
                    <th>Project Name</th>
                    <th>Student Name</th>
                    
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $sql_project="SELECT a.*,b.project_name,b.type,c.student_first_name FROM  dt_student_submit_project a INNER JOIN dt_projects b ON a.project_id=b.project_id LEFT JOIN dt_students c ON a.student_id=c.student_id WHERE b.created_id='".$_SESSION['partner_id']."'";
                      $rs_project=q($sql_project);
                      $i=1;
                      while($f_project=f($rs_project)){
                       
                ?>      	
                    <tr id="row_id_<?php echo $i;?>">
                        <th scope="row" ><?php echo $i;?></th>
                        <td><?php if($f_project['type'] == 'P'){echo "Project";}else if($f_project['type'] == 'A'){ echo "Assignment";}?></td>
                        <td><?php echo $f_project['project_name'];?></td>
                        <td><?php echo $f_project['student_first_name'];?></td>
                        
                        <td><a href="view_project.php?mode=edit&project_id=<?php echo $f_project['project_id'];?>&student_id=<?php echo $f_project['student_id'];?>">View</a>
                        &nbsp;
                        
                        </td>
                    </tr>
                <?php 
                    $i++;
                 } ?>  
                </tbody>
              </table>
            </div>
            </div>
        </div>		
        <div class="clearfix"> </div>
    </div>
</div>
<?php include 'footer.php';?>
<?php include '../phpjs/partners/project_js.php';?>		
      