<?php

class Controller_map extends Controller{

  private $tab = ["pageName"=>"Carte"];

  public function action_map(){
    $m=Model::getModel();

    $results = $m->doRequestDefault();

    $this->tab['results'] = $results;
    $this->tab['bd']=$m;
    
    $this->render('map',$this->tab);
  }

  public function action_default(){
    $this->action_map();
  }


}

?>