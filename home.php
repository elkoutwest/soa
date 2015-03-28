<?PHP

require_once("include/membersite_config.php");

if(!$main->CheckLogin())
{
    $main->RedirectToURL("login.php");
    exit;
}
?>

<!DOCTYPE html>

<html class="pxajs">

<title>Soa</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="public/css/soa.css">
<!-- Copyright Academia.edu All rights reserved. -->
<link href="public/css/aca.css" media="all" rel="stylesheet">

<script type="text/javascript" src="public/js/like.js"></script>
<link href="public/css/like.css" rel="stylesheet" type="text/css" />

</head>

<body>

  <div>

    <div align="center">
      <h1>soa</h1>
    </div>

  </div>
      
<div id="site" class="fixed">

<div id="content" class="clearfix">

<div class="new-profile clearfix" itemscope="itemscope" itemtype="http://schema.org/Person">

<div class="header clearfix">
  <div class="name-and-affiliation">
    <!-- display username -->
    <h1>

      <?php

        //require_once("include/membersite_config.php");
        //require_once("include/main.php");

        //$result=mysql_query("SELECT * FROM users where username = ?", $_SESSION["username"]);
        //echo $result

      ?>

    </h1>

</div
        <!-- get the like button to work
          <button class="follow-button follow button green btn-200-34" id="send_message_link" data-recipient-id="12027415" data-send-message="true">
              <a href='like.php'>Like</a>
          </button>
        -->

          <button class="follow-button follow button green btn-200-34">
            <a href='logout.php'>Log out</a>
          </button>

</div>
</div>
</div>

<!-- cite academia.edu -->
<div id="site" class="fixed">
<div id="content" class="clearfix">
<div class="new-profile clearfix" itemscope="itemscope" itemtype="http://schema.org/Person">
  
<div class="left-column">

<!--
<div class="profile_photo"><a class="pjax" href="">
  <img alt="" id="profile-photo" src="" height="200" border="0" width="200"></a>
</div>
-->
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="uploaded_file"><br>
        <input type="submit" value="Upload file">
    </form>

<br>
<div class="sign-up" align="center"><p><a href="http://localhost:3000/">Chat with friends.</a></p></div>
<br>
<div class="sign-up" align="center"><p><a href="browse.php">Find your friend's papers.</a></p></div>

<ul class="nav sections_nav"></ul>

</div> <!-- left column -->

<!-- center column -->

<div class="center-column">
<div class="content">
<div class="summary_page">
<div class="works_section" id="new_section" data-name="Papers">
  <div class="section_heading">
    <a class="section_name pjax_with_scroll">Papers</a>
  </div>
</div>
</div>
</div>

<?php
// cite http://bytes.com/topic/php/insights/740327-uploading-files-into-mysql-database-using-php/4

require_once("include/membersite_config.php");
require_once("include/user.php");
// Connect to the database
$dbLink = new mysqli('localhost', 'root', '', 'soa');
if(mysqli_connect_errno()) 
{
    die("MySQL connection failed: ". mysqli_connect_error());
}

// make custom accounts to work
//$id = $_SESSION['id_user'];
//$result = $dbLink->query("SELECT id_user, file_name, created, username FROM users WHERE id_user = $id");

$result = $dbLink->query("SELECT id, name, created, username FROM file");

if($result) {
    
    if($result->num_rows == 0) {
        echo '<p>There are no files in the database</p>';
    }
    else 
    {
        // Print the top of a table
        echo '<table width="100%">
                <tr>
                    <td><b>Paper</b></td>
                    <td><b>&nbsp;</b></td>
                </tr>';
 
        // Print each file
        while($row = $result->fetch_assoc()) 
        {
            echo "
                <tr>
                    <td>{$row['name']}</td>
                    <td><a href='get_file.php?id={$row['id']}'>Download</a></td>
                </tr>";
        }
 
        // Close table
        echo '</table>';
    }
 
    // Free the result
    $result->free();
}
else
{
    echo 'Error! SQL query failed:';
    echo "<pre>{$dbLink->error}</pre>";
}
 
// Close the mysql connection
$dbLink->close();
?>

</div> <!-- center column --> 

</div>
</div>
</div>
</div>


</body>
</html>
