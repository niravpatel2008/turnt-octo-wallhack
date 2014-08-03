<body class="skin-blue">
    <!-- header logo: style can be found in header.less -->
   <header class="header">
            <a class="logo" href="<?=admin_path()?>">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Admin
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav role="navigation" class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a role="button" data-toggle="offcanvas" class="navbar-btn sidebar-toggle" href="#">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <!-- <li class="dropdown messages-menu">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">4</span>
                            </a>
                            
                        </li> -->
                        <!-- Notifications: style can be found in dropdown.less -->
                        <!-- <li class="dropdown notifications-menu">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning">10</span>
                            </a>
                           
                        </li> -->
                        <!-- Tasks: style can be found in dropdown.less -->
                        <!-- <li class="dropdown tasks-menu">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="fa fa-tasks"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            
                        </li> -->
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?=$this->user_session['uname']?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <!-- <img alt="User Image" class="img-circle" src="img/avatar3.png"> -->
                                    <p>
                                        <?=$this->user_session['uname']?> - Admin
                                        <small>Member since <?=date("M. Y", strtotime($this->user_session['create_date']))?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a class="btn btn-default btn-flat" href="#">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-default btn-flat" href="<?=admin_path()."index/logout"?>">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>