<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />
       
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
                                    $query = mysqli_query($con,"select * from student");
                                    while($row = mysqli_fetch_array($query)){
                                    ?>
                                    <tr>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['semester']; ?></td>
                                        <td><?php echo $row['section']; ?></td>
                                        <td><?php echo $row['session']; ?></td>
                                        <td><?php echo $row['mobile']; ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-primary mr-1" id="edit_btn" data-toggle="modal" data-id='<?php echo $row['sl']; ?>' >
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>



                                    <div id="myModal"  class="modal fade in" tabindex="-1" role="dialog">
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
                                                            <input type="hidden" name="updateId" id="updateId" >
                                                            <div class="form-group">
                                                                <label for="some" class="col-form-label">Name</label>
                                                                <input type="text" id='st_name' name="name"  class="form-control"  required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="some" class="col-form-label">Id</label>
                                                                
                                                                <input type="text" id='st_id' name="id" class="form-control"  required>
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





















        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.ripples/0.5.3/jquery.ripples.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>


        <script type="text/javascript">

            $(document).ready(function(){
                $('#dataTable').DataTable();
   

            });
            
            $(document).on('click','#edit_btn',function() {
                var ID = $(this).attr('data-id');
              
                $.ajax(
                    {
                        url: 'load.php',
                        method: 'POST',
                        data:{UserID:ID},
                        dataType: 'JSON',
                        success: function(data)
                        {
                            $("#updateId").val(data[0]);
                            $("#st_name").val(data[1]);
                            $("#st_id").val(data[2]);
                            $("#myModal").modal('show');
                            console.log($('#updateId').val());

                        }

                    })
            });

        </script>

    </body>
</html>