
<?php

Interface IModelRepositorie
{
    public function findAll();
    public function findById($id);
    public function update();
    public function delete();

}