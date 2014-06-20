<?php

class Batch_Job_Skeleton_Plugin_Operation {
	public function __construct() {

		$mrj = simplexml_load_file( '/home/ubuntu/repo/mrj.xml' );
		$mrj->registerXPathNamespace('html', 'http://www.w3.org/1999/xhtml');

		$podcasts = $mrj->xpath( '/mrj/post' );

		foreach( $podcasts as $podcast ) {

			echo $podcast->mp3;

		}

	}
}

?>
