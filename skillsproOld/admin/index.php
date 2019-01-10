<?php include 'header.php';?>

		<!-- //header-ends -->
		<div id="page-wrapper">
				<div class="graphs">
					<div class="col_3">
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<i class="fa fa-mail-forward"></i>
								<div class="stats">
									<?php $total_course=nr(q("SELECT * FROM dt_courses WHERE created_id='".$_SESSION['partner_id']."'"));?>
								  <h5><?php echo $total_course;?></h5>
								  <div class="grow">
									<p>Courses</p>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<i class="fa fa-users"></i>
								<div class="stats">
									<?php $total_students=nr(q("SELECT * FROM dt_students WHERE partner_id='".$_SESSION['partner_id']."'"));?>
								  <h5><?php echo $total_students;?></h5>
								  <div class="grow grow1">
									<p>Students</p>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<i class="fa fa-eye"></i>
								<div class="stats">
									<?php $total_teachers=nr(q("SELECT * FROM dt_teachers WHERE partner_id='".$_SESSION['partner_id']."'"));?>
								  <h5><?php echo $total_teachers;?></h5>
								  <div class="grow grow3">
									<p>Teachers</p>
								  </div>
								</div>
							</div>
						 </div>
						 <div class="col-md-3 widget">
							<div class="r3_counter_box">
								<i class="fa fa-usd"></i>
								<div class="stats">
								  <h5>&#8377;200500</h5>
								  <div class="grow grow2">
									<p>Revenue</p>
								  </div>
								</div>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>

			<!-- switches -->
		
			</div>
			<div class="clearfix"> </div>
			<div class="col-md-6"><canvas id="myChart" width="400" height="200"></canvas></div>
			
				<script>
				var ctx = document.getElementById("myChart").getContext('2d');
				var myChart = new Chart(ctx, {
				    type: 'bar',
				    data: {
				        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
				        datasets: [{
				            label: '# of Votes',
				            data: [12, 19, 3, 5, 2, 3],
				            backgroundColor: [
				                'rgba(255, 99, 132, 0.2)',
				                'rgba(54, 162, 235, 0.2)',
				                'rgba(255, 206, 86, 0.2)',
				                'rgba(75, 192, 192, 0.2)',
				                'rgba(153, 102, 255, 0.2)',
				                'rgba(255, 159, 64, 0.2)'
				            ],
				            borderColor: [
				                'rgba(255,99,132,1)',
				                'rgba(54, 162, 235, 1)',
				                'rgba(255, 206, 86, 1)',
				                'rgba(75, 192, 192, 1)',
				                'rgba(153, 102, 255, 1)',
				                'rgba(255, 159, 64, 1)'
				            ],
				            borderWidth: 1
				        }]
				    },
				    options: {
				        scales: {
				            yAxes: [{
				                ticks: {
				                    beginAtZero:true
				                }
				            }]
				        }
				    }
				});
				</script>
		</div>
				</div>
			<!--body wrapper start-->
			</div>
			 <!--body wrapper end-->
		</div>
 <?php  include 'footer.php'; ?>