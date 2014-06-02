<?php

class Batch_Job_Skeleton_Plugin_Operation {
	public function __construct() {

		$mrj = simplexml_load_file( '/var/sites/tradyouth.org-content/plugins/orthodox-nationalist-import/ortho.xhtml' );

		var_dump( $mrj );

	}
}

?>
