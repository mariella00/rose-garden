<nav> 
    <div class="navigation">
        <a href="#" class="logo"><img src="../img/logo.png"></a>
            <div class="toggle"></div>
                <ul class="menu">
                    <li><a href="../users/home.php">Home</a></li>
                    <li><a href="../users/us-plants.php">Plants</a></li>
                    <li><a href="../users/us-pots.php">Pots</a></li>
                    <li><a href="../users/us-soil.php">Soil</a></li>  
                </ul>
            
                <div class="cart">
                    <a href="../users/cart.php"><i class="fas fa-shopping-cart"><span class="num-cart-product">
                    <?php
                    include 'config.php';
                    
                    $userid = $_SESSION['id'];
                    $cartcount= mysqli_query($conn , "SELECT * FROM `cart` WHERE user_id ='$userid'");
                    $num_rows = mysqli_num_rows($cartcount);
                    echo $num_rows;
                    ?></span></i></a>
                </div>

                <div class="search-box">
                    <input class="search-txt" type="text" name="" placeholder="Type to search">
                    <a class="search-btn" href="#">
                    <i class="fas fa-search" ></i></a>
                </div>
            
                <div class="right">
                    <ul>
                    <li>
                    <a href="#" class="user"><i class="far fa-user"></i></a>
                        <div class="dropdown">
                            <ul>
                            <li><a href="../users/edit-profile.php"><i class="fas fa-user"></i> Profile</a></li>
                            <li><a href="../users/orders.php"><i class="fas fa-shopping-bag"></i> Orders</a></li>
                            <li><a href="#" id="logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                    </ul>
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