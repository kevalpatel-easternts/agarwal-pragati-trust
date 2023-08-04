<?php
class Element_Country extends Element_Select {
	public function __construct($label, $name, array $properties = null) {
		$countrysql = ets_db_query("Select * from countries order by countries_name") or die(ets_db_error());
		$options = array();
		while($rscountry = ets_db_fetch_array($countrysql)){
			$options[$rscountry['countries_iso_code_2']] = $rscountry['countries_name'];
		}
		parent::__construct($label, $name, $options, $properties);
    }
}
