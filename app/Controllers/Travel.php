<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

/**
 * Description of Travel
 *
 * @author Admin
 */
class Travel  extends BaseController{
    //put your code here
    public function  index() {
        // connect to the model
       $places = new \App\Models\Places();
        // retrieve all the records
       $records = $places->findAll();
       
       $parser= \Config\Services::parser();
       return $parser ->setData(['records' => $records])
               ->render('placeslist');
    }
    public function showme($id){
    
        //connect to the model
        $places= new \App\Models\Places();
        //retrieve all the records
        $record=$places->find($id);
        //get a template parser
        $parser= \Config\Services::parser();
        //tell it about the substitions
        return $parser->setData($record)
                //and have it render the template with those
                ->render('oneplace');
    }
}
