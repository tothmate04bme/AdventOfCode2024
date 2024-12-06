<?php
    declare(strict_types=1);

    main();

    function read_table() : array {
        $output = file("input4.txt");

        for($i = 0; $i < sizeof($output); $i++){
            $output[$i] = str_split($output[$i]);
        }

        return $output;
    }

    function access_map(array& $map, int $x, int $y) : string {
        if($x > sizeof($map[0]) || $y > sizeof($map)){
            return "N";
        }

        if($x < 0 || $y < 0){
            return "N";
        }

        $ret = $map[$y][$x];

        if($ret != null) return $ret;
        return "N";
    }

    function check_for_xmas(array& $map) : int {
        $output = 0;

        for($x = 0; $x < sizeof($map[0]); $x++)
            for($y = 0; $y < sizeof($map); $y++){
                if(access_map($map, $x, $y) == "X"){
                    //direction 1
                    if(access_map($map, $x+1, $y) == "M"
                    && access_map($map, $x+2, $y) == "A"
                    && access_map($map, $x+3, $y) == "S"){
                        $output++;
                    }
                    
                    //direction 2
                    if(access_map($map, $x-1, $y) == "M"
                    && access_map($map, $x-2, $y) == "A"
                    && access_map($map, $x-3, $y) == "S"){
                        $output++;
                    }

                    //direction 3
                    if(access_map($map, $x, $y + 1) == "M"
                    && access_map($map, $x, $y + 2) == "A"
                    && access_map($map, $x, $y + 3) == "S"){
                        $output++;
                    }

                    //direction 4
                    if(access_map($map, $x, $y - 1) == "M"
                    && access_map($map, $x, $y - 2) == "A"
                    && access_map($map, $x, $y - 3) == "S"){
                        $output++;
                    }

                    //direction 5
                    if(access_map($map, $x + 1, $y + 1) == "M"
                    && access_map($map, $x + 2, $y + 2) == "A"
                    && access_map($map, $x + 3, $y + 3) == "S"){
                        $output++;
                    }

                    //direction 6
                    if(access_map($map, $x - 1, $y - 1) == "M"
                    && access_map($map, $x - 2, $y - 2) == "A"
                    && access_map($map, $x - 3, $y - 3) == "S"){
                        $output++;
                    }

                    //direction 7
                    if(access_map($map, $x - 1, $y + 1) == "M"
                    && access_map($map, $x - 2, $y + 2) == "A"
                    && access_map($map, $x - 3, $y + 3) == "S"){
                        $output++;
                    }

                    //direction 8
                    if(access_map($map, $x + 1, $y - 1) == "M"
                    && access_map($map, $x + 2, $y - 2) == "A"
                    && access_map($map, $x + 3, $y - 3) == "S"){
                        $output++;
                    }
                        
                }
            }

        return $output;
    }

    function check_for_x_shape(array& $map) : int {
        $output = 0;

        for($x = 0; $x < sizeof($map[0]); $x++)
            for($y = 0; $y < sizeof($map); $y++){
                if(access_map($map, $x, $y) == "A"){
                    //case 1:
                    if(
                        access_map($map, $x - 1, $y - 1) == "M" &&
                        access_map($map, $x + 1, $y - 1) == "S" &&
                        access_map($map, $x - 1, $y + 1) == "M" &&
                        access_map($map, $x + 1, $y + 1) == "S" ){
                            $output++;
                    }
                    
                    //case 2:
                    if(
                        access_map($map, $x - 1, $y - 1) == "M" &&
                        access_map($map, $x + 1, $y - 1) == "M" &&
                        access_map($map, $x - 1, $y + 1) == "S" &&
                        access_map($map, $x + 1, $y + 1) == "S" ){
                            $output++;
                    }

                    //case 3:
                    if(
                        access_map($map, $x - 1, $y - 1) == "S" &&
                        access_map($map, $x + 1, $y - 1) == "S" &&
                        access_map($map, $x - 1, $y + 1) == "M" &&
                        access_map($map, $x + 1, $y + 1) == "M" ){
                            $output++;
                    }

                    //case 4:
                    if(
                        access_map($map, $x - 1, $y - 1) == "S" &&
                        access_map($map, $x + 1, $y - 1) == "M" &&
                        access_map($map, $x - 1, $y + 1) == "S" &&
                        access_map($map, $x + 1, $y + 1) == "M" ){
                            $output++;
                    }
                }
            }

        return $output;
    }

    function main() : int {

        $map = read_table();

        $count_xmas = check_for_xmas($map);

        $count_x_shape = check_for_x_shape($map);

        printf("Xmas: %d\n", $count_xmas);
        printf("Xshape: %d\n", $count_x_shape);

        print("\n");
        return 0;
    }
?>
