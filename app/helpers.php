<?php
use Carbon\Carbon;
if( !function_exists('getPlainRoute')){
    function getPlainRoute()
    {
        $output = request()->route()->getName();
        return $output;
    }
}

if ( !function_exists('changeDateFormate') )
{
    function changeDateFormate($date)
    {
        if(empty($date)){
            return null;
        }

        return date('Y-m-d', strtotime($date));

    }
}

if ( !function_exists('changeDateToReadable') )
{
    function changeDateToReadable($date)
    {
        if(empty($date)){
            return null;
        }

        return Carbon::parse($date)->diffForHumans();
    }
}



