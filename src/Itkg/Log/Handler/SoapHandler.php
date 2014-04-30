<?php

namespace Itkg\Log\Writer;

use Itkg\Log\Writer as BaseWriter;
use Monolog\Handler\AbstractProcessingHandler;
use Psr\Log\LogLevel;

/**
 * Classe Writer pour les requetes soap
 * Utile pour la reprise sur incident et l'enregistrement dans des fichiers
 * uniques par log 
 * 
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 * @author Benoit de JACOBET <benoit.dejacobet@businessdecision.com>
 * @author Clément GUINET <clement.guinet@businessdecision.com>
 *
 * @package \Itkg\Log\Writer
 */
class SoapHandler extends AbstractProcessingHandler
{
     /**
     * Le répertoire de log (inclut le séparateur en fin de chemin)
     * 
     * @var string
     */
    protected $folder;
    
    /**
     * Le fichier de log
     * 
     * @var string
     */
    protected $file;

    /**
     * Constructor
     *
     * @param string $folder Destination folder
     * @param string $file Destination file
     * @param int $level
     */
    public function __construct($folder, $file = '', $level = LogLevel::DEBUG)
    {
        $this->folder = $folder;
        if($file) {
            $this->file = $file;
        }else {
            $this->file = time().".txt";
        }
        parent::__construct($level);
    }


    /**
     * File setter
     *
     * @var $file string
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

        
    /**
     * Ecrit le log dans un fichier
     *
     * @param array $record
     */
    public function write(array $record)
    {
       file_put_contents($this->folder.$this->file, $record['formatted']);
    }

}
