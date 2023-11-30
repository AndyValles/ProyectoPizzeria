<?php
    namespace App\Models\Procedure;

    class Validate{

         public function  validateString(string $value,int $cantValue):string{
            $data=$value==null?"":$value;
            return $data;
         }
    }

?>
