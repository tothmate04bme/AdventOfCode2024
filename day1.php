<?php

    declare(strict_types=1);

    main();

    function bubble_sort(array $input) : array {
        $inputlist = $input;

        for($i = 0; $i < sizeof($inputlist); $i++){
            for($j = 0; $j < sizeof($inputlist) - 1; $j++){
                if($inputlist[$j] > $inputlist[$j + 1]){
                    $tmp = $inputlist[$j];
                    $inputlist[$j] = $inputlist[$j + 1];
                    $inputlist[$j + 1] = $tmp;
                }
            }
        }

        return (array) $inputlist;
    }

    function myabs(int $num): int{
        if($num >= 0) return $num;
        else return -$num;
    }

    function calculate_distance(array $list1, array $list2){
        if(sizeof($list1) != sizeof($list2)) {
            echo('invlid lists');
            echo("\n");
            return (int) -1;
        }

        $sum = 0;

        for($i = 0; $i < sizeof($list1); $i++){
            $sum += myabs($list1[$i] - $list2[$i]);
        }

        return (int) $sum;        
    }

    function count_in_array(int $num, array $list) : int {
        $count = 0;
        for($i = 0; $i < sizeof($list); $i++){
            if($num == $list[$i]) $count++;
        }

        return (int) $count;
    }

    function calculate_similarity_score(array $list1, array $list2) : int {
        if(sizeof($list1) != sizeof($list2)) return -1;

        $sum = 0;

        for($i = 0; $i < sizeof($list1); $i++){
            $sum += $list1[$i] * count_in_array($list1[$i], $list2);
        }

        return (int) $sum;
    }

    function read_list_1() : array {

        $list1 = array();
        $list2 = array();
        $input = file("input1.txt");
        $a = 0;
        $b = 0;

        for($i = 0; $i < sizeof($input); $i++){
            sscanf($input[$i], "%d   %d", $a, $b);
            array_push($list1, $a);
            array_push($list2, $b);
        }

        return $list1;
    }

    function read_list_2() : array {

        $list1 = array();
        $list2 = array();
        $input = file("input1.txt");
        $a = 0;
        $b = 0;

        for($i = 0; $i < sizeof($input); $i++){
            sscanf($input[$i], "%d   %d", $a, $b);
            array_push($list1, $a);
            array_push($list2, $b);
        }

        return $list2;
    }

    function main() : int {

        $list1 = read_list_1();
        $list2 = read_list_2();

        $list1 = bubble_sort($list1);
        $list2 = bubble_sort($list2);

        

        $distance = calculate_distance($list1, $list2);
        

        print("Distance: " . $distance);
        print("\n");

        $similarity_score = calculate_similarity_score($list1, $list2);

        print("Similarity score: " . $similarity_score);
        print("\n");

        return (int) 0;
    }

?>
