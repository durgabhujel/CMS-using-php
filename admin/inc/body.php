<?php
		if(isset($_GET['page']) && !empty($_GET['page']))
		{
			$page = $_GET['page'];
			if($page=='logout')
			{
				unset($_SESSION['user']);
				header('location:'.SITEURL.'admin/login.php');
				die();
			}
		}
		else
		{
			$page="dashboard";
		}
		include('pages/'.$page.'.php');