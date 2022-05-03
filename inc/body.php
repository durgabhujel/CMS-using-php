<?php
    if(isset($_GET['page']) && !empty($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page="single_page";
    }
    include('pages/'.$page.'.php');
