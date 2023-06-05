<?php

class db{
    public static function getConnection()
    {
        return $conn=new mysqli("localhost","root","","ad");


    }
   
}


class Encrypt
{
    /*
    public static function Encrypt2($word)
    {
       // $MyDictionary=array("a"=>"F","b"=>"X","c"=>"N","t"=>"~");
        $MyDictionary['a']="s";
        $MyDictionary['b']="X";
        $MyDictionary['c']="N";
        $MyDictionary['t']="s";

        $enc="";
        for($i=0;$i<strlen($word);$i++)
        {
            $enc=$enc.$MyDictionary[$word[$i]];
        }
        return $enc;
    }

    */
    public static function Encrypt($word,$key)
    {
        $enc="";
        for($i=0;$i<strlen($word);$i++)
        {
            $enc=$enc.chr((ord($word[$i])+$key));
        }
        
        return $enc;
    }
    public static function Decrypt($word,$key)
    {
        $enc="";
        for($i=0;$i<strlen($word);$i++)
        {
            $enc=$enc.chr((ord($word[$i])-$key));
        }
        return $enc;
       
    }


}



?>