
<?php 

function username_exists($username){

    global $connection;

    $query = "SELECT username FROM users WHERE username ='$username'";
    $result = mysqli_query($connection,$query);

    if(mysqli_num_rows($result) > 0){

        return true;
    }else{

        return false;
    }
    

}

function IfItIsMethod($mehod=null){

    if($_SERVER['REQUEST_METHOD'] == strtoupper($mehod)){

        return true;
    }

    return false;
}



function isLoggedIn(){

    if(isset($_SESSION['username'])){

        return true;
    }

    return false;
}

function checkIfUserIsLoggedInAndRedirect($redirect_location=null){

    if(isLoggedIn()){

        header("Location: $redirect_location ");
    }
}


function email_exists($email){

    global $connection;

    $query = "SELECT user_email FROM users WHERE user_email = '$email'";
    $result = mysqli_query($connection,$query);

    if(mysqli_num_rows($result) > 0){

        return true;
    }else{

        return false;
    }
}

?> 