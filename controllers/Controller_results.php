<?php

class Controller_results extends Controller{

  private $tab = ["pageName"=>"Résultats"];

  public function action_results(){
    $m=Model::getModel();
    if(isset($_POST["city"])) {
        $results = $m->doRequest($_POST["city"]);
    }else{
        $results = $m->doRequestDefault();
    }
    $this->tab['results']=$results;
    $this->tab['bd']=$m;
    $this->tab['city']=$_POST["city"];

    $this->render('results',$this->tab);
  }

  public function action_default(){
    $this->action_results();
  }


}

?>