<?php

 interface ITelasContrato{
    public function ListarTelas($db);
    public function BuscarId($tela,$db);
    public function BuscarTela($id,$db);
 }
?>