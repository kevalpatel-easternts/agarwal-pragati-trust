<?php
class Element_DateInput extends Element {
	protected $_attributes = array("type" => "date");
	protected $prepend;
	protected $append;
	protected $divID;
	protected $jQueryOptions;
	
	public function render() {
		$addons = array();
		if(!empty($this->prepend))
			$addons[] = "input-prepend";
		if(!empty($this->append))
			$addons[] = "input-append";
		if(!empty($addons))
			echo '<div id="', $this->divID , '" class="', implode(" ", $addons), '">';

		$this->validation[] = new Validation_Date;
		$this->renderAddOn("prepend");
		parent::render();
		$this->renderAddOn("append");

		if(!empty($addons))
			echo '</div>';
		
		echo '<script>$(function() { $("#', $this->divID, '").datetimepicker(', $this->jQueryOptions(), '); });</script>';
	}

	protected function renderAddOn($type = "prepend") {
		if(!empty($this->$type)) {
			$span = true;
			if(strpos($this->$type, "<button") !== false)
				$span = false;

			if($span)
				echo '<span class="add-on">';

			echo $this->$type;

			if($span)
				echo '</span>';
		}
	}
	

}
