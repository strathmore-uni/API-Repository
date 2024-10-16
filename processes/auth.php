<?php
class auth{
    public function signup($conn, $ObjGlob){
        if(isset($_POST["signup"])){
            $errors = array();

            $fullname = $_SESSION["fullname"] = $conn->escape_values(ucwords(strtolower($_POST["fullname"])));
            $email_address = $_SESSION["email_address"] = $conn->escape_values(strtolower($_POST["email_address"]));
            $username = $_SESSION["username"] = $conn->escape_values(strtolower($_POST["username"]));
            $password = $_POST["password"];
            $repeat_password = $_POST["repeat_password"];

            // Implement input validation and error handling
            // =============================================
            // Sanitize all inputs

            // verify that the fullname has only letters, space, dash, quotation
            if(ctype_alpha(str_replace(" ", "", str_replace("\'", "", $fullname))) === FALSE){
                $errors['nameLetters_err'] = "Invalid name format: Full name must contain letters and spaces only etc " . $fullname;
            }

            // verify that the email has got the correct format
            if(!filter_var($email_address, FILTER_VALIDATE_EMAIL)){
                $errors['email_format_err'] = 'Wrong email format';
            }

            // verify that the email domain is authorized (@strathmore.edu, @gmail.com, @yahoo.com, @mada.co.ke) and not (@yanky.net)
            $conf['valid_domains'] = ["strathmore.edu", "gmail.com", "yahoo.com", "mada.co.ke", "outlook.com", "STRATHMORE.EDU", "GMAIL.COM", "YAHOO.COM", "MADA.CO.KE", "OUTLOOK.COM"];

            $arr_email_address = explode("@", $email_address);
            $spot_dom = end($arr_email_address);
            $spot_user = reset($arr_email_address);

            if(!in_array($spot_dom, $conf['valid_domains'])){
                $errors['mailDomain_err'] = "Invalid email address domain. Use only: " . implode(", ", $conf['valid_domains']);
            }
            $exist_count = 0;
            // Verify Email Already Exists
            $spot_email_address_res = $conn->count_results(sprintf("SELECT email FROM users WHERE email = '%s' LIMIT 1", $email_address));
            if ($spot_email_address_res > $exist_count){
                $errors['mailExists_err'] = "Email Already Exists";
            }

            // Verify Username Already Exists
            $spot_username_res = $conn->count_results(sprintf("SELECT username FROM users WHERE username = '%s' LIMIT 1", $username));
            if ($spot_username_res > $exist_count){
                $errors['usernameExists_err'] = "Username Already Exists";
            }

            // Verify if username contain letters only
            if (!ctype_alpha($username)) {
                $errors['usernameLetters_err'] = "Invalid username format. Username must contain letters only";
                $ObjGlob->setMsg('errors', $errors, 'invalid');
            }

            // Password validation
            if (strlen($password) < 8) {
                $errors['password_length_err'] = "Password must be at least 8 characters long";
            }
            if (!preg_match("/[a-z]/", $password)) {
                $errors['password_lowercase_err'] = "Password must contain at least one lowercase letter";
            }
            if (!preg_match("/[A-Z]/", $password)) {
                $errors['password_uppercase_err'] = "Password must contain at least one uppercase letter";
            }
            if (!preg_match("/[0-9]/", $password)) {
                $errors['password_number_err'] = "Password must contain at least one number";
            }
            if (!preg_match("/[!@#$%^&*()_+=-{};:'<>,./?]/", $password)) {
                $errors['password_special_char_err'] = "Password must contain at least one special character";
            }
            if ($password !== $repeat_password) {
                $errors['password_match_err'] = "Passwords do not match";
            }

            // Implement 2FA (email => PHP-Mailer)
            // ===================================
            // Send email verification with an OTP (OTC)

            if(!count($errors)){
                $cols = ['fullname', 'email', 'username', 'password'];
                $vals = [$fullname, $email_address, $username, password_hash($password, PASSWORD_DEFAULT)];
                $data = array_combine($cols, $vals);
                $insert = $conn->insert('users', $data);
                if($insert === TRUE){
                    header('Location: signup.php');
                    unset($_SESSION["fullname"], $_SESSION["email_address"], $_SESSION["username"]);
                    exit();
                }else{
                    die($insert);
                }
            }else{
                $ObjGlob->setMsg('msg' , 'Error(s)', 'invalid');
                $ObjGlob->setMsg('errors', $errors, 'invalid');
            }
        }
    }



            }