<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CronJobCreator
 *
 * @author Sascha Turowski <turtec.de>
 */
class CronJobCreator {
     
    
    public function setUpCronJob(){
       add_action('katambocronhook',array($this->theMailer,'processQueue'));
       add_filter('cron_schedules', array($this,'setCronInterval'));
       add_action('wp', array($this,'cronActivation')); 
    }
     
          
    function setCronInterval( $schedules ) {
	
	$schedules['katambointerval'] = array(
		'interval' => $this->interval,
		'display' => __('katambointerval')
	);
	return $schedules;
    }
    
    
    function cronActivation() {
	if ( !wp_next_scheduled( 'katambocronhook' ) ) {
		wp_schedule_event( time(), 'katambointerval', 'katambocronhook');
	}
    }
}

?>
