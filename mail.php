<?php
    function send_mail()
    {
        $msg = "this is a message \n sample message";
        mail("panthitesh6410@gmail.com", "subject is php mail", $msg);
    }
    send_mail();
?>