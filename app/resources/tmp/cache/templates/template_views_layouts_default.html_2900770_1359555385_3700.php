<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2013, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */
?>
<!doctype html>
<html>
<head>
	<?php echo $this->html->charset();?>
	<title>Application &gt; <?php echo $this->title(); ?></title>
	<?php echo $this->html->style(array('debug','bootstrap', 'style', 'bootstrap-responsive','jquery-ui-1.10.0.custom')); ?>
	<?php echo $this->html->link('Icon', null, array('type' => 'icon')); ?>
	<?php echo $this->html->script(array('jquery','admin','youdyog','bootstrap-dropdown','bootstrap-collapse', 'bootstrap-modal','jquery-1.9.0','jquery-ui-1.10.0.custom','bootstrap-typeahead')); ?>
	
</head>
<header class="">
	<header>
	<div class="navbar navbar-inverse" style="position: static;">
              <div class="navbar-inner">
                <div class="container">
                  <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                  <a class="brand" href="/login" style="color : #58ACFA !important;">Youdyog</a>
                  <div class="nav-collapse collapse navbar-inverse-collapse">
                   <?php if(isset($_SESSION['loginSuccess'])){?> 
                    <ul class="nav">
                      <li id="homeNav" class="navItem"><a href="/user">Home</a></li>
                      <li id="aboutNav" class="navItem"><a href="#">About</a></li>
                      <li id="friendsNav" class="navItem"><a href="/connections">Friends</a></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li id="exploreGroupsNav"><a href="/getPublicGroups">Explore Groups</a></li>
                          <li id="myGroupsNav"><a href="/myGroups">My Groups</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li class="nav-header">Nav header</li>
                          <li><a href="#">Separated link</a></li>
                          <li><a href="#">One more separated link</a></li>
                        </ul>
                       </li>
                     
                    </ul>
                  	
                  	<ul class="nav pull-right"> <li style="margin-top: 10px"><?php  echo ($_SESSION['email']);?></li>
                    <li id="logoutNav" class="navItem"><a href="/logout" style="float:right;"> Logout </a></li>
                    </ul>
                    <div class="navbar-search pull-right" style="display:none">
                    	<form id="frmSearchUser" action = "" method = "post">
                   			<input type = "text" id = "txtSearchName" class = "pull-right search-query span2" placeholder = "Search User" style = "margin-top:0.5%;" />
							<div class="icon-search"></div>
						</form>
		    		</div>
		    
		    <?php } 
		    ?>
                  </div><!-- /.nav-collapse -->
                </div>
              </div><!-- /navbar-inner -->
            </div>
</header>
</header>
<body class="app">
	<div id="container" class="container">
		<div id="content">
			<?php echo $this->content(); ?>
		</div>
	</div>
</body>
<footer><center><hr style="width : 100%"> &COPY; Copyright. 2013. www.youdyog.in. All Rights Reserved. </center></footer>
</html>
