<?php
class Service extends MasterController {
    public function __construct() {
        // Constructor code can be added here if needed
    }
    public function Term() {
        // This method can be used to handle the default action for the Service controller
        $this->render('Term');
    }
    public function Career() {
        // This method can be used to handle the privacy policy action for the Service controller
        $this->render('Career');
    }


}
?>