
<?php
/**
 * First, get Publisher ID, URL and Setting
 */

$wordc_setting = elgg_get_plugin_setting('wordc', 'webodf_elgg'); 

$date = new DateTime();
$download_url = elgg_get_site_url() . "webodf_elgg/{$vars['entity']->getGUID()}/{$date->format('U')}";
$js_url = elgg_get_site_url();


if ($wordc_setting == 1)
{

	echo <<<HTML

		<div class="file-photo">

 

           </body>
           
           <iframe src = "$js_url/mod/webodf_elgg/vendors/ViewerJS/#$download_url" width='700' height='550' allowfullscreen webkitallowfullscreen></iframe>
</html>

</br>
</br>
</br>
</div>


HTML;

}
 

