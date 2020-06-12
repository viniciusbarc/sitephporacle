<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
		    <h2 class="pull-left">Employees Details <?php echo $_SERVER['SERVER_ADDR']; ?></h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Employee</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
		    $stid = oci_parse($link, 'SELECT * FROM employees order by id');
		    oci_execute($stid);
                    echo "<table class='table table-bordered table-striped'>";
                      echo "<thead>";
                        echo "<tr>";
                          echo "<th>#</th>";
                          echo "<th>Name</th>";
                          echo "<th>Address</th>";
                          echo "<th>Salary</th>";
                          echo "<th>Action</th>";
                        echo "</tr>";
                      echo "</thead>";
                      echo "<tbody>";
       		      while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
                          echo "<tr>";
                            echo "<td>" . $row['ID'] . "</td>";
                            echo "<td>" . $row['NAME'] . "</td>";
                            echo "<td>" . $row['ADDRESS'] . "</td>";
                            echo "<td>" . $row['SALARY'] . "</td>";
                            echo "<td>";
                                echo "<a href='delete.php?id=". $row['ID'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                            echo "</td>";
                          echo "</tr>";
		      }
                      echo "</tbody>";                            
                    echo "</table>";
		    oci_free_statement($stid);
		    oci_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
