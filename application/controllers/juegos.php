
<?php

class juegos extends Controller {

    function __construct() {

        $this->data['controller'] = strtolower(get_class($this));
    }

    function load_list() {

        $_info_juegos = $this->loadModel('juegos_model');
        $_items_juegos = $_info_juegos->get();



        $template = $this->loadView($this->data['controller'] . '/load_list');
        $template->set('controlador', $this->data['controller']);
        $template->set('items_juegos', $_items_juegos);


        $template->render();
    }

  

    function load_add() {



        $template = $this->loadView($this->data['controller'] . '/load_add');
        $template->set('controlador', $this->data['controller']);
  
       
        $template->render();
    }


    


    function add_juegos(){

        //$_post = $_POST['name'];
    $_post =  $_POST;
    
 
        $_result = $this->loadModel('juegos_model');
        $_item = $_result->add($_post);
     
       
        if ($_item) {


            echo'<script language="javascript">window.location="http://localhost/mvcone/juegos/load_list";</script>';
        }else
            echo "Errrrror";

    }

    


    function _build_select_options($_data = array(), $_value_key, $_name_key, $_selected = FALSE) {


        if (empty($_value_key))
            return '';

        if (empty($_name_key))
            return '';


        $_html = '<option value="">-- Seleccione --</option>';


        $_count_data = count($_data);
        for ($_i = 0; $_i < $_count_data; $_i++) {
            $_data_item = $_data[$_i];


            $_selected_value = '';
            if ($_selected) {
                if ($_selected == $_data_item->$_value_key)
                    $_selected_value = 'selected=""';
            }


            $_html .= '<option ' . $_selected_value . ' value="' . $_data_item->$_value_key . '">' . $_data_item->$_name_key . '</option>';
        }


        return $_html;
    }


  

}
?>

