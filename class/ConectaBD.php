<?php
require_once "ConfigBD.php";

class ConectaBD
{
    protected $_db;

    public function __construct()
    {
        $this->_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->_db->connect_errno) {
            echo "Se tienen problemas al realizar la conexion, por favor envie el siguiente mensaje a mesa.tlaxcala@imss.gob.mx : " . $this->_db->connect_errno . " : " . $this->_db->connect_error;
            return;
        } else {
            $this->_db->set_charset(DB_CHARSET);
        }
    }
}