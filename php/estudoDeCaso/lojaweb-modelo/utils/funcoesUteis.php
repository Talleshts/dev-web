<?php

function formatarData($data)
{
    return date('d/m/Y',strtotime($data));
}

function converteDataMysql($data){
    return date('Y-m-d',$data);
}

?>