<?php

namespace app\MyLibrary;

use Vinkla\Hashids\Facades\Hashids;

class myFunction  {

    public static function encodeHashId($id)
    {
        if ($id) {
            return Hashids::encode($id);
        } else {
            return null;
        }
    }

    public static function decodeHashId($id)
    {
        if (count(Hashids::decode($id)) == 0) {
            return null;
        }
        return Hashids::decode($id)[0];
    }

}
