<?php
  
  declare(strict_types=1);
    
  main();

  function read_file() : string {
    return file_get_contents("input3.txt");
  }

  function filter_valid() : array {
    $input = read_file();
    $output = array();
    $pattern = '/mul\([0-9]{1,3},[0-9]{1,3}\)/';

    preg_match_all($pattern, $input, $output);

    return $output;
  }

  function filter_valid_do() : array {
    $input = read_file();
    $output = array();
    $pattern = '/(mul\([0-9]{1,3},[0-9]{1,3}\)|do\(\)|don\'t\(\))/';

    preg_match_all($pattern, $input, $output);

    return $output;
  }

  function calculate_output(array $input) : int {
    $output = 0;
    $a = 0;
    $b = 0;

    for($i = 0; $i < sizeof($input[0]); $i++){
      $instruction = $input[0][$i];
      sscanf($instruction, "mul(%d,%d)", $a, $b);
      //printf("A: %d, B: %d\n", $a, $b);
      $output += ($a * $b);
    }

    return $output;
  }

  function calculate_output_do(array $input) : int {
    $output = 0;
    $a = 0;
    $b = 0;
    $valid = 1;

    for($i = 0; $i < sizeof($input[0]); $i++){
      $instruction = $input[0][$i];

      if($instruction == "do()"){
        $valid = 1;
      }

      else if($instruction == "don't()"){
        $valid = 0;
      }
      else{
        sscanf($instruction, "mul(%d,%d)", $a, $b);
        $output += ($valid * ($a * $b));
      }
    }

    return $output;
  }

  function main() : int {

    $valid_instructions = filter_valid();
    $valid_instructions_do = filter_valid_do();

    $result = calculate_output($valid_instructions);
    $result_do = calculate_output_do($valid_instructions_do);

    printf("The result of the valid instructions: %d\n", $result);
    printf("The result of the valid instructions with dos and donts: %d\n", $result_do);
    
    return 0;
  }
?>
