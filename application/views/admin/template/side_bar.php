 <!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas" style="min-height: 2038px;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <!--<div class="pull-left image">
                <img alt="User Image" class="img-circle" src="img/avatar3.png">
            </div> -->
            <div class="pull-left info">
                <p>Hello, <?php echo $this->user_session['uname'];?></p>

                <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
            </div>
        </div>
        <!-- search form -->
        <?php /*<form class="sidebar-form" method="get" action="#">
            <div class="input-group">
                <input type="text" placeholder="Search..." class="form-control" name="q">
                <span class="input-group-btn">
                    <button class="btn btn-flat" id="search-btn" name="seach" type="submit"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>*/ ?>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="active">
                <a href="<?=admin_path()."dashboard"?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
                <a href="<?=admin_path()."users"?>">
                    <i class="fa fa-dashboard"></i> <span>Users</span>
                </a>
				<a href="<?=admin_path()."dealer"?>">
                    <i class="fa fa-dashboard"></i> <span>Dealer</span>
                </a>
				<a href="<?=admin_path()."category"?>">
                    <i class="fa fa-dashboard"></i> <span>Category</span>
                </a>
				<a href="<?=admin_path()."deal"?>">
                    <i class="fa fa-dashboard"></i> <span>Deal</span>
                </a>
            </li>
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>