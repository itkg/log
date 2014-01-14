<?php

namespace Itkg\Log;

/**
 * Classe IdGenerator
 *
 * Cette classe contient les méthodes nécessaires 
 * à la création d'ID
 * 
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class IdGenerator 
{
    /**
     * Génère un ID compris entre $start et $end précédé de $char
     * 
     * @param int $start
     * @param int $end
     * @param string $char
     * @return string
     */
    public static function generate($start = 1000, $end = 1000000, $char = '#', $bdate = true)
    {
        $id = $char.\rand($start, $end);
        
        // Si on souhaite la date en début de log
        if($bdate) {
            $id = date('m/d/y H:i:s') . " " .$id;
        }
        return $id;
    }
}
