<?php

namespace App\Traits;

trait arrayTrait
{
    public function removeIdAndTimestampCol($columns){
        foreach($columns as $col){
            if ($col=="id" or $col=="created_at" or $col=="updated_at"){}
            else $new[]=$col;
        }
        return $new;
    }

}