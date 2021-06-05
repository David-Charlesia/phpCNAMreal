<?php

    class Controller_admin extends Controller{

        public function action_admin() {
            $bd = Model::getModel();
            $usersToValidate = $bd->getUserForValidation();

            $tab=['usersToValidate'=>$usersToValidate];

            $this->render('admin',$tab);
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
            $this->action_admin();
        }

    }

?>