<!DOCTYPE html>
<html lang="en" ng-app="expenseApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Expenses</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/startmin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="/libs/angular/angular.min.js"></script>
    <script src="/libs/angular-route/angular-route.min.js"></script>
</head>
<body ng-controller="MainController">

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">Expenses</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="#">Carlos Moreira</a></li>
        </ul>

<!--        <ul class="nav navbar-right navbar-top-links">-->
<!--            <li class="dropdown navbar-inverse">-->
<!--                <a class="dropdown-toggle" data-toggle="dropdown" href="#">-->
<!--                    <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>-->
<!--                </a>-->
<!--                <ul class="dropdown-menu dropdown-alerts">-->
<!--                    <li>-->
<!--                        <a href="#">-->
<!--                            <div>-->
<!--                                <i class="fa fa-comment fa-fw"></i> New Comment-->
<!--                                <span class="pull-right text-muted small">4 minutes ago</span>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">-->
<!--                            <div>-->
<!--                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers-->
<!--                                <span class="pull-right text-muted small">12 minutes ago</span>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">-->
<!--                            <div>-->
<!--                                <i class="fa fa-envelope fa-fw"></i> Message Sent-->
<!--                                <span class="pull-right text-muted small">4 minutes ago</span>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">-->
<!--                            <div>-->
<!--                                <i class="fa fa-tasks fa-fw"></i> New Task-->
<!--                                <span class="pull-right text-muted small">4 minutes ago</span>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">-->
<!--                            <div>-->
<!--                                <i class="fa fa-upload fa-fw"></i> Server Rebooted-->
<!--                                <span class="pull-right text-muted small">4 minutes ago</span>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="divider"></li>-->
<!--                    <li>-->
<!--                        <a class="text-center" href="#">-->
<!--                            <strong>See All Alerts</strong>-->
<!--                            <i class="fa fa-angle-right"></i>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li class="dropdown">-->
<!--                <a class="dropdown-toggle" data-toggle="dropdown" href="#">-->
<!--                    <i class="fa fa-user fa-fw"></i> secondtruth <b class="caret"></b>-->
<!--                </a>-->
<!--                <ul class="dropdown-menu dropdown-user">-->
<!--                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>-->
<!--                    </li>-->
<!--                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>-->
<!--                    </li>-->
<!--                    <li class="divider"></li>-->
<!--                    <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
<!--        </ul>-->
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li class="active">
                        <a href="#/payments"><i class="fa fa-dashboard fa-fw"></i> Monthly Payments</a>
                    </li>
                    <li>
                        <a href="#/expenses"><i class="fa fa-dashboard fa-fw"></i> Expenses</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <ng-view></ng-view>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../js/startmin.js"></script>

<script src="/js/app/app.js"></script>

</body>
</html>
