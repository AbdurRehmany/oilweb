<?php
include "connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST['username'];
    $email = $_POST['useremail'];
    $phone = $_POST['userphone'];
    $subject = $_POST['usersubject'];
    $usermessage = $_POST['usermessage'];
    $Alert = false;
    $checkexist = "SELECT * FROM oiltable WHERE username='$name'";
    $existquery = mysqli_query($conn,$checkexist); 
    $existrow = mysqli_num_rows($existquery);
                    if($existrow>0)
                    {
                        echo '<div class="alert alert-danger alert-dismissible ml-3">
                            <strong>'.$name.'</strong>YOUR MESSAGE HAS ALREADY ADDED.
                        </div>';     
                    }
                    else
                    {
                        if($name !== "")
                        {
                            if($email !== "")
                            {
                                if($phone !== "")
                                {
                                    if($subject !== "")
                                    {
                                        if($usermessage !== "")
                                        {
                                            $sqlfetch = "INSERT INTO oiltable(username,useremail,userphone,usersubject,usermessage,dt) VALUES ('$name','$email','$phone','$subject','$usermessage',current_timestamp())";
                                            $result = mysqli_query($conn,$sqlfetch);
                                            
                                        }
                                        else
                                        {
                                            echo '<div class="alert alert-danger alert-dismissible ml-3">
                                            <strong>'.$name.'</strong> PLEASE INSERT THE MESSAGE FIELD.
                                        </div>';
                                        }
                                    }
                                    else
                                    {
                                        echo '<div class="alert alert-danger alert-dismissible ml-3">
                                        <strong>'.$name.'</strong> PLEASE INSERT THE SUBJECT FIELD.
                                        </div>';
                                    }
                                }
                                else
                                {
                                    echo '<div class="alert alert-danger alert-dismissible ml-3">
                                    <strong>'.$name.'</strong> PLEASE INSERT THE PHONE FIELD.
                                    </div>';
                                }
                            }
                            else
                                {
                                    echo '<div class="alert alert-danger alert-dismissible ml-3">
                                    <strong>'.$name.'</strong> PLEASE INSERT THE EMAIL FIELD.
                                    </div>';
                                } 
                        }
                        else
                        {
                            echo '<div class="alert alert-danger alert-dismissible ml-3">
                            <strong>'.$name.'</strong> PLEASE INSERT THE NAME FIELD.
                            </div>';
                        }  
                    }
                        

}
?>
