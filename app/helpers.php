<?php
if(!function_exists('get_tags')){
    function get_tags($tags){
        $tagsArr = [];
        if(count($tags) > 0){
            foreach ($tags as $key => $value){
                foreach (explode('#', $value->tags) as $val){
                    if(!empty(trim($val)) && !in_array(trim($val),$tagsArr)){
                        array_push($tagsArr, trim($val));
                    }
                }
            }
        }
        return $tagsArr;
    }
}