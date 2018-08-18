<?php
class Dashboard
{
    public function __construct()
    {

    }

    /**
     * @abstract Loads dashboard html
     */
    public function dashboard()
    {
        session_start();
        if (!empty($_SESSION)) {
            require_once(getcwd().'/views/Dashboard.php');
        } else {
            header("Location: http://localhost/login/login");
        }
    }
}
?>