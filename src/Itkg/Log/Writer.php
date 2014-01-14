<?php

namespace Itkg\Log;

/**
 * Classe abstraite pour les Writer
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 * @author Benoit de JACOBET <benoit.dejacobet@businessdecision.com>
 * @author Clément GUINET <clement.guinet@businessdecision.com>
 * @author Jean-Baptiste ROUSSEAU <jean-baptiste.rousseau@businessdecision.com>
 * 
 * @abstract
 * @package \Itkg\Log
 */
abstract class Writer 
{
    /**
     * ID du log
     *
     * @var int
     */
    protected $id;
  
    /**
     * Liste des paramètres du Writer
     * Permet par exemple de stocker le nom du fichier de log, etc.
     * Ces paramêtres sont chargés via la méthode load du Writer
     * Cette méthode doit être redéfinie pour effectuer le traitement de ces 
     * paramêtres
     * 
     * @var array
     */
    protected $parameters;

    /**
     * Formatter de log
     *
     * @var Itkg\Log\Formatter
     */
    protected $formatter;

    /**
     * Constructeur
     */
    public function __construct(Formatter $formatter, array $parameters = array())
    {
        $this->setFormatter($formatter);
        $this->parameters = $parameters;
        
    }

    /**
     * Initialisation du log ID
     * pour l'ensemble d'une transaction.
     *
     * @param string $identifier Libellé concaténé au logId (identifiant la transaction)
     */
    public function init($identifier)
    {
        $this->id = $this->generateId() .' - ' . $identifier;
    }

    /**
     * Getter ID
     * 
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Setter ID
     * 
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * Méthode utilisable pour effectuer un traitement particulier suite au 
     * chargement des paramètres
     * 
     * Doit être surchargé pour les traitements spécifiques
     * @param array $parameters 
     */
    public function load()
    {}
    
    /**
     * Set les paramêtres du Writer
     * 
     * @param array $parameters 
     */
    public function setParameters(array $parameters = array())
    {
        $this->parameters = $parameters;
        $this->load();
    }
    
    /**
     * Ajoute une liste de paramètres à ceux existantsl
     * 
     * @param array $parameters ["appelRetour"] (facultatif) soit "'appel" ou 
     * "reponse OK", ou "reponse KO" soit vide
     * ["requestTime"] (facultatif) date en microsecondes de la requete 
     * (pour calculer le temps de reponse)
     */
    public function loadParameters(array $parameters = array())
    {
        $this->parameters = array_merge($this->parameters, $parameters);
    }
    
    /**
     * Ecrit le log au bon format
     *
     * @abstract
     * @param string $log
     * @param array $params 
     */
    public abstract function write($log);
    
    /**
     * Get formatter
     * 
     * @return Formatter 
     */
    public function getFormatter()
    {
        return $this->formatter;
    }
    
    /**
     * Set formatter
     * 
     * @param Formatter $formatter 
     */
    public function setFormatter(Formatter $formatter)
    {
        $this->formatter = $formatter;
        $this->formatter->setWriter($this);
    }
    
    /**
     * Get parameters
     * 
     * @return array 
     */
    public function getParameters()
    {
        return $this->parameters;
    }
	
    
    /**
     * génère le log id
     * 
     * @return int
     */
    protected function generateId() 
    {
        return IdGenerator::generate();
    }
}