<?php

class ParserTest extends PHPUnit_Framework_TestCase {

  public function testMultipleParamsReturnedInFlatArray(){

    $docComments = ['/**
        * Set a parameter
        *
        * @return bool True = the parameter has been set, false = the parameter was invalid
        */',
                    '/**
        * Set a parameter
        *
        * @param string $param The parameter name to store
        * @param string $value The value to set
        * @param string $dummyOne a dummy value to test
        * @return bool True = the parameter has been set, false = the parameter was invalid
        */',
                    '/**
        * Set a parameter
        *
        * @param string $param The parameter name to store
        * @param string $value The value to set
        * @return bool True = the parameter has been set, false = the parameter was invalid
        */',
                    '/**
        * Set a parameter
        *
        * @param string $param The parameter name to store
        * @return bool True = the parameter has been set, false = the parameter was invalid
        */'];

    $output = [["access"=>'',
                "author"=>'',
                "copyright" =>'',
                "deprecated"=>'',
                "example"=>'',
                "ignore"=>'',
                "internal"=>'',
                "link"=>'',
                "param"=>'',
                "return"=>'(bool)True = the parameter has been set, false = the parameter was invalid',
                "see"=>'',
                "since"=>'',
                "tutorial"=>'',
                "version"=> ''],
               ["access"=>'',
                "author"=>'',
                "copyright" =>'',
                "deprecated"=>'',
                "example"=>'',
                "ignore"=>'',
                "internal"=>'',
                "link"=>'',
                "param"=>['(string)$param The parameter name to store',
                          '(string)$value The value to set',
                          '(string)$dummyOne a dummy value to test'],
                "return"=>'(bool)True = the parameter has been set, false = the parameter was invalid',
                "see"=>'',
                "since"=>'',
                "tutorial"=>'',
                "version"=> ''],
               ["access"=>'',
                "author"=>'',
                "copyright" =>'',
                "deprecated"=>'',
                "example"=>'',
                "ignore"=>'',
                "internal"=>'',
                "link"=>'',
                "param"=>['(string)$param The parameter name to store',
                          '(string)$value The value to set'],
                "return"=>'(bool)True = the parameter has been set, false = the parameter was invalid',
                "see"=>'',
                "since"=>'',
                "tutorial"=>'',
                "version"=> ''],
               ["access"=>'',
                "author"=>'',
                "copyright" =>'',
                "deprecated"=>'',
                "example"=>'',
                "ignore"=>'',
                "internal"=>'',
                "link"=>'',
                "param"=>'(string)$param The parameter name to store',
                "return"=>'(bool)True = the parameter has been set, false = the parameter was invalid',
                "see"=>'',
                "since"=>'',
                "tutorial"=>'',
                "version"=> '']];

    for($i = 0; $i<count($docComments); $i++){
      $parser = new parser($docComments[$i]);
      $parser->parse();
      $this->assertEquals($output[$i],$parser->getParams());
    }
  }

}