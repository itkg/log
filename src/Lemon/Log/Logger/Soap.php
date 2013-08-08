<?php

namespace Lemon\Log\Logger;

use Lemon\Log\Logger;

/**
 * Classe Writer pour les requetes soap
 * Utile pour la reprise sur incident et l'enregistrement dans des fichiers
 * uniques par log 
 *
 * @package \Lemon\Log\Writer
 */
class Soap extends Logger
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
