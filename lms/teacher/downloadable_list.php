<div class="container-fluid">
            <?php

            if(isset($_POST['delete'])){
                $id = $_POST['id'];
                mysqli_query($conn,"DELETE FROM files WHERE file_id = '$id' ")or die(mysqli_error());
            }


            $sql = "SELECT * FROM files WHERE class_id = '$get_id'  ORDER BY fdatein DESC";
            $query = mysqli_query($conn,$sql);

            if(mysqli_num_rows($query) > 0){ ?>
<table class="table text-center">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Date Uploaded</th>
                <th scope="col">File Name</th>
                <th scope="col">Description</th>
                <th scope="col">Uploaded By</th>
                <th scope="col">Download</th>
                <?php 
                if ($dep_count < 1 && $sec_row['archive_status'] == '0'){ ?>
                    <th scope="col">Delete</th>
                <?php }
                ?>
                </tr>
            </thead>
            <tbody>
        <?php    while($row = mysqli_fetch_array($query)){
            $id  = $row['file_id'];
        ?>
                <tr>
                <td><?php echo $row['fdatein']; ?></td>
                <td><?php  echo $row['fname']; ?></td>
                <td><?php echo $row['fdesc']; ?></td>
                <td><?php echo $row['uploaded_by']; ?></td>
                <td><a href="<?php echo $row['floc']; ?>" class="text-success" id="<?php echo $id; ?>download" ><span data-feather="download"></span></a></td>
                <?php 
                if ($dep_count < 1 && $sec_row['archive_status'] == '0'){ ?>
                    <td><a href="#" class="text-danger" data-toggle="modal" data-target="#delete<?php echo $id;?>"><span data-feather="trash-2"></span></a></td>
                <?php }
                ?>
                </tr>
        <?php 
        $delete_header = "File";
        $delete_content = "file";
    include "delete_assignment.php";
    }?>
            </tbody>
        </table>

         <?php   }else{ ?>
                <div class="alert alert-danger">
                    <h6 class="text-center text-dark"><span data-feather="alert-triangle"></span> Currently you did not upload any downloadable materials</h6>
                </div>
           <?php } ?>
            
</div>

