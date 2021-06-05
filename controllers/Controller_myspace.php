<?php

    class Controller_myspace extends Controller{

        private $tab = ["pageName"=>"Espace personnel"];

        public function action_myspace() {

            if($_COOKIE["privilege"]>2 || $_COOKIE["validate"]==0) {
                $this->tab["authorization"]=0;
            }else{
                $this->tab["authorization"]=1;
                $bd = Model::getModel();
                $contributions = $bd->getContributions($_COOKIE["id"]);
                $this->tab["contributions"]=$contributions;
            }

            $this->render('myspace',$this->tab);
        }

        public function action_ask(){
            $m=Model::getModel();
            $m->upgradeUser($_COOKIE["id"]);
            $this->tab["authorization"]=0;
            $this->render('myspace',$this->tab);
        }

        public function sendContribution() {
            echo 'heyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy';
            $bd = Model::getModel();
            $bd->sendContribution($_COOKIE["id"], $_POST['lien']);
            $this->tab["contribution_sended"]=1;
            $this->action_default();
        }

        public function action_default() {
            $this->action_myspace();
        }

    }

?>