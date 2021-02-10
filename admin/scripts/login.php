<?php
    function login($username, $password, $ip)
    {
        $pdo = Database::getInstance()->getConnection();
        ## TODO: Finish the following query to check if the username and password match what's in the DB
        $get_user_query = 'SELECT * FROM tbl_user WHERE user_name = :username AND user_pass=:password';
        $user_set = $pdo->prepare($get_user_query);
        $user_set->execute(
            array(
                ':username'=>$username,
                ':password'=>$password
            )
        );

        if($found_user = $user_set->fetch(PDO::FETCH_ASSOC)) {
            //Found user in the DB, grant access
            $found_user_id = $found_user['user_id'];

            //Write the username and userid into the session
            $_SESSION['user_id'] = $found_user_id;
            $_SESSION['user_name'] = $found_user['user_fname'];

            //Update the user IP to the currently logged in
            $update_user_query = 'UPDATE tbl_user SET user_ip= :user_ip WHERE user_id=:user_id';
            $update_user_set = $pdo->prepare($update_user_query);
            $update_user_set->execute(
                array(
                    ':user_ip'=>$ip,
                    ':user_id'=>$found_user_id
                )
            );

            //Redirect user back to index.php
            redirect_to('index.php');

            return 'We will log you in!';
        } else {
            //invalid statement, reject it!
            return 'Learn how to type, dumbass!';
        }
    }


    function confirm_logged_in()
    {
        if(!isset($_SESSION['user_id'])){
            redirect_to("admin_login.php");
        }
    }

    function logout()
    {
        session_destroy();

        redirect_to('admin_login.php');
    }

