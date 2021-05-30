<?php

class Controller_results extends Controller{

  public function action_results(){
    $m=Model::getModel();
    if(isset($_POST["city"])) {
        $results = $m->doRequest($_POST["city"]);
    }else{
        $results = $m->doRequestDefault();
    }
    $tab=['results'=>$results, 'bd'=>$m, 'city'=>$_POST["city"]];
    $this->render('results',$tab);
  }

  public function action_default(){
    $this->action_results();
  }


}

?>