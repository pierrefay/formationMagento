<?php

class Itelios_Store_Model_Customer extends Mage_Customer_Model_Customer
{

    protected function _beforeSave()
    {
       die('test');
    }
}