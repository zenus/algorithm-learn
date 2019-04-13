<?php

/**
     * @param $weight
     * @param $list
     * @return array|int
     */
    function bagI($weight, $list)
    {
        $count = count($list);
        if ($count < 0 and $weight < 0) {
            return 0;
        }
        $dp = [];
        for ($i = 0; $i <= $weight; $i++) {
            $dp[$i] = 0;
        }
        for ($i = 0; $i < $count; $i++) {
            for ($j = $weight; $j >= $list[$i]; $j--) {
                $dp[$j] = max($dp[$j], $dp[$j - $list[$i]] + $list[$i]);
            }
        }
        var_dump($dp);
        return $dp;
    }

    /**
     * @param $total
     * @param $weights
     * @param $rewards
     * @return array|int
     */
    function bagII($total, $weights,$rewards)
    {
        //bagII(10,[1,2,3,4,5,6,7,8],[1,1,3,3,5,5,8,8]);
        $count = count($weights);
        if ($count < 0 and $total < 0) {
            return 0;
        }
        $dp = [];
        for($j = 1; $j <= $total; $j++)
        {
            if($j / $weights[0] >= 1)
            {
                $dp[0][$j] = intval($j / $weights[0]) * $rewards[0];
            }else{
                $dp[0][$j] = -1;
            }
        }
        for ($i = 1; $i < $count; $i++) {
            for ($j = 1; $j <= $total; $j++) {
                if($j / $weights[$i] >= 1)
                {
                    $temp = 0;
                    for($k=1; $k<=intval($j / $weights[$i]); $k++)
                    {
                        $temp = max($temp, $dp[$i-1][$j - $k * $weights[$i]] + $k * $rewards[$i]);
                    }
                    $dp[$i][$j] = max($dp[$i-1][$j],$temp);
                }else{
                   $dp[$i][$j] = $dp[$i-1][$j];
                }
            }
        }
        return $dp;
    }

    function bagII2($total, $weights,$rewards)
    {
        //bagII(10,[1,2,3,4,5,6,7,8],[1,1,3,3,5,5,8,8]);
        $count = count($weights);
        if ($count < 0 and $total < 0) {
            return 0;
        }
        $dp = [];
        for($j = 1; $j <= $total; $j++)
        {
            if($j / $weights[0] >= 1)
            {
                $dp[$j] = intval($j / $weights[0]) * $rewards[0];
            }else{
                $dp[$j] = -1;
            }
        }

        for ($i = 1; $i < $count; $i++) {
            for ($j = $weights[$i]; $j <= $total; $j++) {
                $dp[$j] = max($dp[$j], $dp[$j - $weights[$i]] + $rewards[$i]);
            }
        }
        var_dump($dp);
        return $dp;
    }

   public function coins()
    {
        //硬币问题总兑换方法
        $N = 10000;
        $items = [1,2,3];
        for($j=1; $j<=$N; $j++)
        {
            $dp[0][$j] = 1;
        }
        //如果n=0;不放任何硬币是一种方法
        for($i=0; $i< count($items); $i++)
        {
            $dp[$i][0] = 1;
        }
        for($i=1; $i<count($items); $i++)
        {
            for($j=1; $j<=$N; $j++)
            {
                if($j / $items[$i] >=1)
                {
                    $sum = $dp[$i-1][$j];
                    $num = floor($j / $items[$i]);
                    for($k=1; $k<=$num; $k++)
                    {
                        $sum += $dp[$i-1][$j - $k * $items[$i]];
                    }
                    $dp[$i][$j] = $sum;
                }else{
                   $dp[$i][$j] = $dp[$i-1][$j];
                }
            }
        }
    }


    /**
     * @param $total
     * @param $weights
     * @param $rewards
     * @return array|int
     */
    function bagIII($total, $weights,$rewards,$weightCounts)
    {
        //bagII(10,[1,2,3,4,5,6,7,8],[1,1,3,3,5,5,8,8]);
        $count = count($weights);
        if ($count < 0 and $total < 0) {
            return 0;
        }
        $dp = [];
        for($j = 1; $j <= $total; $j++)
        {
            if($j / $weights[0] >= 1)
            {
                $dp[0][$j] = min(intval($j / $weights[0]),$weightCounts[0]) * $rewards[0];
            }else{
                $dp[0][$j] = -1;
            }
        }
        for ($i = 1; $i < $count; $i++) {
            for ($j = 1; $j <= $total; $j++) {
                if($j / $weights[$i] >= 1)
                {
                    $temp = 0;
                    for($k=1; $k<=min(intval($j / $weights[$i]), $weightCounts[$i]); $k++)
                    {
                        $temp = max($temp, $dp[$i-1][$j - $k * $weights[$i]] + $k * $rewards[$i]);
                    }
                    $dp[$i][$j] = max($dp[$i-1][$j],$temp);
                }else{
                    $dp[$i][$j] = $dp[$i-1][$j];
                }
            }
        }
        return $dp;
    }

   /**
     * @desc 回文处理
     * @param $backWords
     */
    public function getBackWordString($backWords)
    {
        $maxStr = '';
        $dp = [];
        $len = strlen($backWords);
        for($i=0; $i<$len ; $i++)
        {
            $dp[$i][$i] = 1;
            if(isset($backWords[$i]) and isset($backWords[$i+1]) and $backWords[$i] == $backWords[$i+1])
            {
                $dp[$i][$i+1] = 1;
            }
        }
        for($i=0; $i<$len; $i++)
        {
           for($j=0; $j < $i; $j++)
           {
               if(isset($dp[$j+1][$i-1]) and $dp[$j+1][$i-1] ==1 and $backWords[$j] == $backWords[$i])
               {
                   $dp[$j][$i] = 1;
                   if(($i-$j) > strlen($maxStr))
                   {
                       $maxStr = substr($backWords,$j,$i-$j + 1);
                   }
               }else{
                  $dp[$j][$i] = 0;
               }
           }
        }
    }

     public function maxSumSubArray()
    {
        $arrs = [-2,1,-3,4,-1,2,1,-5,4];
        /***
        Given an integer array nums, find the contiguous subarray (containing at least one number) which has the largest sum and return its sum.
        Example:
        Input: [-2,1,-3,4,-1,2,1,-5,4],
        Output: 6
        Explanation: [4,-1,2,1] has the largest sum = 6.
         */
        $dp[0] = $arrs[0];
        for($i=1; $i < count($arrs); $i++)
        {
            $dp[$i] = max($arr[0],$dp[$i-1] + $arr[0]);
        }
    }
    ?>
