<?php
	abstract class Transaction {
		private $item;
		private $category;
		private $amount;
		private $type;
		
		public function __construct ($btype,$bItem,$bCategory,$bAmount) {
			$this->setType($btype);
			$this->setItem($bItem);
			$this->setCategory($bCategory);
			$this->setAmount($bAmount);
		}
		
		//Type Construct
		public function getType() {
			return $this->type;
		}
		public function setType ($aType) {
			$this->type = $aType;
		}
		
		//ITEM Construct
		public function getItem() {
			return $this->item;
		}
		public function setItem ($aItem) {
			$this->item = $aItem;
		}
		
		//Category construct
		public function getCategory() {
			return $this->category;
		}
		public function setCategory ($aCategory) {
			$this->category = $aCategory;
		}
		
		//Amount construct
		public function getAmount() {
			return $this->amount;
		}
		public function setAmount ($aAmount) {
			$this->amount = $aAmount;
		}
		
		public function showFullCategory () {
			$result = "";
			
			if ($this->getCategory()=="01") {
				$result = "PAYCHECK";
			}
			if ($this->getCategory()=="02") {
				$result = "STOCK";
			}
			if ($this->getCategory()=="03") {
				$result = "RENT";
			}
			if ($this->getCategory()=="04") {
				$result = "FOOD";
			}
			if ($this->getCategory()=="05") {
				$result = "GAS";
			}
			return $result;
		}
		
		public function displayTrans() {
			$result ="";
			$result .= "<table border='1'>";
			$result .=  "<tr><th>Inc/Exp</th><th>Item</th><th>Category</th><th>Amount</th></tr>";

			$file = fopen("transfile.txt", "r") or die("Unable to open file!");;
			if ($file) {
				while (($line = fgets($file)) !== false) {
					$line = str_replace("\n", "", $line);
					$line_array = explode("*",$line);
					$result .=  "<tr>";
					$result .=  "<td>".$line_array["0"]."</td>";
					$result .=  "<td>".$line_array["1"]."</td>";
					$result .=  "<td>".$line_array["2"]."</td>";
					$result .=  "<td>".$line_array["3"]."</td>";
					$result .=  "</tr>";
				}

				fclose($file);
			} 
			
			$result .=  "</table>";
			return $result;
		}
		
		public function addTrans() {
			//return $this->getType()."*".$this->getItem()."*".$this->showFullCategory()."*".$this->getAmount()."*";
			$file = 'transfile.txt';
			$current = @file_get_contents($file);
			$current .= $this->getType()."*".$this->getItem()."*".$this->showFullCategory()."*".$this->getAmount()."*\n";
			file_put_contents($file, $current);
			
			//return displayTrans();
		}
	} //end transaction abstract class


	interface incomeCategories {
		const PAYCHECK = "01";
		const STOCK = "02";
		
		public function checkIncomeCategory();
	} //end incomeCategories interface
	
	interface expenseCategories {
		const RENT = "03";
		const FOOD = "04";
		const GAS = "05";
		
		public function checkExpenseCategory();
	} //end expenseCategories interface
	
	class IncomeTrans extends Transaction implements incomeCategories {
		
		public function checkIncomeCategory() {
			if ($this->getCategory()==self::PAYCHECK||$this->getCategory()==self::STOCK) {
				return true;
			} else {
				return false;
			}
		}
		
	}//end IncomeTrans class
	
	class ExpenseTrans extends Transaction implements expenseCategories {
		
		public function checkExpenseCategory() {
			if ($this->getCategory()==self::RENT||$this->getCategory()==self::FOOD||$this->getCategory()==self::GAS) {
				return true;
			} else {
				return false;
			}
		}
		
	}//end ExpenseTrans class
	
?>