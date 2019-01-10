<?php include 'header.php'; ?>
<div id="page-wrapper">
    <div class="grid_3 grid_5" style="margin-top:20px;">
        <h3 class="blank1">List Projects</h3>
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
                    <th>Topic Name</th>
                    <th>Course Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $sql_project="SELECT * FROM dt_projects WHERE created_id='".$_SESSION['partner_id']."'";
                      $rs_project=q($sql_project);
                      $i=1;
                      while($f_project=f($rs_project)){
                        $topic_id = f(q("SELECT topic_name FROM dt_topics WHERE topic_id='".$f_project['topic_id']."'"));
                        $course_id = f(q("SELECT course_name FROM dt_courses WHERE topic_id='".$f_project['topic_id']."' AND course_id='".$f_project['course_id']."'"));
                ?>      	
                    <tr id="row_id_<?php echo $i;?>">
                        <th scope="row" ><?php echo $i;?></th>
                        <td><?php if($f_project['type'] == 'P'){echo "Project";}else if($f_project['type'] == 'A'){ echo "Assignment";}?></td>
                        <td><?php echo $f_project['project_name'];?></td>
                        <td><?php echo $topic_id['topic_name'];?></td>
                        <td><?php echo $course_id['course_name'];?></td>
                        <td><a href="add_project.php?mode=edit&project_id=<?php echo $f_project['project_id'];?>">Edit</a>
                        &nbsp;|&nbsp;
                        <a href="javascript:void(0)" data-row_id="<?php echo $i;?>" data-project_id="<?php echo $f_project['project_id'];?>" onclick="delete_partner_project(this,'<?php echo $f_project['project_id'];?>')">Delete</a>
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
      