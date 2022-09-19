<?php
include "db_conn.php";
include "../session.php";

if(isset($_POST['update'])){
    $idget = $_GET['id'];
    $quiz_title = $_POST['quiz_title'];
    $description = $_POST['content'];
    mysqli_query($conn,"UPDATE quiz SET quiz_title = '$quiz_title',quiz_description = '$description' WHERE quiz_id = '$idget'");

    header("Location: teacher_quiz.php");
}
if(isset($_POST['update_exam'])){
    $idget = $_GET['id'];
    $quiz_title = $_POST['quiz_title'];
    $description = $_POST['content'];
    mysqli_query($conn,"UPDATE exam SET exam_title = '$quiz_title',exam_description = '$description' WHERE exam_id = '$idget'");

    header("Location: teacher_exam.php");
}

if (isset($_POST['update_question'])){
    $id = $_GET['id'];
    $get_id = $_GET['quiz_id'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $result = mysqli_query($conn, 
    "UPDATE questions 
    SET question = '$question', 
    answer = '$answer', 
    opt1 = '$option1', 
    opt2 = '$option2', 
    opt3 = '$option3', 
    opt4 = '$option4' 
    WHERE question_id = '$id' ") 
    or die (mysqli_error());

    header("Location: quiz_question.php?id=$get_id");
}
if (isset($_POST['update_question_exam'])){
    $id = $_GET['id'];
    $get_id = $_GET['quiz_id'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $result = mysqli_query($conn, 
    "UPDATE exam_questions 
    SET question = '$question', 
    answer = '$answer', 
    opt1 = '$option1', 
    opt2 = '$option2', 
    opt3 = '$option3', 
    opt4 = '$option4' 
    WHERE question_id = '$id' ") 
    or die (mysqli_error());

    header("Location: exam_question.php?id=$get_id");
}


if (isset($_POST['save'])){
    $get_id = $_GET['id'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];

    mysqli_query($conn,"INSERT INTO questions (quiz_id,question,answer,opt1,opt2,opt3,opt4) VALUES('$get_id','$question','$answer','$option1','$option2','$option3','$option4')");
    
    header("Location: quiz_question.php?id=$get_id");
}
if (isset($_POST['save_exam_question'])){
    $get_id = $_GET['id'];
    $number = $_POST['number'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];

    mysqli_query($conn,"INSERT INTO exam_questions (exam_id,question_no,question,answer,opt1,opt2,opt3,opt4) VALUES('$get_id','$number','$question','$answer','$option1','$option2','$option3','$option4')")or die(mysqli_error());
    
    header("Location: exam_question.php?id=$get_id");
}
 
if(isset($_POST['delete_question'])){
    $id = $_GET['id'];
    $get_id = $_GET['exam_id'];
    $result = mysqli_query($conn,"DELETE FROM exam_questions WHERE question_id='$id'")or die (mysqli_error());

    $sql = mysqli_query($conn, "SELECT * FROM exam_questions WHERE exam_id = '$get_id'");
    $i = 0;
    while($row = mysqli_fetch_array($sql)){
        $i += 1;
        $question_id = $row['question_id'];
        mysqli_query($conn,"UPDATE exam_questions SET question_no = '$i' WHERE question_id = '$question_id'");
    }

    header("Location: exam_question.php?id=$get_id");
}

if(isset($_POST['delete_question_quiz'])){
    $id = $_GET['id'];
    $get_id = $_GET['quiz_id'];
    $result = mysqli_query($conn,"DELETE FROM questions WHERE question_id='$id'")or die (mysqli_error());

    $sql = mysqli_query($conn, "SELECT * FROM questions WHERE quiz_id = '$get_id'");
    $i = 0;
    while($row = mysqli_fetch_array($sql)){
        $i += 1;
        $question_id = $row['question_id'];
        mysqli_query($conn,"UPDATE questions SET question_no = '$i' WHERE question_id = '$question_id'")or die (mysqli_error());
    }

    header("Location: quiz_question.php?id=$get_id");
}