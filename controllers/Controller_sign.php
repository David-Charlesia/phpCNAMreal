<?php

class Controller_sign extends Controller{

  private $tab = ["pageName"=>"Connexion/Créer un compte"];

  public function action_signin(){
    
    $bd = Model::getModel();

    $connect = $bd->connect($_POST['pseudo'], $_POST['password']);

    if($connect === true) {
        $this->render('home',["pageName"=>"Acceuil","pseudo"=>$_POST['pseudo']]);
    }else{
        $this->tab["retry"]=true;
        $this->render('sign',$this->tab);
    }
  }

  public function action_signup(){
    $bd = Model::getModel();

    $bd->createAccount($_POST['pseudo'], $_POST['password'], $_POST['email'], $_POST['level']);
    sleep(1);
    $connect = $bd->connect($_POST['pseudo'], $_POST['password']);

    if($connect === true) {
      $this->render('home',["pageName"=>"Accueil","pseudo"=>$_POST['pseudo']]);
    }else{
      $this->tab["retry"]=true;
      $this->render('sign',$this->tab);
    }
  }

  public function action_display(){
    $this->render('sign',$this->tab);
  }

  public function action_signout(){
      setcookie('id', null, time() - 3600, null, null, false, true);

      setcookie('pseudo', null, time() - 3600, null, null, false, true);

      setcookie('email', null, time() - 3600, null, null, false, true);

      setcookie('privilege', null, time() - 3600, null, null, false, true);

      setcookie('validate', null, time() - 3600, null, null, false, true);

      $this->render('sign',$this->tab);
  }

  public function action_default(){
    $this->action_display();
  }


}

?>