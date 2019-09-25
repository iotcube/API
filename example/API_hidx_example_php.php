<?php
function CallAPI($method, $url, $header, $data)
{
  $curl = curl_init($url);
  switch ($method)
  {
    case "POST":
      curl_setopt($curl, CURLOPT_POST, 1);
      if ($data)
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      break;
  }
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt ($curl, CURLOPT_HTTPHEADER, $header);
  $result = curl_exec($curl);
  curl_close($curl);
  return $result;
}
$file_name = "/filepath/to/hidxfile.hidx";
$header = array ("User-Agent: your user-agent value");
$data = array ("file" => curl_file_create (realpath($file_name)));
$url = 'https://iotcube.net/api/wf1';
$resp = CallAPI ("POST", $url, $header, $data);
?>
