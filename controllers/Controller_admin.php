<?php

    class Controller_admin extends Controller{
        private $tab = ["pageName"=>"admin"];

        public function action_admin() {
            $bd = Model::getModel();
            $usersToValidate = $bd->getUserForValidation();

            $this->tab['usersToValidate']=$usersToValidate;

            $this->render('admin',$this->tab);
        }

        public function action_validate() {
            $bd = Model::getModel();
            if($_POST["validate"] === "ok") {
                $bd->validateUser($_POST['id_user']);
            }else if($_POST["validate"] === "nope") {
                $bd->validateUser($_POST['id_user'],0);
            }
            $this->action_default();
        }

        public function action_default() {
            if($_COOKIE["privilege"]>1){
                $this->bruh();
            }
            $this->action_admin();
        }

        public function bruh() {
            $this->tab['bruh']='bruh';
            $this->render('admin',$this->tab);
        }

    }

?>