  <style>

#form1{
  width:auto;
}
.alert{
  text-align:center;
}

#preview{  
  max-height:220px;
  height:auto;
  width:auto;
  display:block;
  margin-left: auto;
   margin-right: auto;
  padding:5px;
}
#img_container{
  border-radius:5px;
  margin-top:-20px;
  width:auto;  
}

.imgInp{  
  width:150px;
  padding:10px;
  background-color:#d3d3d3;  
}
.loading{
   animation:blinkingText ease 2.5s infinite;
}
@keyframes blinkingText{
    0%{     color: #000;    }     
    50%{   color: #transparent; }
    99%{    color:transparent;  }
    100%{ color:#000; }
}
.custom-file-label{
  cursor:pointer;
}
</style>
  <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-default">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Change Avatar</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container animated bounce">
<form method="post" action="student_avatar.php" enctype="multipart/form-data" id="form1">
    <div class="alert"></div>
    <div id='img_container'><img id="preview" src="../../dist/img/img-avatar.jpg" alt="your image" title=''/></div> 
    <div class="input-group"> 
    <div class="custom-file">
    <input name="image" type="file" id="inputGroupFile01" class="imgInp custom-file-input" aria-describedby="inputGroupFileAddon01" required>
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>

</div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button name="change" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
	  <script>
// Code By Webdevtrick ( https://webdevtrick.com )
$("#inputGroupFile01").change(function(event) {  
  RecurFadeIn();
  readURL(this);    
});
$("#inputGroupFile01").on('click',function(event){
  RecurFadeIn();
});
function readURL(input) {    
  if (input.files && input.files[0]) {   
    var reader = new FileReader();
    var filename = $("#inputGroupFile01").val();
    filename = filename.substring(filename.lastIndexOf('\\')+1);
    reader.onload = function(e) {
      debugger;      
      $('#preview').attr('src', e.target.result);
      $('#preview').hide();
      $('#preview').fadeIn(500);      
      $('.custom-file-label').text(filename);             
    }
    reader.readAsDataURL(input.files[0]);    
  } 
  $(".alert").removeClass("loading").hide();
}
function RecurFadeIn(){ 
  console.log('ran');
  FadeInAlert("Wait for it...");  
}
function FadeInAlert(text){
  $(".alert").show();
  $(".alert").text(text).addClass("loading");  
}
</script>
	  