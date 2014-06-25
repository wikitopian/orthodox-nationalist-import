<?php

class Batch_Job_Skeleton_Plugin_Operation {
	public function __construct() {

	}
	public function imported() {

		$mrj = simplexml_load_file( '/home/ubuntu/repo/mrj.xml' );
		$mrj->registerXPathNamespace('html', 'http://www.w3.org/1999/xhtml');

		$podcasts = $mrj->xpath( '/mrj/post' );

		foreach( $podcasts as $podcast ) {

			$podcast_date = strtotime( $podcast->date );
			$podcast_date =  date( 'Y-m-d', $podcast_date );

			$content = '';
			foreach( $podcast->body as $body_outer ) {

				$content .= <<<HTML
<div id="attachment_19608" style="width: 300px" class="wp-caption alignright">
<img class="size-medium wp-image-19608" src="http://cdn.tradyouth.org/uploads/2014/06/mrj_{$podcast_date}.jpg" width="300" />
</div>
HTML;

				foreach( $body_outer as $body_elements ) {
					$content .= $body_elements->asXML();
				}
			}

			$content .= "\n\n[embed]http://cdn.tradyouth.org/uploads/2014/06/mrj_{$podcast_date}.mp3[/embed]";

			$title = (string) $podcast->title;
			$title = preg_replace( '/[\n\r]/', ' ', $title );

			$podcast_insert = array(
				'post_content' => $content,
				'post_name' => "mrj_{$podcast_date}",
				'post_title' => $title,
				'post_status' => 'publish',
				'post_author' => 23514,
				'post_date' => $podcast_date,
				'comment_status' => 'closed',
				'post_category' => array( 3 ),
				'tags_input' => 'mrj',
			);

			//print_r( $podcast_insert );

			//echo wp_insert_post( $podcast_insert ) . "\n";

			//echo 'mv ' . basename( $podcast->image ) . ' mrj_' . $podcast_date . '.jpg';
			//echo "\n";

			//$mp3 = basename( $podcast->mp3 );
			//echo "cp \"{$mp3}\" ../mrj/mrj_";
			//echo ".mp3";
			//echo "\n";

			//echo $podcast->title;
			//echo $podcast->image;
			//echo $podcast->mp3;
			//echo $podcast->body->asXML();

		}

	}
}

?>
