<?php
/**
* LoadAvg - Server Monitoring & Analytics
* http://www.loadavg.com
*
* Charts module interface
* 
* @link https://github.com/loadavg/loadavg
* @author Karsten Becker
* @copyright 2014 Sputnik7
*
* This file is licensed under the Affero General Public License version 3 or
* later.
*/

//called by charting modules module to render charts! 

?>


<?php
		//name of module here... for title ?
		//var_dump ($module);
	
		//get status of interface ebefore rendering
		$moduleCollapse = "accordion-body collapse in";
		$moduleCollapseStatus = "true";

		if ($cookies) {
			$this->getUIcookie($moduleCollapse, $moduleCollapseStatus, $module); 
		}
?>

<div id="accordion-<?php echo $module;?>" class="accordion-group"   data-collapse-closed="<?php echo $module;?>" cookie-closed=<?php echo $moduleCollapseStatus; ?> >
		<div class="accordion-heading"> 
			<a class="accordion-toggle" data-toggle="collapse"  href="#category<?php echo $module; ?>" >
				<?php echo $moduleSettings['module']['name']; //$chart->label; ?>				
			</a>
		</div>

		<div id="category<?php echo $module; ?>" class="<?php echo $moduleCollapse;?>">
		<div class="accordion-inner">

		<?php

			//keeps track of number of chart modules in a chart
			$chartModules = 0;

			//keeps track of first time loop us run - so javascript code 
			//is only loaded the first time in chartmodule when rendering charts
			$loadJavascript = true;

			foreach ( $charts['args'] as $chart ) {
				$chartModules++;

				$chart = json_decode($chart);

				//get the log file NAME or names when there is a range
				//returns multiple files when multiple log files
				$class->setLogFile($chart->logfile,  $dateRange, $module );

				//get data needed to send to template to render chart
				$chartData = $class->getChartRenderData( $chart, $functionSettings, $module );

				include( HOME_PATH . '/lib/charts/chartmodule.php'); 

				$loadJavascript = false;

			} ?>

		<?php 	//include( HOME_PATH . '/lib/charts/chartmodule.php'); ?>

		</div> <!-- // Accordion inner end -->
	</div> <!-- // Accordion category end -->
</div> <!-- // Accordion end -->


<div id="separator" class="separator bottom"></div>
