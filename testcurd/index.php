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
        .table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tool-tip"]').tooltip();
        });
    </script>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header clearfix">
                    <h2 class="pull-left">Student Details</h2>
                    <a href="create.php" class="btn btn-success pull-right">Add new student</a>
                </div>
                <?php
                require_once 'config.php';

                $sql = "SELECT * FROM student";
                if ($result = mysqli_query($nink, $sql)){
                    if (mysqli_num_rows($result) > 0){
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>Name</th>";
                        echo "<th>BirthDay</th>";
                        echo "<th>Address</th>";
                        echo "<th>Class</th>";
                        echo "<tr>";
                        echo "<thead>";
                        echo "<tbody>";
                        while ($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>" . $row['stuID'] . "</td>";
                            echo "<td>" . $row['stuName'] . "</td>";
                            echo "<td>" . $row['stuDay'] . "</td>";
                            echo "<td>" . $row['address'] . "</td>";
                            echo "<td>" . $row['classID'] . "</td>";
                            echo "<td>";
                            echo "<a href='view.php?stuID=" . $row['stuID'] . "' title='View Record' data-toggle='tooltip'><span class = 'glyphicon glyphicon-eye-open'></span></a>";
                            echo "<a href='update.php?stuID=" . $row['stuID'] . "' title='Update Record' data-toggle='tooltip'><span class = 'glyphicon glyphicon-pencil'></span></a>";
                            echo "<a href='delete.php?stuID=" . $row['stuID'] . "' title='Delete Record' data-toggle='tooltip'><span class = 'glyphicon glyphicon-trash'></span></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";

                        mysqli_free_result($result);
                    } else{
                        echo "ERROR: Could not able to execute $sql " . mysqli_error($nink);
                    }
                }
                mysqli_close($nink);
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>