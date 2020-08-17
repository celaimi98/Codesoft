<?php
class MapeadorTallas extends MaperadorBase{
     public function __construct(){

     }

    public function mapeadorCODB ($datosCO){
        return $datosCO->toString();  
    }
    public  function mapeadorDBCO ($datosDB){
        $dato=new Tallas($datosDB[0]->Id_Talla,$datosDB[0]->Nombre);
        return $dato;
    }  
    /**
     * adicionar el model
     */
    public  function mapeadorArrayDBCO ($arrayDatosDB){
     
       foreach($arrayDatosDB as $r){
        $tallas[] = new Tallas($r->Id_Talla,$r->Nombre);            
        }
      
        
        return $tallas;

    }
    public  function mapeadorArraryCODB ($ArrayDatosCO){
        return false;

    }

}
?>