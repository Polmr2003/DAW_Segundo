<?php

/**
 * Interface containing all the mandatory methods needed in a Controller object.
 */
interface ControllerInterface
{
    public function processRequest();
    public function add();
    public function modify();
    public function delete();
    public function searchById();
    public function listAll();
}