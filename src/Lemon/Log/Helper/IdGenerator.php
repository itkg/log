<?php

namespace Lemon\Log\Helper;

/**
 * Classe IdGenerator
 *
 * Create a custom ID
 * 
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class IdGenerator implements IdGeneratorInterface
{
    /**
     * Génère un ID compris entre $start et $end précédé de $char
     * 
     * @param int $start
     * @param int $end
     * @param string $char
     * @param boolean $bDate if true ID start with date
     * @return string
     */
    public function generate($start = 1000, $end = 1000000, $char = '#', $bdate = true)
    {
        $id = $char.\rand($start, $end);
        
        // Si on souhaite la date en début de log
        if($bdate) {
            $id = date('m/d/y H:i:s') . " " .$id;
        }
        return $id;
    }
}