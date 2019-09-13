<?php

class Controller {
    
    public function redirectTo($destination)
    {
        header('Location: '. $destination);
    }
}