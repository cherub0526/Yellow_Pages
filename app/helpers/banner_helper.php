<?php
function bannerSpry($spry1Array,$spry2Array,$spry1Value,$spry2Value)
{
	$string = '錯誤的位置，請更新。';
	foreach($spry1Array as $tmpSpry1) {
		if($tmpSpry1->position == $spry1Value) {
			$string = $tmpSpry1->title;
			foreach($spry2Array as $tmpSpry2) {
				if($tmpSpry2->position == $spry2Value) {
					$string .= '/' . $tmpSpry2->title;
					break;
				}
			}
			break;
		}
	}
	return $string;
}

?>