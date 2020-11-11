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
       //$places = new \App\Models\Places();
        // retrieve all the records
       //$records = $places->findAll();
       
       $table = new \CodeIgniter\View\Table();
       
       $headings = $places->fields;
       $displayHeadings = array_slice($headings, 1, 2);
        $table->setHeading(array_map('ucfirst', $displayHeadings));
       foreach ($records as $record) {
       $table->addRow($record->name,$record->description);
       return $table->generate();
}

      // $parser= \Config\Services::parser();
      // return $parser ->setData(['records' => $records])
        //       ->render('placeslist');
    }
    public function showme($id){
    
        //connect to the model
       // $places= new \App\Models\Places();
        //retrieve all the records
       // $record=$places->find($id);
        //get a template parser
       // $parser= \Config\Services::parser();
        //tell it about the substitions
        //return $parser->setData($record)
                //and have it render the template with those
               // ->render('oneplace');
        
        $nameLink = anchor("travel/showme/$record->id",$record->name);
        $table->addRow($nameLink,$record->description);
        $template = [
        'table_open' => '<table cellpadding="5px">',
        'cell_start' => '<td style="border: 1px solid #dddddd;">',
        'row_alt_start' => '<tr style="background-color:#dddddd">',
        ];
        $table->setTemplate($template);
        
        $fields = [
            'title' => 'Travel Destinations',
             'heading' => 'Travel Destinations',
             'footer' => 'Copyright Xavier'
         ];
        
        return $parser->setData($fields)
                      ->render('templates\top') .
               $table->generate() .
               $parser->setData($fields)
                      ->render('templates\bottom');

    }
}
