<?php

    class Controller_myspace extends Controller{

        private $tab = ["pageName"=>"Espace personnel"];

        public function action_myspace() {
            $this->render('myspace',$this->tab);
        }

        public function action_default() {
            $this->action_myspace();
        }

    }

?>