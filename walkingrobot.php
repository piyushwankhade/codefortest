<?php
    
	$x = $argv[1];
	$y = $argv[2];
	$facing_direction = $argv[3];
	$walk_string = $argv[4];	
		
	 // $x = 5;
	 // $y = 2;
	 // $facing_direction = SOUTH;
	 // $walk_string = RW2LW4R;

	$arraystring = convertstringtoarray($walk_string);
	
	foreach ($arraystring as $key => $value) {
		if($value == 'R' || $value == 'L'){
			$facing_direction = calculatedirection($value,$facing_direction);
		}
		$substrchar = substr($value,0,1); 
		
		if($substrchar == 'W'){			
			$walkinteger = substr($value,-1);
			
			$data  = calculatewalking($x,$y,$facing_direction,$walkinteger);

			$x = $data[0];
			$y = $data[1];
			$facing_direction = $data[2];

		}

		
	}	

	echo $x; echo "\n"; echo $y;echo "\n";echo $facing_direction; 
	

	function calculatewalking($x,$y,$facing_direction,$walkinteger) {
		$calc_x = '';
		$calc_y = '';
		switch ($facing_direction) {
				case 'NORTH':
					$calc_x = $x;
					$calc_y	= $y + $walkinteger;				
				break;
				case 'EAST':
					$calc_x = $x + $walkinteger;
					$calc_y	= $y;				
				break;
				case 'SOUTH':
					$calc_x = $x;
					$calc_y	= $y - $walkinteger;				
				break;
				case 'WEST':
					$calc_x = $x - $walkinteger;
					$calc_y	= $y;				
				break;
				default:
					$calc_x = $x;
					$calc_y = $y;
				break;
			}
		return [$calc_x,$calc_y,$facing_direction];
	}



	function calculatedirection($value,$facing_direction){
		
		if($value == 'R'){
			switch ($facing_direction) {
				case 'NORTH':
					$facing_direction = 'EAST';
				break;
				case 'EAST':
					$facing_direction = 'SOUTH';
				break;
				case 'SOUTH':
					$facing_direction = 'WEST';
				break;
				case 'WEST':
					$facing_direction = 'NORTH';
				break;
				default:
					$facing_direction;
				break;
			}
		}

		if($value == 'L'){
			switch ($facing_direction) {
				case 'NORTH':
					$facing_direction = 'WEST';
				break;
				case 'EAST':
					$facing_direction = 'NORTH';
				break;
				case 'SOUTH':
					$facing_direction = 'EAST';
				break;
				case 'WEST':
					$facing_direction = 'SOUTH';
				break;
				default:
					$facing_direction;
				break;
			}
		}
		
		return $facing_direction;

	}
	// echo "<pre>";
	// print_r($arraystring);





	function convertstringtoarray($walk_string){
		$arraystring = str_split($walk_string);
		$length = count($arraystring);
		for ($i=0; $i < $length; $i++) { 
			if($arraystring[$i] == 'W'){
				$arraystring[$i] = $arraystring[$i].$arraystring[$i + 1];
				$arraystring[$i + 1] = '';			
			}
		}
		$arraystring = array_filter($arraystring);
		return $arraystring;
	}







echo "\n";


?>
