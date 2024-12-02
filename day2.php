<?php
  
  declare(strict_types=1);

  main();

  function read_input() : array {
    return file("input2.txt");
  }

  function string_to_array(string $input) : array {
    $array = array_map('intval', explode(' ', $input));
    return $array;
  }

  function check_if_increasing(array $input) : bool {

    for($i = 0; $i < sizeof($input)-1; $i++){
        if($input[$i] >= $input[$i+1]){
          return false;
        }
    }

    return true;

  }

  function check_if_decreasing(array $input) : bool {

    for($i = 0; $i < sizeof($input)-1; $i++){
      if($input[$i] <= $input[$i+1]){
        return false;
      }
    }

    return true;

  }

  function check_the_levels(array $input) : bool {

    for($i = 0; $i < sizeof($input)-1; $i++){
      if(abs($input[$i] - $input[$i + 1]) > 3 ||
         abs($input[$i] - $input[$i + 1]) < 1
      ){
        return false;
      }
    }

    return true;
  }

  function check_if_safe() : int {
    $sum = 0;
    $input = read_input();

    for($i = 0; $i < sizeof($input); $i++){
      $intarray = string_to_array($input[$i]);

      if(
      (check_if_increasing($intarray) ||
      check_if_decreasing($intarray)) &&
      check_the_levels($intarray)
      ){
        $sum++;
      }
    }

    return $sum;

  }

  function check_if_safe_dampener() : int {
    $sum = 0;
    $input = read_input();

    for($i = 0; $i < sizeof($input); $i++){
      $intarray = string_to_array($input[$i]);

      if(
        (check_if_increasing($intarray) ||
        check_if_decreasing($intarray)) &&
        check_the_levels($intarray)
      ){
        $sum++;
      }
      else {
        for($j = 0; $j < sizeof($intarray); $j++){
          $splicedarray = $intarray;
          array_splice($splicedarray, $j, 1);
          if(
            (check_if_increasing($splicedarray) ||
            check_if_decreasing($splicedarray)) &&
            check_the_levels($splicedarray)
          ){
            $sum++;
            break;
          }
        }

        print("\n");
      }
    }

    return $sum;

  }

  function main() : int {

    $safe = check_if_safe();
    $dampened = check_if_safe_dampener();

    print("Number of safe inputs: " . $safe . "\n");
    print("Number of safe dampened inputs: " . $dampened . "\n");
    
    return 0;
  }

?>
