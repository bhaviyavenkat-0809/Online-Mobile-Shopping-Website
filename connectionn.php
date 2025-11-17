<?php



if(!$con = pg_connect("host=localhost port=5432 dbname=DB1 user=postgres password=bhavi#123"))
{

	die("failed to connect!");
}
?>