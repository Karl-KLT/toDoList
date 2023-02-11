<?php

use Carbon\Carbon;

function diffForHumans($date){
    return Carbon::make($date)->diffForHumans(null,null,true,1,null);
}
