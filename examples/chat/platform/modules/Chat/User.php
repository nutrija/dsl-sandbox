<?php
namespace Chat;

require_once __DIR__.'/UserJsonConverter.php';
require_once __DIR__.'/UserArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * @property string $URI a unique object identifier (read-only)
 * @property int $ID autogenerated by server (read-only)
 * @property string $name a string
 *
 * @package Chat
 * @version 0.9.9 beta
 */
class User extends \NGS\Patterns\AggregateRoot implements \IteratorAggregate
{
    protected $URI;
    protected $ID;
    protected $name;

    /**
     * Constructs object using a key-property array or instance of class "Chat\User"
     *
     * @param array|void $data key-property array or instance of class "Chat\User" or pass void to provide all fields with defaults
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
        if(!array_key_exists('name', $data))
            $data['name'] = ''; // a string
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
        if (array_key_exists('name', $data))
            $this->setName($data['name']);
        unset($data['name']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "Chat\User" constructor: '.implode(', ', array_keys($data)));
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
    public function getName()
    {
        return $this->name;
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
        if ($name === 'name')
            return $this->getName(); // a string

        throw new \InvalidArgumentException('Property "'.$name.'" in class "Chat\User" does not exist and could not be retrieved!');
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
        if ($name === 'name')
            return true; // a string (always set)

        return false;
    }

    private static $_read_only_properties = array('URI', 'ID');

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
    public function setName($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "name" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toString($value);
        $this->name = $value;
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
            throw new \LogicException('Property "'.$name.'" in "Chat\User" cannot be set, because it is read-only!');
        if ($name === 'name')
            return $this->setName($value); // a string
        throw new \InvalidArgumentException('Property "'.$name.'" in class "Chat\User" does not exist and could not be set!');
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
        if ($name === 'name')
            throw new \LogicException('The property "name" cannot be unset because it is non-nullable!'); // a string (cannot be unset)
    }

    /**
     * Create or update Chat\User instance (server call)
     *
     * @return modified instance object
     */
    public function persist()
    {

        $newObject = parent::persist();
        $this->updateWithAnother($newObject);

        return $this;
    }

    private function updateWithAnother(\Chat\User $result)
    {
        $this->URI = $result->URI;

        $this->name = $result->name;
        $this->ID = $result->ID;
    }

    public function toJson()
    {
        return \Chat\UserJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \Chat\UserJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'Chat\User'.$this->toJson();
    }

    public function __clone()
    {
        return \Chat\UserArrayConverter::fromArray(\Chat\UserArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \Chat\UserArrayConverter::toArray($this);
    }

    /**
     * Implementation of the IteratorAggregate interface via \ArrayIterator
     *
     * @return Traversable a new iterator specially created for this iteratation
     */
    public function getIterator()
    {
        return new \ArrayIterator(\Chat\UserArrayConverter::toArray($this));
    }
}