<?php
session_start();
include("connectionn.php");
	include("function.php");
	


	if(!isset($_SESSION['user_id']))
	{
		echo "<script>
                alert('login first');	
                window.location.href='login.php';
                </script>";
	}
	

else{
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['Add']))
    {
        if(isset($_SESSION['cart']))
        {
            $mymobile=array_column($_SESSION['cart'],'Item_Name');//if item is added aldready
            if(in_array($_POST['Item_Name'],$mymobile))
            {
                echo "<script>
                alert('Item Already Added');	
                window.location.href='mycart.php';
                </script>";
            }
            else
            {
                $count=count($_SESSION['cart']);
                $_SESSION['cart'][$count]=array('Item_Name'=>$_POST['Item_Name'],'Price'=>$_POST['Price'],'Quantity'=>$_POST['Quantity']);
                echo "<script>
                    alert('Item Added');
                    window.location.href='mycart.php';
                    </script>";
            }
        }
        else
        {
            $_SESSION['cart'][0]=array('Item_Name'=>$_POST['Item_Name'],'Price'=>$_POST['Price'],'Quantity'=>$_POST['Quantity']);
            echo "<script>
                alert('Item Added');
                window.location.href='mycart.php';
                </script>";
        }
    }//removing items from cart
    if(isset($_POST['Remove']))
    {
        foreach($_SESSION['cart'] as $k => $value)
        {
            if ($value['Item_Name']==$_POST['Item_Name'])
            {
                unset($_SESSION['cart'][$k]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo "<script>
                
                window.location.href='mycart.php';
                </script>";
            }
        }
    }
}
}
?>