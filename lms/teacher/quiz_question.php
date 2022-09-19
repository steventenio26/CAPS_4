<?php 
include "header_dashboard.php";
include "../session.php";
$get_id = $_GET['id'];
include "navbar_teacher.php";
?>

<div class="container-fluid">
    <div class="row">
        <?php 
        $exam="active";
        include "teacher_sidebar.php"; ?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light">
                    <li class="breadcrumb-item"><a href="teacher_quiz.php">Create Quiz</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Questions</li>
                </ol>
            </nav>
          </div>
          <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">Question List</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu1">Add Question</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="home" class="tab-pane active"><br>
                    <table class="table text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No.</th>               
                                <th scope="col">Question</th>             
                                <th scope="col">Answer</th>
                                <th scope="col">Option 1</th>
                                <th scope="col">Option 2</th>
                                <th scope="col">Option 3</th>
                                <th scope="col">Option 4</th>
                                <th scope="col">Edit Question</th>
                                <th scope="col">Delete Question</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = mysqli_query($conn,"SELECT * FROM questions WHERE quiz_id = '$get_id' ");
                            $number = 0;
                            while($row = mysqli_fetch_array($query)){
                            $number += 1;
                            $question_id  = $row['question_id'];
                            $answer = $row['answer'];
                        ?>
                            <tr>
                                <td><?php echo $row['question_no']; ?></td>
                                <td><?php echo $row['question']; ?></td>
                                <td><?php echo $answer; ?></td>
                                <td><?php echo $row['opt1']; ?></td>
                                <td><?php echo $row['opt2']; ?></td>
                                <td><?php echo $row['opt3']; ?></td>
                                <td><?php echo $row['opt4']; ?></td>
                                <td><a href="#" class="text-success" data-toggle="modal" data-target="#edit<?php echo $question_id;?>"><span data-feather="edit-2"></span></a></td>  
                                <td><a href="#" class="text-danger" data-toggle="modal" data-target="#delete_question<?php echo $question_id;?>"><span data-feather="trash-2"></span></a></td>
                            </tr>
                            <?php
                            include "delete_class_modal.php";
                        }?>
                        </tbody>
                    </table>
                </div>
                <div id="menu1" class="tab-pane fade"><br>
                    <form action="action.php?id=<?php echo $get_id;?>" method="post" class="form-group">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="form-group col-8">
                                <p>Question: </p>
                                <input type="text" class="form-control mb-1" name="question" placeholder="..." required>
                                <p>Answer:</p>
                                <input type="text" placeholder="..." name="answer" class="form-control mb-1" required>
                                <p>Option 1:</p>
                                <input type="text" placeholder="..." name="option1" class="form-control mb-1" required>  
                                <p>Option 2:</p>
                                <input type="text" placeholder="..." name="option2" class="form-control mb-1" required>  
                                <p>Option 3:</p>
                                <input type="text" placeholder="..." name="option3" class="form-control mb-1" required>  
                                <p>Option 4:</p>
                                <input type="text" placeholder="..." name="option4" class="form-control mb-1" required>  
                                <button name="save" class="btn btn-dark mt-3"><span data-feather="plus-circle"></span> Add Question</button>
                            </div>
                            <div class="col-2"></div>
                        </div>                
                    </form>                    
                </div>
            </div>
        </main>
    </div>
</div>

<?php include "footer.php"; ?>
