<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Config;

class AppHelpers{

    /**
     * Betwise And of Days Week
     *
     * @param  array  $days
     * 
     * @return int
     */

    public function encodeBinaryDays(array $days)
    {
        // dd(Config::get("const.binaryDays"));

        $res = 0 ;

        foreach($days as $day){

            $res  +=  (integer) $day;
        }

        return $res;

    }

    
    /**
     * Revert Binary Store Days To Days Of Week
     *
     * @param  array  $days
     * 
     * @return string
     */

    public function decodeBinaryDays(int $binaryValue ,&$finalDays)
    {
    
        $el = 0;

        if($binaryValue > 127)
        {
            return false;
        }

        
        foreach(Config::get("const.binaryDays") as $day=>$value)
        {
            if($binaryValue <= $value){

        
                $index = ($binaryValue < $value) ? $el-1 : $el ;

                $bigsetDay = array_keys(Config::get("const.binaryDays"))[$index];
        
                $finalDays[] = $bigsetDay ;
             

                $binaryValue -=   Config::get("const.binaryDays")[$bigsetDay];

                break;
            
            }

            if($binaryValue > 64){

                $bigsetDay = array_keys(Config::get("const.binaryDays"))[6];
        
                $finalDays[] = $bigsetDay ;
             

                $binaryValue -=   Config::get("const.binaryDays")[$bigsetDay];

                break;
            
            }

            $el++;
        }   

      

        ($binaryValue == 0) ?:  $this->decodeBinaryDays( $binaryValue , $finalDays); 
        
    }

     /**
     * Convert Days Of Week To  Perisan
     *
     * @param  int  $value
     * 
     * @return array
     */

    public function persianDays($value)
    {

        $finalDays = [];

        $persianDaysAll  = Config::get("const.persianDays");

        $this->decodeBinaryDays($value , $finalDays);
      
        foreach($finalDays as $key=>$day)
        {
            $finalDays[$key] =  $persianDaysAll[$day];
        }
    
       
        return $finalDays;
    }



    /**
     * response to json , :))
     *
     * @param  string  $msg
     * 
     * @return response
     */

     public function jsonResponse($msg)
     {
        return response()->json(['msg' => $msg]);
     }


}

