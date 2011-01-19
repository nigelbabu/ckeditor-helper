<?php
class CkeditorHelper extends AppHelper {

    var $helpers = Array('Html');

    function load($id) {
        $did = '';
        foreach (explode('.', $id) as $v) {
	    if(substr_count($v, '_') != 0) {
		$wd = '';
		foreach (explode('_', $v) as $l) {
		    $wd .= ucfirst($l);
		    }
		    $did .= ucfirst($wd);
	    } else {
		$did .= ucfirst($v);
	    }
        }
	
	$path = $this->Html->webroot . 'js/ckfinder';
        $code = "CKEDITOR.replace( '".$did."',
        {
	        customConfig : '../editor.js',
		filebrowserBrowseUrl : '$path/ckfinder.html',
		filebrowserImageBrowseUrl : '$path/ckfinder.html',
		filebrowserUploadUrl : '$path/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '$path/core/connector/php/connector.php?command=QuickUpload&type=Files',
        } );";
        return $this->Html->scriptBlock($code);
    }
}
?>