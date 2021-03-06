<?php
namespace Account;

require_once __DIR__.'/ProfileJsonConverter.php';
require_once __DIR__.'/ProfileArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * @property string $URI a unique object identifier (read-only)
 * @property string $userEmail a string
 * @property string $description a string
 * @property \NGS\LocalDate $created a date
 *
 * @package Account
 * @version 0.9.9 beta
 */
class Profile extends \NGS\Patterns\AggregateRoot implements \IteratorAggregate
{
    protected $URI;
    protected $userEmail;
    protected $description;
    protected $created;

    /**
     * Constructs object using a key-property array or instance of class "Account\Profile"
     *
     * @param array|void $data key-property array or instance of class "Account\Profile" or pass void to provide all fields with defaults
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
        if(!array_key_exists('userEmail', $data))
            $data['userEmail'] = ''; // a string
        if(!array_key_exists('description', $data))
            $data['description'] = ''; // a string
        if(!array_key_exists('created', $data))
            $data['created'] = new \NGS\LocalDate(); // a date
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
        if (array_key_exists('userEmail', $data))
            $this->setUserEmail($data['userEmail']);
        unset($data['userEmail']);
        if (array_key_exists('description', $data))
            $this->setDescription($data['description']);
        unset($data['description']);
        if (array_key_exists('created', $data))
            $this->setCreated($data['created']);
        unset($data['created']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "Account\Profile" constructor: '.implode(', ', array_keys($data)));
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
     * @return a string
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @return a string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return a date
     */
    public function getCreated()
    {
        return $this->created;
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
        if ($name === 'userEmail')
            return $this->getUserEmail(); // a string
        if ($name === 'description')
            return $this->getDescription(); // a string
        if ($name === 'created')
            return $this->getCreated(); // a date

        throw new \InvalidArgumentException('Property "'.$name.'" in class "Account\Profile" does not exist and could not be retrieved!');
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
        if ($name === 'userEmail')
            return true; // a string (always set)
        if ($name === 'description')
            return true; // a string (always set)
        if ($name === 'created')
            return true; // a date (always set)

        return false;
    }

    private static $_read_only_properties = array('URI');

    /**
     * @param string $value a string
     *
     * @return string
     */
    public function setUserEmail($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "userEmail" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toString($value);
        $this->userEmail = $value;
        return $value;
    }

    /**
     * @param string $value a string
     *
     * @return string
     */
    public function setDescription($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "description" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toString($value);
        $this->description = $value;
        return $value;
    }

    /**
     * @param \NGS\LocalDate $value a date
     *
     * @return \NGS\LocalDate
     */
    public function setCreated($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "created" cannot be set to null because it is non-nullable!');
        $value = new \NGS\LocalDate($value);
        $this->created = $value;
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
            throw new \LogicException('Property "'.$name.'" in "Account\Profile" cannot be set, because it is read-only!');
        if ($name === 'userEmail')
            return $this->setUserEmail($value); // a string
        if ($name === 'description')
            return $this->setDescription($value); // a string
        if ($name === 'created')
            return $this->setCreated($value); // a date
        throw new \InvalidArgumentException('Property "'.$name.'" in class "Account\Profile" does not exist and could not be set!');
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
        if ($name === 'userEmail')
            throw new \LogicException('The property "userEmail" cannot be unset because it is non-nullable!'); // a string (cannot be unset)
        if ($name === 'description')
            throw new \LogicException('The property "description" cannot be unset because it is non-nullable!'); // a string (cannot be unset)
        if ($name === 'created')
            throw new \LogicException('The property "created" cannot be unset because it is non-nullable!'); // a date (cannot be unset)
    }

    /**
     * Create or update Account\Profile instance (server call)
     *
     * @return modified instance object
     */
    public function persist()
    {

        $newObject = parent::persist();
        $this->updateWithAnother($newObject);

        return $this;
    }

    private function updateWithAnother(\Account\Profile $result)
    {
        $this->URI = $result->URI;

        $this->userEmail = $result->userEmail;
        $this->description = $result->description;
        $this->created = $result->created;
    }

    public function toJson()
    {
        return \Account\ProfileJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \Account\ProfileJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'Account\Profile'.$this->toJson();
    }

    public function __clone()
    {
        return \Account\ProfileArrayConverter::fromArray(\Account\ProfileArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \Account\ProfileArrayConverter::toArray($this);
    }

    /**
     * Implementation of the IteratorAggregate interface via \ArrayIterator
     *
     * @return Traversable a new iterator specially created for this iteratation
     */
    public function getIterator()
    {
        return new \ArrayIterator(\Account\ProfileArrayConverter::toArray($this));
    }
}