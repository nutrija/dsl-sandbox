<?php
namespace Park;

require_once __DIR__.'/VehicleJsonConverter.php';
require_once __DIR__.'/VehicleArrayConverter.php';
require_once __DIR__.'/Engine.php';
require_once __DIR__.'/CurrentState.php';
require_once __DIR__.'/Company.php';

/**
 * Generated from NGS DSL
 *
 * @property string $URI a unique object identifier (read-only)
 * @property int $ID autogenerated by server (read-only)
 * @property string $model a string
 * @property int $year an integer number
 * @property string $engineID used by reference $engine (read-only)
 * @property \Park\Engine $engine an object of class "Park\Engine"
 * @property \Park\CurrentState $state an object of class "Park\CurrentState", can be null
 * @property int $companyID used by reference $company (read-only)
 * @property string $companyURI reference to an object of class "Park\Company" (read-only)
 * @property \Park\Company $company an object of class "Park\Company", can be null
 * @property bool $muscleCar a bool, calculated by server (read-only)
 * @property bool $oldtimer a bool, calculated by server (read-only)
 * @property string $description a string, calculated by server (read-only)
 * @property int $enginePowerInWatts an integer number, calculated by server (read-only)
 *
 * @package Park
 * @version 0.9.9 beta
 */
class Vehicle extends \NGS\Patterns\AggregateRoot implements \IteratorAggregate
{
    protected $URI;
    protected $ID;
    protected $model;
    protected $year;
    protected $engineID;
    protected $engine;
    protected $state;
    protected $companyID;
    protected $companyURI;
    protected $company;
    protected $muscleCar;
    protected $oldtimer;
    protected $description;
    protected $enginePowerInWatts;

    /**
     * Constructs object using a key-property array or instance of class "Park\Vehicle"
     *
     * @param array|void $data key-property array or instance of class "Park\Vehicle" or pass void to provide all fields with defaults
     */
    public function __construct($data = array(), $construction_type = '')
    {
        if(is_array($data) && $construction_type !== 'build_internal') {
            foreach($data as $key => $val) {
                if(in_array($key, self::$_read_only_properties, true))
                    throw new \LogicException($key.' is a read only property and can\'t be set through the constructor.');
            }
        }
        if (is_array($data)) {
            $this->fromArray($data);
        } else {
            throw new \InvalidArgumentException('Constructor parameter must be an array! Type was: '.\NGS\Utils::getType($data));
        }
    }

    /**
     * Supply default values for uninitialized properties
     *
     * @param array $data key-property array which will be filled in-place
     */
    private static function provideDefaults(array &$data)
    {
        if(!array_key_exists('URI', $data))
            $data['URI'] = null; //a string representing a unique object identifier
        if(!array_key_exists('ID', $data))
            $data['ID'] = 0; // an integer number
        if(!array_key_exists('model', $data))
            $data['model'] = ''; // a string
        if(!array_key_exists('year', $data))
            $data['year'] = 0; // an integer number
        if(!array_key_exists('engineID', $data))
            $data['engineID'] = ''; // a string
        if(!array_key_exists('engine', $data))
            $data['engine'] = new \Park\Engine(); // an object of class "Park\Engine"
        if(!array_key_exists('muscleCar', $data))
            $data['muscleCar'] = false; // a bool, calculated by server
        if(!array_key_exists('oldtimer', $data))
            $data['oldtimer'] = false; // a bool, calculated by server
        if(!array_key_exists('description', $data))
            $data['description'] = ''; // a string, calculated by server
        if(!array_key_exists('enginePowerInWatts', $data))
            $data['enginePowerInWatts'] = 0; // an integer number, calculated by server
    }

    /**
     * Constructs object from a key-property array
     *
     * @param array $data key-property array
     */
    private function fromArray(array $data)
    {
        $this->provideDefaults($data);

        if(isset($data['URI']))
            $this->URI = \NGS\Converter\PrimitiveConverter::toString($data['URI']);
        unset($data['URI']);
        if (array_key_exists('ID', $data))
            $this->setID($data['ID']);
        unset($data['ID']);
        if (array_key_exists('model', $data))
            $this->setModel($data['model']);
        unset($data['model']);
        if (array_key_exists('year', $data))
            $this->setYear($data['year']);
        unset($data['year']);
        if (array_key_exists('engineID', $data))
            $this->setEngineID($data['engineID']);
        unset($data['engineID']);
        if (array_key_exists('engine', $data))
            $this->setEngine($data['engine']);
        unset($data['engine']);
        if (array_key_exists('state', $data))
            $this->setState($data['state']);
        unset($data['state']);
        if (array_key_exists('companyID', $data))
            $this->setCompanyID($data['companyID']);
        unset($data['companyID']);
        if (array_key_exists('company', $data))
            $this->setCompany($data['company']);
        unset($data['company']);
        if(array_key_exists('companyURI', $data))
            $this->companyURI = $data['companyURI'] === null ? null : \NGS\Converter\PrimitiveConverter::toString($data['companyURI']);
        unset($data['companyURI']);
        if (isset($data['muscleCar']))
            $this->muscleCar = \NGS\Converter\PrimitiveConverter::toBoolean($data['muscleCar']);
        unset($data['muscleCar']);
        if (isset($data['oldtimer']))
            $this->oldtimer = \NGS\Converter\PrimitiveConverter::toBoolean($data['oldtimer']);
        unset($data['oldtimer']);
        if (isset($data['description']))
            $this->description = \NGS\Converter\PrimitiveConverter::toString($data['description']);
        unset($data['description']);
        if (isset($data['enginePowerInWatts']))
            $this->enginePowerInWatts = \NGS\Converter\PrimitiveConverter::toInteger($data['enginePowerInWatts']);
        unset($data['enginePowerInWatts']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "Park\Vehicle" constructor: '.implode(', ', array_keys($data)));
    }

// ============================================================================

    /**
     * Helper getter function, body for magic method $this->__get('URI')
     * URI is a string representation of the primary key.
     *
     * @return string unique resource identifier representing this object
     */
    public function getURI()
    {
        return $this->URI;
    }

    /**
     * @return an integer number
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @return a string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return an integer number
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return a string
     */
    public function getEngineID()
    {
        return $this->engineID;
    }

    /**
     * @return an object of class "Park\Engine"
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * @return an object of class "Park\CurrentState", can be null
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return an integer number, can be null
     */
    public function getCompanyID()
    {
        return $this->companyID;
    }

    /**
     * @return a reference to an object of class "Park\Company"
     */
    public function getCompanyURI()
    {
        return $this->companyURI;
    }

    /**
     * @return an object of class "Park\Company", can be null
     */
    public function getCompany()
    {
        if ($this->companyURI !== null && $this->company === null)
            $this->company = \NGS\Patterns\Repository::instance()->find('Park\\Company', $this->companyURI);
        return $this->company;
    }

    /**
     * @return a bool, calculated by server
     */
    public function getMuscleCar()
    {
        return $this->muscleCar;
    }

    /**
     * @return a bool, calculated by server
     */
    public function getOldtimer()
    {
        return $this->oldtimer;
    }

    /**
     * @return a string, calculated by server
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return an integer number, calculated by server
     */
    public function getEnginePowerInWatts()
    {
        return $this->enginePowerInWatts;
    }

    /**
     * Property getter which throws Exceptions on invalid access
     *
     * @param string $name Property name
     *
     * @return mixed
     */
    public function __get($name)
    {
        if ($name === 'URI')
            return $this->getURI(); // a string representing a unique object identifier
        if ($name === 'ID')
            return $this->getID(); // an integer number
        if ($name === 'model')
            return $this->getModel(); // a string
        if ($name === 'year')
            return $this->getYear(); // an integer number
        if ($name === 'engineID')
            return $this->getEngineID(); // a string
        if ($name === 'engine')
            return $this->getEngine(); // an object of class "Park\Engine"
        if ($name === 'state')
            return $this->getState(); // an object of class "Park\CurrentState", can be null
        if ($name === 'companyID')
            return $this->getCompanyID(); // an integer number, can be null
        if ($name === 'companyURI')
            return $this->getCompanyURI(); // a reference to an object of class "Park\Company"
        if ($name === 'company')
            return $this->getCompany(); // an object of class "Park\Company", can be null
        if ($name === 'muscleCar')
            return $this->getMuscleCar(); // a bool, calculated by server
        if ($name === 'oldtimer')
            return $this->getOldtimer(); // a bool, calculated by server
        if ($name === 'description')
            return $this->getDescription(); // a string, calculated by server
        if ($name === 'enginePowerInWatts')
            return $this->getEnginePowerInWatts(); // an integer number, calculated by server

        throw new \InvalidArgumentException('Property "'.$name.'" in class "Park\Vehicle" does not exist and could not be retrieved!');
    }

// ============================================================================

    /**
     * Property existence checker
     *
     * @param string $name Property name to check for existence
     *
     * @return bool will return true if and only if the propery exist and is not null
     */
    public function __isset($name)
    {
        if ($name === 'URI')
            return $this->URI !== null;
        if ($name === 'model')
            return true; // a string (always set)
        if ($name === 'year')
            return true; // an integer number (always set)
        if ($name === 'engine')
            return true; // an object of class "Park\Engine" (always set)
        if ($name === 'state')
            return $this->getState() !== null; // an object of class "Park\CurrentState", can be null
        if ($name === 'company')
            return $this->getCompany() !== null; // an object of class "Park\Company", can be null
        if ($name === 'muscleCar')
            return true; // a bool, calculated by server (always set)
        if ($name === 'oldtimer')
            return true; // a bool, calculated by server (always set)
        if ($name === 'description')
            return true; // a string, calculated by server (always set)
        if ($name === 'enginePowerInWatts')
            return true; // an integer number, calculated by server (always set)

        return false;
    }

    private static $_read_only_properties = array('URI', 'ID', 'engineID', 'companyID', 'companyURI', 'muscleCar', 'oldtimer', 'description', 'enginePowerInWatts');

    /**
     * @param int $value an integer number
     *
     * @return int
     */
    private function setID($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "ID" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toInteger($value);
        $this->ID = $value;
        return $value;
    }

    /**
     * @param string $value a string
     *
     * @return string
     */
    public function setModel($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "model" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toString($value);
        $this->model = $value;
        return $value;
    }

    /**
     * @param int $value an integer number
     *
     * @return int
     */
    public function setYear($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "year" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toInteger($value);
        $this->year = $value;
        return $value;
    }

    /**
     * @param string $value a string
     *
     * @return string
     */
    private function setEngineID($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "engineID" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toString($value);
        $this->engineID = $value;
        return $value;
    }

    /**
     * @param \Park\Engine $value an object of class "Park\Engine"
     *
     * @return \Park\Engine
     */
    public function setEngine($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "engine" cannot be set to null because it is non-nullable!');
        $value = \Park\EngineArrayConverter::fromArray($value);
        $this->engine = $value;
        $this->engineID = $value->serialNumber;
        return $value;
    }

    /**
     * @param \Park\CurrentState $value an object of class "Park\CurrentState", can be null
     *
     * @return \Park\CurrentState
     */
    public function setState($value)
    {
        $value = $value !== null ? \Park\CurrentStateArrayConverter::fromArray($value) : null;
        $this->state = $value;
        return $value;
    }

    /**
     * @param int $value an integer number, can be null
     *
     * @return int
     */
    private function setCompanyID($value)
    {
        $value = $value !== null ? \NGS\Converter\PrimitiveConverter::toInteger($value) : null;
        $this->companyID = $value;
        return $value;
    }

    /**
     * @param \Park\Company $value an object of class "Park\Company", can be null
     *
     * @return \Park\Company
     */
    public function setCompany($value)
    {
        $value = $value !== null ? \Park\CompanyArrayConverter::fromArray($value) : null;
        if ($value !== null && $value->URI === null)
            throw new \InvalidArgumentException('Value of property "company" cannot have URI set to null because it\'s a reference! Reference values must have non-null URIs!');
        $this->company = $value;
        $this->companyURI = $value === null ? null : $value->URI;
        if ($value === null && $this->companyID !== null) {
            $this->companyID = null;
        } elseif ($value !== null) {
            $this->companyID = $value->ID;
        }
        return $value;
    }

    /**
     * Property setter which checks for invalid access to entity properties and enforces proper type checks
     *
     * @param string $name Property name
     * @param mixed $value Property value
     */
    public function __set($name, $value)
    {
        if(in_array($name, self::$_read_only_properties, true))
            throw new \LogicException('Property "'.$name.'" in "Park\Vehicle" cannot be set, because it is read-only!');
        if ($name === 'model')
            return $this->setModel($value); // a string
        if ($name === 'year')
            return $this->setYear($value); // an integer number
        if ($name === 'engine')
            return $this->setEngine($value); // an object of class "Park\Engine"
        if ($name === 'state')
            return $this->setState($value); // an object of class "Park\CurrentState", can be null
        if ($name === 'company')
            return $this->setCompany($value); // an object of class "Park\Company", can be null
        throw new \InvalidArgumentException('Property "'.$name.'" in class "Park\Vehicle" does not exist and could not be set!');
    }

    /**
     * Will unset a property if it exists, but throw an exception if it is not nullable
     *
     * @param string $name Property name to unset (set to null)
     */
    public function __unset($name)
    {
        if(in_array($name, self::$_read_only_properties, true))
            throw new \LogicException('Property "'.$name.'" cannot be unset, because it is read-only!');
        if ($name === 'model')
            throw new \LogicException('The property "model" cannot be unset because it is non-nullable!'); // a string (cannot be unset)
        if ($name === 'year')
            throw new \LogicException('The property "year" cannot be unset because it is non-nullable!'); // an integer number (cannot be unset)
        if ($name === 'engine')
            throw new \LogicException('The property "engine" cannot be unset because it is non-nullable!'); // an object of class "Park\Engine" (cannot be unset)
        if ($name === 'state')
            $this->setState(null);; // an object of class "Park\CurrentState", can be null
        if ($name === 'company')
            $this->setCompany(null);; // an object of class "Park\Company", can be null
    }

    /**
     * Create or update Park\Vehicle instance (server call)
     *
     * @return modified instance object
     */
    public function persist()
    {

        $newObject = parent::persist();
        $this->updateWithAnother($newObject);

        return $this;
    }

    private function updateWithAnother(\Park\Vehicle $result)
    {
        $this->URI = $result->URI;

        $this->model = $result->model;
        $this->year = $result->year;
        $this->engineID = $result->engineID;
        $this->engine = $result->engine;
        $this->state = $result->state;
        $this->companyID = $result->companyID;
        $this->company = $result->company;
        $this->companyURI = $result->companyURI;
        $this->muscleCar = $result->muscleCar;
        $this->oldtimer = $result->oldtimer;
        $this->description = $result->description;
        $this->enginePowerInWatts = $result->enginePowerInWatts;
        $this->ID = $result->ID;
    }

    public function toJson()
    {
        return \Park\VehicleJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \Park\VehicleJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'Park\Vehicle'.$this->toJson();
    }

    public function __clone()
    {
        return \Park\VehicleArrayConverter::fromArray(\Park\VehicleArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \Park\VehicleArrayConverter::toArray($this);
    }

    /**
     * Implementation of the IteratorAggregate interface via \ArrayIterator
     *
     * @return Traversable a new iterator specially created for this iteratation
     */
    public function getIterator()
    {
        return new \ArrayIterator(\Park\VehicleArrayConverter::toArray($this));
    }

    /**
     * Find data using declared specification isMuscleCar
     * Search can be limited by $searchLimit and $searchOffset integer arguments
     *
     * @return array of objects that satisfy specification
     */
    public static function isMuscleCar($searchLimit = null, $searchOffset = null)
    {
        require_once __DIR__.'/Vehicle/isMuscleCar.php';
        $specification = new \Park\Vehicle\isMuscleCar();
        return $specification->search($searchLimit, $searchOffset);
    }

    /**
     * Find data using declared specification hasValidModelLength
     * Search can be limited by $searchLimit and $searchOffset integer arguments
     *
     * @return array of objects that satisfy specification
     */
    public static function hasValidModelLength($searchLimit = null, $searchOffset = null)
    {
        require_once __DIR__.'/Vehicle/hasValidModelLength.php';
        $specification = new \Park\Vehicle\hasValidModelLength();
        return $specification->search($searchLimit, $searchOffset);
    }
}