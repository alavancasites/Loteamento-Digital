<?php
$cid = 0;
Yii::app()->clientScript->registerScript('helpers', '                                                           
	var baseUrl = "' . (Yii::app()->baseUrl) . '";                                                                                                          
', 0);


Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/template/js/vendor.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/template/libs/moment/moment.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/template/libs/jquery-scrollto/jquery.scrollTo.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/template/libs/sweetalert2/sweetalert2.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/template/js/pages/jquery.chat.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/template/js/pages/jquery.todo.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/template/libs/morris-js/morris.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/template/libs/raphael/raphael.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/template/libs/jquery-sparkline/jquery.sparkline.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/template/js/pages/dashboard.init.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/template/js/app.min.js');

// Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.plainoverlay.min.js?v=' . $cid, 0);
// Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/lib/sticky/sticky.min.js?v=' . $cid, 0);
// Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/bootstrap/js/bootstrap.js?v=' . $cid, 0);
// Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.maskMoney.js?v=' . $cid, 0);
// Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.mask.min.js?v=' . $cid, 0);
// Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap-typeahead.js?v=' . $cid, 0);
// Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/init.js?v=' . $cid, 2);
