<<<<<<< HEAD
<html>
  <head>
 <style>
@import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);
}
@import url(https://fonts.googleapis.com/css?family=Titillium+Web:300);
.fa-2x {
font-size: 2em;
}
.fa {
position: relative;
display: table-cell;
width: 60px;
height: 36px;
text-align: center;
vertical-align: middle;
font-size:20px;
}


.main-menu:hover,nav.main-menu.expanded {
width:250px;
overflow:visible;
}

.main-menu {
background:#212121;
border-right:1px solid #e5e5e5;
position:absolute;
top:0;
bottom:0;
height:100%;
left:0;
width:60px;
overflow:hidden;
-webkit-transition:width .05s linear;
transition:width .05s linear;
-webkit-transform:translateZ(0) scale(1,1);
z-index:1000;
}

.main-menu>ul {
margin:7px 0;
}

.main-menu li {
position:relative;
display:block;
width:250px;
}

.main-menu li>a {
position:relative;
display:table;
border-collapse:collapse;
border-spacing:0;
color:#999;
 font-family: arial;
font-size: 14px;
text-decoration:none;
-webkit-transform:translateZ(0) scale(1,1);
-webkit-transition:all .1s linear;
transition:all .1s linear;
  
}

.main-menu .nav-icon {
position:relative;
display:table-cell;
width:60px;
height:36px;
text-align:center;
vertical-align:middle;
font-size:18px;
}

.main-menu .nav-text {
position:relative;
display:table-cell;
vertical-align:middle;
width:190px;
  font-family: 'Titillium Web', sans-serif;
}

.main-menu>ul.logout {
position:absolute;
left:0;
bottom:0;
}

.no-touch .scrollable.hover {
overflow-y:hidden;
}

.no-touch .scrollable.hover:hover {
overflow-y:auto;
overflow:visible;
}

a:hover,a:focus {
text-decoration:none;
}

nav {
-webkit-user-select:none;
-moz-user-select:none;
-ms-user-select:none;
-o-user-select:none;
user-select:none;
}

nav ul,nav li {
outline:0;
margin:0;
padding:0;
}
.main-menu li:hover>a,nav.main-menu li.active>a,.dropdown-menu>li>a:hover,.dropdown-menu>li>a:focus,.dropdown-menu>.active>a,.dropdown-menu>.active>a:hover,.dropdown-menu>.active>a:focus,.no-touch .dashboard-page nav.dashboard-menu ul li:hover a,.dashboard-page nav.dashboard-menu ul li.active a {
color:#fff;
background-color:#5fa2db;
}

@font-face {
  font-family: 'Titillium Web';
  font-style: normal;
  font-weight: 300;
  src: local('Titillium WebLight'), local('TitilliumWeb-Light'), url(http://themes.googleusercontent.com/static/fonts/titilliumweb/v2/anMUvcNT0H1YN4FII8wpr24bNCNEoFTpS2BTjF6FB5E.woff) format('woff');
}

</style>
  </head>
  <body>
    <div class="area"></div>
        <nav class="main-menu">
            <ul>
                <li><a href="index.php"><i class="fa fa-home fa-2x"></i><span class="nav-text">Dashboard</span></a></li>
                <li><a href="vendor.php"><i class="fa fa-building"></i><span class="nav-text">Vendors</span></a></li>
                <li><a href="project.php"><i class="fa fa-briefcase"></i><span class="nav-text">Projects</span></a></li>
                <li><a href="sample.php"><i class="fa fa-inbox"></i><span class="nav-text">Samples</span></a></li>
                <li><a href="samplerecord.php"><i class="fa fa-ticket"></i><span class="nav-text">Request Records</span></a></li>
                <li><a href="vendorcontact.php"><i class="fa fa-user"></i><span class="nav-text">Contacts</span></a></li>
            </ul>
        </nav>
  </body>
</html>
=======
<?php
include('dbconnect.php');
$email; $phone;
$tmpsql = 'SELECT * FROM Entity_Attribute WHERE EID = 1 AND EASubCategoty = "Primary"';
$tmpresult = $dbconnect->query($tmpsql);
while($tmprow = $tmpresult->fetch_assoc()){
	//echo 1;
	if($tmprow['EACategory'] == "email"){
		$email = $tmprow['EAString'];
    }
	else if($tmprow['EACategory'] == "phone"){
    	$phone = $tmprow['EAString'];
    }
}
echo $email.$phone;
?>
>>>>>>> 3eb9be92b01e1ad40c96a52ddee23ba0b0de8a23
