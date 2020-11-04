<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

/**
 * Description of Media
 *
 * @author Admin
 */
class Media extends BaseCollector{
    //put your code here
    public function image($filename){
        readfile(WRITABLE . 'data/' . $filename);
    }
}
