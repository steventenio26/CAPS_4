<div class="container-fluid">
        
            <?php

            if (isset($_POST['delete'])){
                $id = $_POST['id'];
                mysqli_query($conn,"DELETE FROM assignment WHERE assignment_id = '$id' ")or die(mysqli_error());
            }

            $sql = "SELECT * FROM assignment WHERE class_id = '$get_id' ORDER BY fdatein DESC ";
            $query = mysqli_query($conn,$sql);

            if(mysqli_num_rows($query) > 0){ ?>

<table class="table text-center">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Date Uploaded</th>
                <th scope="col">File Name</th>
                <th scope="col">Description</th>
                <th scope="col">View</th>
                <?php 
                if ($dep_count < 1 && ($sec_row['archive_status'] == '0')){ ?>
                <th scope="col">Delete</th>
                <?php }
                ?>
                </tr>
            </thead>
            <tbody>

               <?php while($row = mysqli_fetch_array($query)){
                            $id  = $row['assignment_id'];
                            $floc  = $row['floc'];?>
                                <tr>
                                <td><?php echo $row['fdatein']; ?></td>
                                <td><?php  echo $row['fname']; ?></td>
                                <td><?php echo $row['fdesc']; ?></td>
                                <td><a href="view_submit_assignment.php?<?php echo 'id='.$get_id.'&cid='.$class_id.'&assid='.$id;?>" class="text-success" data-toggle="tooltip" data-placement="bottom" title="View Students Who Submit Assignment"><span data-feather="folder"></span></a></td>
                                <?php 
                                if ($dep_count < 1 && ($sec_row['archive_status'] == '0')){ ?>
                                <td><a href="#<?php echo $id; ?>" data-toggle="modal" data-target="#delete<?php echo $id;?>" class="text-danger"><span data-feather="trash-2"></span></a></td>
                                <?php }
                                ?>
                                </tr>
                                
                        <?php 
                        $delete_header="Assignment";
                        $delete_content="assignment";
                        include "delete_assignment.php";
                        } ?>
                </tbody>
        </table>
            <?php }else{?>

                <div class="alert alert-danger">
                    <h6 class="text-center text-dark"><span data-feather="alert-triangle"></span>  Currently you did not upload any assignment</h6>
                </div>

           <?php } ?>

           
           
</div>

