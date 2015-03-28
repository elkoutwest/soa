<!DOCTYPE html>

<html class="pxajs">

<head>

<title>Soa</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="public/css/soa.css">

  <!-- Copyright http://www.joanponsmoll.com/ All rights reserved. -->
  <link rel="stylesheet" type="text/css" href="public/css/soa.css">
  <link href="public/css/aca.css" media="all" rel="stylesheet">
  <script type="text/javascript" src="public/js/ga.js" async=""></script>
  <script type="text/javascript" src="public/js/default.js"></script>
  <script type="text/javascript" src="public/js/font.js"></script>
  <style type="text/css">.tk-proxima-nova{font-family:"proxima-nova-1","proxima-nova-2",sans-serif;}</style>
  <link href="css/d.css" rel="stylesheet">
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    <style type="text/css">
      html { overflow-y: scroll; } 

      iframe{
      width: 990px;
      height: 556px;
      }    
    </style>
   
</head>

<!-- Copyright http://www.joanponsmoll.com/ All rights reserved. -->
<body class="template-body cfix template-body-work buy-button-1 print-button-1">

<!-- primary content -->
<div id="site-container" class="cfix template-column centered-website">
  <div id="logo-nav-container" class="cfix"><div id="geometric-logo-container" class="left template-column cfix template-column-1">
  <div id="geometric-logo-wrap" align="center">
    <h1>soa</h1>
    <br>
  </div>
</div>
</div>
<!-- .sort-group -->

<?php
// cite http://bytes.com/topic/php/insights/740327-uploading-files-into-mysql-database-using-php/4

// Connect to the database
$dbLink = new mysqli('localhost', 'root', '', 'soa');
if(mysqli_connect_errno()) 
{
    die("MySQL connection failed: ". mysqli_connect_error());
}
 
$sql = 'SELECT `id`, `name`, `created` FROM `file`';
$result = $dbLink->query($sql);
 
if($result) {
    
    if($result->num_rows == 0) {
        echo '<p>There are no files in the database</p>';
    }
    else 
    {
        // Print the top of a table
        echo '<table width="100%">
                <tr>
                    <td><b>All Papers</b></td>
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

</body>
</html>