<?php
class Element_TinyMCE extends Element_Textarea {
    protected $basic;

    public function render() {
        echo "<textarea", $this->getAttributes(array("value", "required")), ">";
        if(!empty($this->_attributes["value"]))
            echo $this->_attributes["value"];
        echo "</textarea>";
    }

    function renderJS() {
		echo '
			var convert_urls = true;
			tinymce.init({ selector: "textarea#', $this->_attributes["id"], '", width: "100%",
			theme: "modern",
			relative_urls: false,
    		plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
   		],
   		toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   		toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   		
   		image_advtab: true,
			   		
   		extended_valid_elements : "i[class],span[class],strong[class]",
		
  		external_filemanager_path:"/aptweb/filemanager/",
   		filemanager_title:"Pro Filemanager",
   		external_plugins: { "filemanager" : "/aptweb/filemanager/plugin.min.js"}
			
	   	});';

        $ajax = $this->_form->getAjax();
        $id = $this->_form->getAttribute("id");
        if(!empty($ajax))
            echo 'jQuery("#$id").bind("submit", function() { tinyMCE.triggerSave(); });';
    }

    function getJSFiles() {
        return array(
            $this->_form->getResourcesPath() . "/tiny_mce/tinymce.min.js",
            //$this->_form->getResourcesPath() . "/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php"
			
        );
    }
}
