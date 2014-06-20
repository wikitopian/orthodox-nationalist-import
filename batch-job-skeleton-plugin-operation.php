<?php

class Batch_Job_Skeleton_Plugin_Operation {
	public function __construct() {

		$mrj = simplexml_load_file( '/var/sites/tradyouth.org-content/plugins/ortho/ortho.xhtml' );
		$mrj->registerXPathNamespace('html', 'http://www.w3.org/1999/xhtml');

		$titles_xml = $mrj->xpath( '//html:div[@class="postarea"]/html:h1/html:a/text()' );
		$dates_xml  = $mrj->xpath( '//html:div[@class="postarea"]/html:div[@class="date"]' );
		$image_xml  = $mrj->xpath( '//html:div[@class="postarea"]/html:div/html:a/html:img' );

		print_r( $image_xml );
		die();

		$shows = array();

		foreach( $titles_xml as $title_key => $title_xml ) {
			$title = (string) $title_xml[0];
			$title = trim( preg_replace( '~[\r\n]~', ' ', $title ) );
			$title = preg_replace( "/^[^:]+: /", "", $title );

			$show = array();
			$show['title'] = $title;
			$show['date']  = (string) $dates_xml[$title_key]->p;
			$shows[$title_key] = $show;
		}

		print_r( $shows );

		foreach( $podcasts as $podcast ) {
			$podcast->registerXPathNamespace('html', 'http://www.w3.org/1999/xhtml');

			//print_r( $podcast );
			$title = $podcast->xpath( 'html:h1/html:a/text()' );
			$title = $title[0][0];
			//echo $title;

			$image = $podcast->xpath( 'html:img' );
			print_r( $image );
		}

	}
}

?>
