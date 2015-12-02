<?php

//Distritos_model

class juegos_model extends Model {

    

    public function add($_post) {
        //profesion
        return $this->Insertar('juegos', $_post);
        
    }

    

   

    public function get($get) {

        return $this->getAll('juegos');
    }

    

}

?>
