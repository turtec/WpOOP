<?php
/**
 * Exception is thrown if classname and filename
 * doesn't match or class couldn't be found
 *
 * @author Sascha Turowski <turtec.de>
 */
class ControllerClassNotFoundException extends Exception {
    
    
    public function __construct($message, $code = 0) {
        // call the Paranet
        parent::__construct($message, $code);
    }

    // maßgeschneiderte Stringdarstellung des Objektes
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
    
}

?>
