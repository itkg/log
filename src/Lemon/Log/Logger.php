<?php

namespace Lemon\Log;

use Lemon\Log\Helper\IdGenerator;
use Psr\Log\AbstractLogger;
use Psr\Log\LogLevel;

/**
 * Class Logger
 *
 * @abstract
 * 
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
abstract class Logger extends AbstractLogger
{
    protected $levels = array(
        LogLevel::EMERGENCY,
        LogLevel::ALERT,
        LogLevel::CRITICAL,
        LogLevel::ERROR,
        LogLevel::WARNING,
        LogLevel::NOTICE,
        LogLevel::INFO,
        LogLevel::DEBUG,
    );
	/**
     * ID du log
     *
     * @var int
     */
    protected $id;
  
    /**
     * Liste des paramètres du Logger
     * Permet par exemple de stocker le nom du fichier de log, etc.
     * Ces paramêtres sont chargés via la méthode load du Logger
     * Cette méthode doit être redéfinie pour effectuer le traitement de ces 
     * paramêtres
     * 
     * @var array
     */
    protected $parameters;

    /**
     * Formatter de log
     *
     * @var Lemon\Log\Formatter
     */
    protected $formatter;

    /**
     * ID Generator
     * 
     * @var Lemon\Log\Helper\IdGeneratorInterface
     */
    protected $idGenerator;

    /**
     * Constructeur
     */
    public function __construct(Formatter $formatter = null, array $parameters = array(), IdGeneratorInterface $idGenerator = null)
    {
        if(is_object($formatter)) {
            $this->setFormatter($formatter);
        }
        $this->parameters = $parameters;
        if($idGenerator) {
            $this->setIdGenerator($idGenerator);
        }
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
     * Set les paramêtres du Logger
     * 
     * @param array $parameters 
     */
    public function setParameters(array $parameters = array())
    {
        $this->parameters = $parameters;
        $this->load();

        return $this;
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
        $this->formatter->setLogger($this);

        return $this;
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
	
	public function getIdGenerator()
	{
		return $this->idGenerator;
	}

	public function setIdGenerator(\Lemon\Log\Helper\IdGeneratorInterface $idGenerator)
	{
		$this->idGenerator = $idGenerator;

        return $this;
	}
    
    /**
     * génère le log id
     * 
     * @return int
     */
    protected function generateId() 
    {
        if(!$this->idGenerator) {
            return '';
        }else {
            return $this->idGenerator->generate();
        }
    }

    public function log($level, $message, array $context = array())
    {
        if(!in_array($level, $this->levels)) {
            throw new \Psr\Log\InvalidArgumentException(sprintf('Level %s does not exist', $level));
        }
        $this->formatter->addParameters($context);
        $this->write($level, $this->formatter->format($message));
    }

    abstract protected function write($level, $message);
}