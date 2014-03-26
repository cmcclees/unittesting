<?php
/**
 * Created by PhpStorm.
 * User: cmcclees
 * Date: 3/4/14
 * Time: 6:43 PM
 */

class Input {
    static public function get($key) {
       if($key == 'plan') {
           return "$key, standard";

       } else if (empty($_GET[$key])) {
            return null;
        }

        return $_GET[$key];
    }
} 