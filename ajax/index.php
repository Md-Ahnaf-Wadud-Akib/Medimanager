<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
   
   <?php include('db.php') ;
    
    
    if(isset($_POST["update"])){
        $sl = $_POST['updateId'];
        $name = $_POST['name'];
        $id = $_POST['id'];
        $semester = $_POST['semester'];
        $query = mysqli_query($conn, "update student set name='$name',id='$id',semester='$semester' where sl='$sl'  ");
    }
    if(isset($_POST["delete"])){
        $sl = $_POST['deleteId'];

        $query = mysqli_query($conn, "delete from student where sl='$sl'");
        if($query){
            echo "<script>

    alert('deleted successfully');
    </script>";
        }
    }
    
    
    
    
    
    
    
    
    ?>
   
   
   
   
    <div class="table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="tableBox" >
                        <table id="dataTable" class="table table-bordered table-striped" style="z-index: -1">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>ID</th>
                                    <th>Semester</th>
                                    <th>Section</th>
                                    <th>Session</th>
                                    <th>type</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
            $query = mysqli_query($conn,"select * from student");
            while($row = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['semester']; ?></td>
                                    <td><?php echo $row['section']; ?></td>
                                    <td><?php echo $row['session']; ?></td>
                                    <td><?php echo $row['mobile']; ?></td>
                                    <td><button class="btn btn-sm btn-primary mr-1" data-toggle="modal" data-target="#myModal_<?php echo $row['sl']; ?>" ><i class="fa fa-edit"></i></button><button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModalDelete_<?php echo $row['sl']; ?>"><i class="fa fa-trash"></i></button></td>
                                </tr>
                                
                                
                                
                                <div id="myModal_<?php echo $row['sl']; ?>"  class="modal fade in" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add New Inventory</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">

                                                    <div style="width: 77%;margin: auto;">

                                                        <div class="form-group">
                                                            <label for="some" class="col-form-label">Name</label>
                                                            <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" id="some" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="some" class="col-form-label">Id</label>
                                                            <input type="hidden" name="updateId" value="<?php echo $row['sl']; ?>">
                                                            <input type="text" name="id" class="form-control" value="<?php echo $row['id']; ?>" id="some" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="some" class="col-form-label">Semester</label>
                                                            <input type="text" value="<?php echo $row['semester']; ?>" name="semester" class="form-control" id="some" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="some" class="col-form-label">section</label>
                                                            <input type="text" value="<?php echo $row['section']; ?>" name="section" class="form-control" id="some" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="some" class="col-form-label">session</label>
                                                            <input type="text" name="session" value="<?php echo $row['session']; ?>" class="form-control" id="some" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="some" class="col-form-label">mobile</label>
                                                            <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>" class="form-control" id="some" required>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-info" name="update">Update</button>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                                
                                <!--delete modal-->
                                <!-- The Modal -->
                                <div class="modal" id="myModalDelete_<?php echo $row['sl']; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <form action="" method="POST">
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <input type="hidden" name="deleteId" value="<?php echo $row['sl']; ?>">
                                                    Are You Sure To Delete ?
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger float-right" name="delete">Delete</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                
                                
                                
                                
                                
                                <?php
                                }

                                ?>

                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
   
   
   
   
   
   
   
   
   
   
   
   
    
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.ripples/0.5.3/jquery.ripples.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    
    
    <script type="text/javascript">
        function update(e){
            
            $('#myModal').modal('show');
            $('input').value(e);
        }
        $(document).ready(function(){
            $('#dataTable').DataTable();
            
            
            




        });

    </script>
    
</body>
</html>