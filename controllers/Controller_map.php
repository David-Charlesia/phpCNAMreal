<?php

class Controller_map extends Controller{

  public function action_map(){
    $m=Model::getModel();

    $results = $m->doRequestDefault();

    $tab=['results'=>$results,'bd'=>$m];
    
    $this->render('map',$tab);
  }

  public function action_default(){
    $this->action_map();
  }


}

?>