<?php
class utils
{
	public function getRandom()
	{
		$an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	    $su = strlen($an) - 1;
	    return substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1);
	}
	
	public function insertComma($amount)
	{
		$amount = explode('.',$amount);
		$beforeDecimal = $amount[0];
		$afterDecimal = "";
		
		if (count($amount) > 1)
			$afterDecimal = ".".$amount[1];
		
		$len = strlen($beforeDecimal);
		
		if ($len > 3) 
		{
			// Insert a comma at 3rd position from end of the string
			$pos = $len - 3;
			$beforeDecimal = substr_replace($beforeDecimal, ",", $pos, $len). substr($beforeDecimal, $pos);
 
			$pos -= 2;
			while ($pos >= 1) 
			{
				$len = strlen($beforeDecimal);
				$beforeDecimal = substr_replace($beforeDecimal, ",", $pos, $len). substr($beforeDecimal, $pos);
				$pos -= 2;
			}
		}
	    
	    return $beforeDecimal.$afterDecimal;
	}
}