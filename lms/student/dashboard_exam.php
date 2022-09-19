<?php include('bootstrapandjquery.php'); ?>
<?php include('../session.php'); ?>
<style>
	body {
    background-color: rgb(106, 153, 151);
}

label.radio {
    cursor: pointer
}

label.radio input {
    position: absolute;
    top: 0;
    left: 0;
    visibility: hidden;
    pointer-events: none
}

label.radio span {
    padding: 4px 0px;
    border: 1px solid red;
    display: inline-block;
    color: red;
    width: 100px;
    text-align: center;
    border-radius: 3px;
    margin-top: 7px;
    text-transform: uppercase
}

label.radio input:checked+span {
    border-color: red;
    background-color: red;
    color: #fff
}

.ans {
    margin-left: 36px !important
}

.btn:focus {
    outline: 0 !important;
    box-shadow: none !important
}

.btn:active {
    outline: 0 !important;
    box-shadow: none !important
}



	</style>
	<div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10 col-lg-10">
            <div class="border">
                <div class="question bg-white p-3 border-bottom " style="height:80px; ">
                   <div class="d-flex flex-row justify-content-between align-items-center mcq">
					      <?php
							$res1=mysqli_query($conn, "select * FROM class_exam LEFT JOIN exam on class_exam.exam_id = exam.exam_id where exam.exam_id = '$_SESSION[exam_category]'");
							while($row1=mysqli_fetch_array($res1))
							{
						   ?>
						   <h4>exam title: <?php echo $row1['exam_title']; ?></h4>
						   <?php } ?>
						<h4 class="text-danger float-end" id="countdowntimer"></h4>
                    </div>
					 <div class="float-end" style="font_style:15px;">
					<div id="current_que" class=" fw-bolder" style="float:left;">0</div> 
					<div class = "fw-bolder" style="float:left;">&nbsp;of&nbsp;</div> 
					<div class=" fw-bolder "id="total_que" style="float:left;"> 0</div>
                </div> </div>
                <div class="question bg-white border-bottom "id="load_questions">
                </div>
				 <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
				<button class="btn btn-primary d-flex align-items-center btn-danger btn-lg" type="button" value="Previous" onclick="load_previous();"><i class="fa fa-angle-left mt-1 mr-1"></i>&nbsp;previous</button>
				<button class="btn btn-primary border-success align-items-center btn-success btn-lg" type="button"value="Next" onclick="load_next();">Next<i class="fa fa-angle-right ml-2"></i></button>
				
				</div>
                  </div>
        </div>
    </div>
</div>

	<script type="text/javascript">

setInterval(function(){
        timer();
    },1000);
    function timer()
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if(xmlhttp.readyState==4 && xmlhttp.status==200)
            {
               if(xmlhttp.responseText=="00:00:00")
               {
                   window.location="result_exam.php";
                  
               }
			    document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","ajax/load_timer_exam.php",true);
        xmlhttp.send(null);  
        }
	function load_total_que()
	{
	  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if(xmlhttp.readyState==4 && xmlhttp.status==200)
            {
			    document.getElementById("total_que").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","ajax/load_total_que_exam.php",true);
        xmlhttp.send(null);	
	}
	
	var questionno="1";
	load_questions(questionno);
	function load_questions(questionno)
	{
		document.getElementById("current_que").innerHTML=questionno;
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            if(xmlhttp.responseText=="over")
            {
			if (confirm("Do you really want to end this exam?")) {
				window.location="result_exam.php";
			}
            }else{
				 document.getElementById("load_questions").innerHTML=xmlhttp.responseText;
				 load_total_que();
			}
		}
       };
        xmlhttp.open("GET","ajax/load_questions_exam.php?questionno="+ questionno,true);
        xmlhttp.send(null);		
	}
	function radioclick(radiovalue, questionno)
	{		 	
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){ 
			
		}
       };
        xmlhttp.open("GET","ajax/save_ans_in_session_exam.php?questionno="+ questionno +"&value1="+radiovalue,true);
        xmlhttp.send(null);		
	}
	
	function load_previous()
	{
		if (questionno=="1")
		{
			load_questions(questionno);
			
		}else{
			questionno= eval(questionno)-1;
			load_questions(questionno);
		}
	}
	function load_next()
	{
			questionno= eval(questionno)+1;
			load_questions(questionno);
	}
	</script>