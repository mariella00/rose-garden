<nav> 
    <div class="navigation">
        <a href="#" class="logo"><img src="../img/logo.png"></a>
            <div class="right">
                <a href="#" id="logout"><i class="far fa-user"></i> Logout</a>
            </div> 
    </div>
</nav>
<script src="../js/sweetalert.min.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
            $("#logout").click(function(){

                    swal({title:'Logout', 
                        text:'Are you sure you want to logout?', 
                        icon:'warning', 
                        buttons: true, 
                        dangerMode: true
                    })
                    .then((willOUT) => {
                            if (willOUT) {
                                  window.location.href = '../include/logout.php', {
                                  icon: 'success',
                                }
                              }
                    });

            });
        });
</script>
<?php include 'scripts.php';?>