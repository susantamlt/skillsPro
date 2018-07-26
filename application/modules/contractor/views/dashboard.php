		
    	<section class="content">
            <div class="container-fluid">
                <div class="block-header">
                    <h2>DASHBOARD</h2>
                </div>

                <!-- Widgets -->
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-pink hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">playlist_add_check</i>
                            </div>
                            <div class="content">
                                <div class="text">NEW TASKS</div>
                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">125</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-cyan hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">help</i>
                            </div>
                            <div class="content">
                                <div class="text">NEW TICKETS</div>
                                <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">257</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-light-green hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">forum</i>
                            </div>
                            <div class="content">
                                <div class="text">NEW COMMENTS</div>
                                <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">243</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-orange hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">person_add</i>
                            </div>
                            <div class="content">
                                <div class="text">NEW VISITORS</div>
                                <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20">1225</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Widgets -->
                <!-- CPU Usage -->
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="header">
                                <div class="row clearfix">
                                    <div class="col-xs-12 col-sm-6">
                                        <h2>CPU USAGE (%)</h2>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 align-right">
                                        <div class="switch panel-switch-btn">
                                            <span class="m-r-10 font-12">REAL TIME</span>
                                            <label>OFF<input id="realtime" checked="" type="checkbox"><span class="lever switch-col-cyan"></span>ON</label>
                                        </div>
                                    </div>
                                </div>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div id="real_time_chart" class="dashboard-flot-chart" style="padding: 0px; position: relative;"><canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 949px; height: 275px;" width="949" height="275"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; max-width: 86px; top: 257px; left: 23px; text-align: center;" class="flot-tick-label tickLabel">0</div><div style="position: absolute; max-width: 86px; top: 257px; left: 111px; text-align: center;" class="flot-tick-label tickLabel">10</div><div style="position: absolute; max-width: 86px; top: 257px; left: 202px; text-align: center;" class="flot-tick-label tickLabel">20</div><div style="position: absolute; max-width: 86px; top: 257px; left: 293px; text-align: center;" class="flot-tick-label tickLabel">30</div><div style="position: absolute; max-width: 86px; top: 257px; left: 385px; text-align: center;" class="flot-tick-label tickLabel">40</div><div style="position: absolute; max-width: 86px; top: 257px; left: 476px; text-align: center;" class="flot-tick-label tickLabel">50</div><div style="position: absolute; max-width: 86px; top: 257px; left: 567px; text-align: center;" class="flot-tick-label tickLabel">60</div><div style="position: absolute; max-width: 86px; top: 257px; left: 659px; text-align: center;" class="flot-tick-label tickLabel">70</div><div style="position: absolute; max-width: 86px; top: 257px; left: 750px; text-align: center;" class="flot-tick-label tickLabel">80</div><div style="position: absolute; max-width: 86px; top: 257px; left: 841px; text-align: center;" class="flot-tick-label tickLabel">90</div><div style="position: absolute; max-width: 86px; top: 257px; left: 929px; text-align: center;" class="flot-tick-label tickLabel">100</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; top: 244px; left: 14px; text-align: right;" class="flot-tick-label tickLabel">0</div><div style="position: absolute; top: 195px; left: 8px; text-align: right;" class="flot-tick-label tickLabel">20</div><div style="position: absolute; top: 146px; left: 8px; text-align: right;" class="flot-tick-label tickLabel">40</div><div style="position: absolute; top: 98px; left: 8px; text-align: right;" class="flot-tick-label tickLabel">60</div><div style="position: absolute; top: 49px; left: 8px; text-align: right;" class="flot-tick-label tickLabel">80</div><div style="position: absolute; top: 1px; left: 1px; text-align: right;" class="flot-tick-label tickLabel">100</div></div></div><canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 949px; height: 275px;" width="949" height="275"></canvas></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# CPU Usage -->
                <div class="row clearfix">
                    <!-- Visitors -->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="body bg-pink">
                                <div class="sparkline" data-type="line" data-spot-radius="4" data-highlight-spot-color="rgb(233, 30, 99)" data-highlight-line-color="#fff" data-min-spot-color="rgb(255,255,255)" data-max-spot-color="rgb(255,255,255)" data-spot-color="rgb(255,255,255)" data-offset="90" data-width="100%" data-height="92px" data-line-width="2" data-line-color="rgba(255,255,255,0.7)" data-fill-color="rgba(0, 188, 212, 0)"><canvas style="display: inline-block; width: 270px; height: 92px; vertical-align: top;" width="270" height="92"></canvas></div>
                                <ul class="dashboard-stat-list">
                                    <li>
                                        TODAY
                                        <span class="pull-right"><b>1 200</b> <small>USERS</small></span>
                                    </li>
                                    <li>
                                        YESTERDAY
                                        <span class="pull-right"><b>3 872</b> <small>USERS</small></span>
                                    </li>
                                    <li>
                                        LAST WEEK
                                        <span class="pull-right"><b>26 582</b> <small>USERS</small></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- #END# Visitors -->
                    <!-- Latest Social Trends -->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="body bg-cyan">
                                <div class="m-b--35 font-bold">LATEST SOCIAL TRENDS</div>
                                <ul class="dashboard-stat-list">
                                    <li>
                                        #socialtrends
                                        <span class="pull-right">
                                            <i class="material-icons">trending_up</i>
                                        </span>
                                    </li>
                                    <li>
                                        #materialdesign
                                        <span class="pull-right">
                                            <i class="material-icons">trending_up</i>
                                        </span>
                                    </li>
                                    <li>#adminbsb</li>
                                    <li>#freeadmintemplate</li>
                                    <li>#bootstraptemplate</li>
                                    <li>
                                        #freehtmltemplate
                                        <span class="pull-right">
                                            <i class="material-icons">trending_up</i>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- #END# Latest Social Trends -->
                    <!-- Answered Tickets -->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="body bg-teal">
                                <div class="font-bold m-b--35">ANSWERED TICKETS</div>
                                <ul class="dashboard-stat-list">
                                    <li>
                                        TODAY
                                        <span class="pull-right"><b>12</b> <small>TICKETS</small></span>
                                    </li>
                                    <li>
                                        YESTERDAY
                                        <span class="pull-right"><b>15</b> <small>TICKETS</small></span>
                                    </li>
                                    <li>
                                        LAST WEEK
                                        <span class="pull-right"><b>90</b> <small>TICKETS</small></span>
                                    </li>
                                    <li>
                                        LAST MONTH
                                        <span class="pull-right"><b>342</b> <small>TICKETS</small></span>
                                    </li>
                                    <li>
                                        LAST YEAR
                                        <span class="pull-right"><b>4 225</b> <small>TICKETS</small></span>
                                    </li>
                                    <li>
                                        ALL
                                        <span class="pull-right"><b>8 752</b> <small>TICKETS</small></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- #END# Answered Tickets -->
                </div>

                <div class="row clearfix">
                    <!-- Task Info -->
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <div class="card">
                            <div class="header">
                                <h2>TASK INFOS</h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-hover dashboard-task-infos">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Task</th>
                                                <th>Status</th>
                                                <th>Manager</th>
                                                <th>Progress</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Task A</td>
                                                <td><span class="label bg-green">Doing</span></td>
                                                <td>John Doe</td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Task B</td>
                                                <td><span class="label bg-blue">To Do</span></td>
                                                <td>John Doe</td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Task C</td>
                                                <td><span class="label bg-light-blue">On Hold</span></td>
                                                <td>John Doe</td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-light-blue" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Task D</td>
                                                <td><span class="label bg-orange">Wait Approvel</span></td>
                                                <td>John Doe</td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Task E</td>
                                                <td>
                                                    <span class="label bg-red">Suspended</span>
                                                </td>
                                                <td>John Doe</td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-red" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- #END# Task Info -->
                    <!-- Browser Usage -->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="header">
                                <h2>BROWSER USAGE</h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div id="donut_chart" class="dashboard-donut-chart">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- #END# Browser Usage -->
                </div>
            </div>
        </section>
        <!-- Jquery CountTo Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/jquery-countto/jquery.countTo.js"></script>
        <!-- Morris Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/raphael/raphael.min.js"></script>
        <script src="<?php echo config_item('assets_dir');?>plugins/morrisjs/morris.js"></script>
        <!-- ChartJs -->
        <script src="<?php echo config_item('assets_dir');?>plugins/chartjs/Chart.bundle.js"></script>
        <!-- Flot Charts Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/flot-charts/jquery.flot.js"></script>
        <script src="<?php echo config_item('assets_dir');?>plugins/flot-charts/jquery.flot.resize.js"></script>
        <script src="<?php echo config_item('assets_dir');?>plugins/flot-charts/jquery.flot.pie.js"></script>
        <script src="<?php echo config_item('assets_dir');?>plugins/flot-charts/jquery.flot.categories.js"></script>
        <script src="<?php echo config_item('assets_dir');?>plugins/flot-charts/jquery.flot.time.js"></script>
        <!-- Sparkline Chart Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/jquery-sparkline/jquery.sparkline.js"></script>
        <script src="<?php echo config_item('assets_dir');?>js/pages/index.js"></script>