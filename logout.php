&lt;<?php
session_start();
if(session_destroy())
{
	echo" <script type='text/javascript'>prompt('You want to Logout Your ID')</script>";
header("Location: login.html");
}
?>&gt;
