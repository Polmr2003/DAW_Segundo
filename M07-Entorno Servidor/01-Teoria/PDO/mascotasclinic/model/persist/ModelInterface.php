<?php

/**
 * Interface containing all the mandatory methods needed in a Model object.
 */
interface ModelInterface
{
    public function add($object);
    public function modify($object);
    public function delete($id);
    public function searchById($id);
    public function listAll();
}