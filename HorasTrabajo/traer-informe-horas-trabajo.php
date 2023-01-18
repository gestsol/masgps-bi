<?php


include "horas_trabajo.php";


$json=json_decode($informe);

$id_informe=$json->id;
 sleep(4);


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://www.trackermasgps.com/api-v2/report/tracker/retrieve',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'hash='.$cap.'&report_id='.$id_informe,
  CURLOPT_HTTPHEADER => array(
    'Accept: */*',
    'Accept-Language: es-419,es;q=0.9,en;q=0.8',
    'Connection: keep-alive',
    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
    'Cookie: _ga=GA1.2.728367267.1665672802; locale=es; _gid=GA1.2.621312682.1672338026; session_key=b353a9505ad2379b3924ddd5597be1df; check_audit=b353a9505ad2379b3924ddd5597be1df',
    'Origin: http://www.trackermasgps.com',
    'Referer: http://www.trackermasgps.com/pro/applications/reports/index.html?newuiwrap=1',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36'
  ),
));


 $response7 = curl_exec($curl);



$horas=json_decode($response7);

$buses=$horas->report->sheets[0]->sections[0]->data[0]->rows;



foreach ($buses as $items){

echo "<br>";

echo $plate=$items->tracker->v.' / ' ;
echo $total_horas=$items->duration->v.' / ';
echo $ralenti=$items->idle->v.' / ';
echo $en_movimiento=$items->in_movement->v.' / ';
echo $ayer;

  
}

curl_close($curl);

?>