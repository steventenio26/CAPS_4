<div class="container">
    <div class="row">
        <div class="col-md-12 p-2 mb-2">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <textarea class="form-control" name="content" rows="5" placeholder="Announce something to your class"></textarea>
                        </div>
                        <button name="post" class="btn btn-dark float-right">Post</button>
                    </form>                    
                </div>
            </div>
        </div>
        <div class="col-md-12 p-2 mb-3">
<?php

if(isset($_POST['delete'])){
    $id = $_POST['id'];
    mysqli_query($conn,"DELETE FROM teacher_class_announcements WHERE teacher_class_announcements_id = '$id'")or die(mysqli_error());
}


if (isset($_POST['post'])){
    $content = $_POST['content'];
    mysqli_query($conn,"INSERT into teacher_class_announcements (teacher_class_id,teacher_id,content,date) values('$get_id','$session_id','$content',NOW())")or die(mysqli_error());
    mysqli_query($conn,"insert into notification (teacher_class_id,notification,date_of_notification,link) value('$get_id','Add Annoucements',NOW(),'announcements_student.php')")or die(mysqli_error());
}
if (isset($_POST['update'])){
    $id = $_POST['id'];
    $context = $_POST['context'];
    mysqli_query($conn,"UPDATE teacher_class_announcements  SET content = '$context', date = NOW() WHERE teacher_class_announcements_id = '$id' ")or die(mysqli_error());
  }
include "function_timeago.php";

function url ($text){
    $text = html_entity_decode($text);
    $text = "".$text;
    $text = preg_replace('/(https{0,1}:\/\/[\w\-\.\/#?&=]*)/','<a href="$1" target="_blank">$1</a>',$text);
    return $text;
}

$sql1 = "SELECT * FROM teacher_class_announcements WHERE teacher_class_id = '$get_id' ORDER BY date DESC";
$query_announcement = mysqli_query($conn,$sql1);

if(mysqli_num_rows($query_announcement) > 0){
    while($row = mysqli_fetch_array($query_announcement)){
        $id = $row['teacher_class_announcements_id'];
        $uploader_id = $row['teacher_id'];
        $uploader_query = mysqli_query($conn, "SELECT * FROM teacher WHERE teacher_id = '$uploader_id' ");
        $uploader_row = mysqli_fetch_array($uploader_query);
        $uploader_picture = $uploader_row['location'];
        $uploader_fullname = ucwords($uploader_row['firstname'].' '.$uploader_row['lastname']);
        $content_txt = url($row['content']);
        $edit_content_txt = $row['content'];
        ?>
                    <div class="card mb-4" id="<?php echo $id;?>">                
                        <div class="card-body d-inline-flex">                    
                            <img id="post_avatar"class="rounded-circle" src="../admin/<?php echo $uploader_picture; ?>">
                            <div class="d-flex-column">                        
                                <h3 class="text-dark ml-3 mb-0 pb-0 h5"><?php echo $uploader_fullname; ?></h3>
                                <p class="text-muted ml-3"><span data-feather="clock"></span>
                                <?php echo time_ago($row['date']); ?></p>
                            </div>
                            <?php
                            if ($uploader_id == $session_id){
                            ?>
                            <div class="dropdown ml-auto">
                                <a href="" class="text-dark" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span data-feather="more-vertical"></span></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item text-dark" href="#" data-toggle="modal" data-target="#response<?php echo $id;?>"><span data-feather="edit-2"></span> Edit</a>                            
                                    <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#delete<?php echo $id;?>" name="delete-post"><span data-feather="trash-2"></span>  Delete</a>
                                </div>
                            </div>
                            <?php }
                            ?>
                        </div>
                        <?php include "edit_post.php";?>
                        <?php 
                        $delete_header="Post";
                        $delete_content="post";
                        include "delete_announcement.php";?>
                        <div class="mx-5 mb-4 pl-5">
                            <p class="text-dark"><?php echo $content_txt; ?></p>
                        </div>               
                    </div> <?php }
}else{?>
    <div class="alert alert-danger">
        <h6 class="text-dark text-center"><span data-feather="alert-triangle"></span> No Announcement</h6>
    </div>
<?php } ?>


        </div>
    </div>
</div>