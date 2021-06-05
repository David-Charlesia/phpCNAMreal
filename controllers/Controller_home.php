<?php

class Controller_home extends Controller{

  private $tab = ["pageName"=>"Accueil"];

  public function action_home(){
    $this->render('home', $this->tab);
  }

  public function action_default(){
    $this->action_home();
  }


}

?>