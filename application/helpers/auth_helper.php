<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function CallLogin($data, $akses="")
{
// $path = FCPATH.$path;
$a = "";
if(isset($data)){
    if($data['id_user'] != "" && $data['jabatan'] != "" && $data['nama'] != ""){
        $a = true;
        if($data['jabatan']!=$akses){
        $a=GetRedirectjabatan($data['jabatan']);
        }else{
        $a="";
        }
    }else{
        $a=GetRedirectjabatan("");
    }
}else{
    $a=GetRedirectjabatan("");
}
    return $a;
}

function GetRedirectjabatan($jabatan){
  $a="";
  switch($jabatan){
    case "M": $a="Mahasiswa/"; break;
    case "D": $a="Dosen/"; break;
    case "A": $a="Admin/"; break;
    default: $a="Login/";
  }
  return $a;
}
?>
