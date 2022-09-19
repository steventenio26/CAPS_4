<?php 
include "header_dashboard.php";
include "../session.php";
$get_id = $_GET['id'];
$class_id = $_GET['cid'];
$quiz_id = $_GET['q'];
$qid = $_GET['qid'];
include "navbar_teacher.php";
?>

<div class="container-fluid">
    <div class="row">
        <?php 
        $quiz="active";
        include "class_sidebar.php";
        $query = mysqli_query($conn,"SELECT * from teacher_class
        LEFT JOIN class ON class.class_id = teacher_class.class_id
        LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
        WHERE teacher_class_id = '$get_id' ");
        $sec_row = mysqli_fetch_array($query);
        $class_name = ucwords($sec_row['class_name']).' ('.ucwords($sec_row['subject_code'].')');
        ?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
              <li class="breadcrumb-item"><?php echo $class_name; ?></li>
              <li class="breadcrumb-item"><a href="class_quiz.php<?php echo '?id='.$get_id.'&cid='.$class_id; ?>">Class Quiz</a></li>
              <li class="breadcrumb-item active" aria-current="page">Quiz Item Analysis</li>
            </ol>
          </nav>
          </div>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM quiz_results WHERE quiz_id = '$quiz_id'");
            $query = mysqli_query($conn,"SELECT * FROM questions WHERE quiz_id = '$quiz_id' ");
            $count = mysqli_num_rows($result);
            $dataPoints = array();

            if ($count > 0){ ?>
          <div id="chartContainer" style="height: 470px; width: 100%;"></div></br></br></br></br>
          <div class="container-fluid">    
                <table class="table text-center mb-5">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Question</th>
                        <th scope="col">Total of Correct Answer</th>
                        <th scope="col">Total of Test Takers</th>
                        <th scope="col">Difficulty Index</th>               
                        </tr>
                    </thead>
                    <tbody>
        <?php   
                $number = 0;
                while($row = mysqli_fetch_array($query)){
                    $points = $row['points'];
                    $D_index = round($points / $count, 2);
                    $D_text = "";
                    $number += 1;
                    if ($D_index < 0.26){
                        $D_text = " (Difficult)";
                    } elseif ($D_index > 0.75){
                        $D_text = " (Easy)";
                    }else{
                        $D_text = " (Right Difficult)";
                    }
                    array_push($dataPoints, array("label"=> $row['question_no'], "y"=> $D_index*100));
                ?>
                        <tr>
                            <td><?php echo $number; ?></td>
                            <td><?php echo $row['question']; ?></td>
                            <td><?php  echo $points; ?></td>
                            <td><?php  echo $count; ?></td>
                            <td><?php  echo $D_index.$D_text; ?></td>
                        </tr>                        
        <?php } ?>
                    </tbody>
                </table>
                <?php }else{ ?>
                    <div class="alert alert-danger">
                        <h6 class="text-center text-dark"><span data-feather="alert-triangle"></span>
                        Students haven't taken the quiz yet</h6>
                    </div>
               <?php } ?>
</div>

        </main>
    </div>
</div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light1",
    axisY:{
        maximum: 100,
        minimum: 0
    },
	data: [{
		type: "column",
		yValueFormatString: "#,##0.0#\"%\"",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
<script type="text/javascript">
    $(function(){
    $('#datetime').datetimepicker();
    });
</script>
<?php include "footer.php"; ?>
