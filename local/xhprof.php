<?php
// Путь к GUI XHProf, слэш на конце обязателен
$xhprof_path = '/var/www/dev.magnitmedia/data/www/elevel6.dev.magnitmedia.ru/local/xhprof/';

// Базовая ссылка на GUI XHProf
$xhprof_url = 'http://elevel6.dev.magnitmedia.ru/local/xhprof/xhprof_html/index.php';

// Расширение файлов профиля (используется для агрегации и сравнительного анализа
$xhprof_namespace = 'cp';

$xhprof_start_time = 0;
$xhprof_time_limit = 0;
$xhprof_user = 0;

if (extension_loaded('xhprof')) {
   include_once $xhprof_path.'xhprof_lib/utils/xhprof_lib.php';
   include_once $xhprof_path.'xhprof_lib/utils/xhprof_runs.php';
}   

/*
* time_limit: максимальное время выполнения страницы, для которой выполняется профилирование
* sendUser: если указан пользователь, то ссылка отправляется сообщением социальной сети интранет
*/
function xhprof_start($time_limit = 0, $sendUser = 0) {
   global $xhprof_start_time;
   global $xhprof_time_limit;
   global $xhprof_user;
   $xhprof_user = $sendUser;
   $xhprof_start_time = time();
   $xhprof_time_limit = $time_limit;
   if (extension_loaded('xhprof'))
      xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);

}

function xhprof_stop() {
   global $xhprof_namespace;
   global $xhprof_url;
   global $xhprof_start_time;
   global $xhprof_time_limit;
   global $xhprof_user;
   global $APPLICATION;
   
   $run_time = (time() - $xhprof_start_time);

   if ($xhprof_time_limit == 0 || ($run_time >= $xhprof_time_limit)) {

      if (extension_loaded('xhprof')) {
         $xhprof_data = xhprof_disable();
         $xhprof_runs = new XHProfRuns_Default();
         $run_id = $xhprof_runs->save_run($xhprof_data, $xhprof_namespace);
         $profiler_url = sprintf($xhprof_url.'?run=%s&source=%s', $run_id, $xhprof_namespace);

         if ($xhprof_user>0) {
            $arMessageFields = array(
               "TO_USER_ID" => $xhprof_user,
               "FROM_USER_ID" => 0, 
               "NOTIFY_TYPE" => IM_NOTIFY_SYSTEM, 
               "NOTIFY_MODULE" => "im", 
               "NOTIFY_MESSAGE" =>
                  "XHProf: (".$run_time.">=".$xhprof_time_limit."): <a target=_blank href=\"".$profiler_url."\">".$run_id.".".$xhprof_namespace."</a>\n".
                  "URL: <a target=\"_blank\" href=\"".$APPLICATION->GetCurUri()."\">".$APPLICATION->GetCurUri()."</a>"
            );
            CIMNotify::Add($arMessageFields);
         }
         else {
            ?><div style="
               margin: 5px;
               width: 300px;
               font-size: 11px;
               padding: 5px;
               line-height: normal;
               font-weight: normal;   
               position: fixed;
               top: 50px;
               left: 10px;
               z-index: 999;
               opacity: 1;
               border: 1px solid blue;   
               font-family: Verdana,Arial;
               font-size: 10px;
               color: black;
               background-color: white;
               margin: 0px;
               padding: 2px;
               font-weight: normal;
               line-height: normal;
               text-align: left;
               background-image: none;">
            <b>XHProf</b> (<?=$run_time?>>=<?=$xhprof_time_limit?>): <a target=_blank href="<?=$profiler_url?>"><?=$run_id?>.<?=$xhprof_namespace?></a>
            </div><?
         }
      }
   }
}

?>