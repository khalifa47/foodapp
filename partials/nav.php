<?php
    session_start();

    if (!isset($_SESSION['CREATED'])) {
        $_SESSION['CREATED'] = time();
    } else if (time() - $_SESSION['CREATED'] > 3600) {
        echo "<script>alert('Your session has expired. Please log in again')</script>";
        session_unset();
        session_destroy();
        header("Location: ../views/login.php");
    }

    if(isset($_POST['logout'])){
        echo 
        "<script>
        if(confirm('Are you sure you want to log out?')){";
            session_unset();
            session_destroy();
        echo "}
        document.location = '../views/index.php';
        </script>";
    }

?>
<div>
    <nav>
    <a href='index.php'><img src="https://www.foodgloriousfoodsouth.co.uk/wp-content/uploads/2015/09/fgf-logo.png" alt="logo"></a>

    <ul>
        <?php
        if(!isset($_SESSION['uname'])){
            echo "<li><a href='login.php'>Login</a><span style='color: white;'>/</span><a href='register.php'>Register</a></li>";
        }
        else{
            if($_SESSION['utype'] === 'Client'){
                echo
                "<li>
                <div class='dropdown'>
                    <a class='categ'>Good ";

                    if(localtime()[2]+1 < 12){
                        echo 'morning, ';
                    }
                    else if(localtime()[2]+1 > 19){
                        echo 'evening, ';
                    }
                    else if(localtime()[2]+1 > 12){
                        echo 'afternoon, ';
                    }
                    
                    echo "<span>" . $_SESSION["uname"] . "</span></a>
                
                    <div class='dropdown-content'>
                        <a href='edit-profile.php'>Edit Profile</a>
                        <a href='edit-password.php'>Change Password</a>
                        <a href='location.php'>Change delivery address</a>
                        <a href='give-feedback.php'>Give your feedback</a>
                        <a href='cart.php'>My Cart</a>
                        <a href='orders.php'>My Orders</a>
                        <a href='mailto:support@fgf.com'>Contact Support</a>
                        <form action='../partials/nav.php' method='POST'>
                            <button type='submit' name='logout' class='logout'>Log Out</button>
                        </form>
                    </div>
                </div>
                </li>
                <li><a class='order' href='view-items.php'>Order Food</a></li>";
            }
            else if($_SESSION['utype'] === 'Admin' || $_SESSION['utype'] === 'SuperAdmin'){
                echo
                "<li>
                    <div class='dropdown'>
                    <a class='categ'>Good ";

                    if(localtime()[2] < 12){
                        echo 'morning, ';
                    }
                    else if(localtime()[2] > 19){
                        echo 'evening, ';
                    }
                    else if(localtime()[2] > 12){
                        echo 'afternoon, ';
                    }
                    
                    echo "<span>" . $_SESSION["uname"] . "</span></a>
                
                    <div class='dropdown-content'>
                        <a href='edit-profile.php'>Edit Profile</a>
                        <a href='edit-password.php'>Change Password</a>
                        <a href='give-feedback.php'>Give your feedback</a>
                        <a href='mailto:support@fgf.com'>Contact Support</a>
                        <a href='admin-add-items.php'>Add items</a>
                        <a href='admin-add-users.php'>Add users</a>
                        <a href='admin-view-users.php'>View Users</a>
                        <a href='admin-view-feedback.php'>View Feedback</a>
                        <form action='../partials/nav.php' method='POST'>
                            <button type='submit' name='logout' class='logout'>Log Out</button>
                        </form>
                    </div>
                </div>
                </li>
                <li><a class='order' href='view-items.php'>View Items</a></li>";
            }
            else if($_SESSION['utype'] === 'Delivery'){
                echo
                "<li>
                    <div class='dropdown'>
                        <a class='categ'>Good ";

                        if(localtime()[2] < 12){
                            echo 'morning, ';
                        }
                        else if(localtime()[2] > 19){
                            echo 'evening, ';
                        }
                        else if(localtime()[2] > 12){
                            echo 'afternoon, ';
                        }
                        
                        echo "<span>" . $_SESSION["uname"] . "</span></a>
                    
                        <div class='dropdown-content'>
                            <a href='edit-profile.php'>Edit Profile</a>
                            <a href='edit-password.php'>Change Password</a>
                            <a href='give-feedback.php'>Give your feedback</a>
                            <a href='mailto:support@fgf.com'>Contact Support</a>
                            <a href='delivery-fulfilment.php'>Delivery Page</a>
                            <form action='../partials/nav.php' method='POST'>
                                <button type='submit' name='logout' class='logout'>Log Out</button>
                            </form>
                        </div>
                    </div>
                </li>";
            }
        }
        ?>
    </ul>
    </nav>
</div>