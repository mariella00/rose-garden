<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript">
    /*-----For Search Bar-----------------------------*/
      $(document).on('click','.search',function(){
          $('.search-bar').addClass('search-bar-active')
      });
   
      $(document).on('click','.search-cancel',function(){
          $('.search-bar').removeClass('search-bar-active')
      });
  
       /*--For-make-Menu-responsive------------*/
       $(window).scroll(function(){
          if($(document).scrollTop()>50){
              $('.navigation').addClass('fix-nav');
          }
          else{
              $('.navigation').removeClass('fix-nav');
          }
       });
  
       /*--For-make-Menu-responsive------------*/
    $(document).ready(function(){
          $('.toggle').click(function(){
              $('.toggle').toggleClass('active')
              $('.navigation').toggleClass('active')
          })
      });

      /*--For-the user dropdown------------*/
      var element = document.querySelector(".right ul li");
            element.addEventListener('click', function() {
            this.classList.toggle("active");
    }); 
        
    /*--Fadout messages------------*/
    setTimeout(fade_out, 2000);
    function fade_out() {
    $("#error").fadeOut().empty();
    }
</script>

<!-- ALERT -->
<script src="../js/sweetalert.min.js"></script>
<?php if(isset($_SESSION['status']) && $_SESSION['status'] !=""){ ?>
    <script>
    swal({
        title: "<?php echo $_SESSION['status'];?>",
        icon: "<?php echo $_SESSION['status_code'];?>",
        button: "Okay",
    });
    </script>
<?php unset($_SESSION['status']);}?>
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>