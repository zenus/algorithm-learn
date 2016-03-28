//Given a collection of candidate numbers (C) and a target number (T)
//find all unique combinations in C where the candidate numbers sums to T
//Each number in C may only be used once in the combination

//Note
//. All the numbers (including target) will be positive integers
//. Elements in a combination(a1,a2,...,ak) must be in non-descending order (ie , a1<a2<..<ak)
//. The solution set must not contain duplicate combinations

//For example , given candidate set 10,1,2,7,6,1,5 and target 8

//A solution is :

//[1,7]
//[1,2,5]
//[2,6]

//$c = [10,1,2,7,6,1,5];
$c = [1,1,2,5,6,7,10];
$stack_map = 0;
$hash_map = [];
$used_map = 0;
$t = 8;
for($i=0;isset($c[$i]);$i++){
   if($c[$i] <= $t){
       $v = $c[$i];
       $hash_map[$v] = $v;
   }
}
find($t,$c,$hash_map,$stack_map,$used_map);
function find($t,$c,$hash_map,$stack_map,$used_map){
    $pstack = $stack_map;
    for($i=0;isset($c[$i]);$i++){
        if($stack_map & (1<<($c[$i]-1))){
            continue;
        }else{
            $l = $t - $c[$i];
            $stack_map |= (1<<($c[$i]-1));
            //$used_map |= $stack_map;
        }
        if(isset($hash_map[$l])&&($stack_map & $used_map) != $stack_map){
            $stack_map |= (1<<($hash_map[$l]-1));
            $used_map |= $stack_map;
                print_out($stack_map,$hash_map);
//            }
            if($pstack !=0){
               return;
            }
            $stack_map = $pstack;
        }elseif($l > 0){
            $used_map |= $stack_map;
            find($l,$c,$hash_map,$stack_map,$used_map);
            if($pstack !=0){
                return;
            }
            $stack_map = $pstack;
        }else{
            if($pstack != 0){
                return;
            }
            $stack_map = $pstack;
        }
    }
}


function print_out($n,$hash_map){
    $a = [];
    $i = 0;

    echo "\r\n";
    while($n >= 1){
        $s = $n;
        $n = floor($n/2);
        $a[] = $s%2;
        $rest = $s%2;
        if($rest){
            echo $hash_map[$i+1];
        }
        if($s ==1){
           break;
        }
        $i++;
    }
    echo "\r\n";
}
