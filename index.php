<?php
	include_once('class_transaction.php');
?>

<html>
    <head>
        <title>Assignment 2</title>
    </head>
    <body style='background-color:gray;'>
	
		<?php
			include('body.php');

			if (!isset($_POST["btnaddTransaction"])) {
				
			} else {
				
				/*print_r('<pre>');	print_r($_POST);*/

				$sType = $_POST['myType'];
				$sItem = $_POST['myItem'];
				$sCategory = $_POST['myCategory'];
				$sAmount = $_POST['myAmount'];
				
				if ($_POST['myType']=="Income") {
					$myTransaction = new IncomeTrans($sType,$sItem,$sCategory,$sAmount);
					if ($myTransaction->checkIncomeCategory()) {
							echo $myTransaction->addTrans();
					} else {
						echo $myTransaction->showFullCategory(). " is NOT a valid category!!! ";
					}
				} else {
					$myTransaction = new ExpenseTrans($sType,$sItem,$sCategory,$sAmount);
					if ($myTransaction->checkExpenseCategory()) {
							echo $myTransaction->addTrans();
					} else {
						echo $myTransaction->showFullCategory(). " is NOT a valid category!!! ";
					}
				}
				echo "<hr>";
				echo $myTransaction->displayTrans();
				
				
			}
		?>
		
    </body>
</html>
