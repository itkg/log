<?php

namespace Itkg\Log\Helper;

/**
 * Class IdGenerator
 *
 * Create a custom ID
 * 
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class IdGenerator implements IdGeneratorInterface
{
    /**
     * Create an ID between $start & $end starting by $char and date
     * 
     * @param int $start Use for random
     * @param int $end Use for random
     * @param string $char ID prefix
     * @param boolean $bDate if true ID start with date
     * 
     * @return string
     */
    public function generate($start = 1000, $end = 1000000, $char = '#', $bdate = true)
    {
        $id = $char.\rand($start, $end);
        
        // If we want date
        if($bdate) {
            $id = date('m/d/y H:i:s') . " " .$id;
        }
        return $id;
    }
}