<?php
class Element_jQueryUIDate extends Element_Textbox {
	protected $_attributes = array(
		"type" => "text",
		"autocomplete" => "off"
	);
	protected $jQueryOptions;


    public function jQueryDocumentReady() {
        parent::jQueryDocumentReady();
        echo '$("#', $this->_attributes["id"], '").datepicker(', $this->jQueryOptions(), ');';
    }

    public function render() {
        $this->validation[] = new Validation_Date;
        parent::render();
    }
}
