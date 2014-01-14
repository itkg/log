<?php

namespace Itkg\Log\Writer;

use Itkg\Log\Writer as BaseWriter;

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
class SoapWriter extends BaseWriter
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
     * Récupération des paramêtres utiles au Writer
     */
    public function load()
    {
        if(isset($this->parameters['folder'])) {
            $this->folder = $this->parameters['folder'];
        }
        if(isset($this->parameters['file'])) {
            $this->file = $this->parameters['file'];
        } else {
            $this->file = time().".txt";
        }
    }
    
 
    /**
     * setter pour $this->file
     * @var $file string
     */
    public function setFile($file) {
        $this->file = $file;
    }

        
     /**
     * Ecrit le log dans un fichier
     *
     * @param string $log
     */
    public function write($log)
    {
       $log = $this->formatter->format($log); 
        
       file_put_contents($this->folder.$this->file, $this->id.$log);
    }

}
