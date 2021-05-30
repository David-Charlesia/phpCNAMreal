<?php

class Controller_sign extends Controller{

  public function action_signin(){
    
    $bd = Model::getModel();

    $connect = $bd->connect($_POST['pseudo'], $_POST['password']);

    if($connect === true) {
        $this->render('home',["pseudo"=>$_POST['pseudo']]);
    }else{
        $tab=["retry"=>true];
        $this->render('sign',$tab);
    }
  }

  public function action_display(){
    $this->render('sign');
  }

  public function action_signout(){
      setcookie('id', null, time() - 3600, null, null, false, true);

      setcookie('pseudo', null, time() - 3600, null, null, false, true);

      setcookie('email', null, time() - 3600, null, null, false, true);

      setcookie('privilege', null, time() - 3600, null, null, false, true);

      setcookie('validate', null, time() - 3600, null, null, false, true);

      $this->render('sign');
  }

  public function action_default(){
    $this->action_display();
  }


}

?>