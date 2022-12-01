<?php
function exibirDadosEmTabela($arrayDados){
    if(is_object($arrayDados))
        $arrayDados = (array) $arrayDados;

    $tds = "";
    if(is_array($arrayDados))
        foreach ($arrayDados as $td) {
            $tds .= "<td>$td</td>";
        }
    return "<tr>$tds</tr>";
}