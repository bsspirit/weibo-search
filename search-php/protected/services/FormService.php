<?php 

class FormService{

	public static function create($attrs=array()){
		$form = new MyForm();
		if(!empty($attrs)){
			foreach($attrs as $attr){
				switch($attr){
					case 'uid':
						$form->uid=1;
						break;
					case 'area':
						$form->area=1;
						break;
				}
			}
		}
		return $form;
	}
}

?>
