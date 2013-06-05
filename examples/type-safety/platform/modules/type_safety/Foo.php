<?php
namespace type_safety;

require_once __DIR__.'/FooJsonConverter.php';
require_once __DIR__.'/FooArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * @property string $URI a unique object identifier (read-only)
 * @property int $ID autogenerated by server (read-only)
 * @property string $bar a string
 *
 * @package type_safety
 * @version 0.9.9 beta
 */
class Foo extends \NGS\Patterns\AggregateRoot implements \IteratorAggregate
{
    protected $URI;
    protected $ID;
    protected $bar;

    /**
     * Constructs object using a key-property array or instance of class "type_safety\Foo"
     *
     * @param array|void $data key-property array or instance of class "type_safety\Foo" or pass void to provide all fields with defaults
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
        if(!array_key_exists('bar', $data))
            $data['bar'] = ''; // a string
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
        if (array_key_exists('bar', $data))
            $this->setBar($data['bar']);
        unset($data['bar']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "type_safety\Foo" constructor: '.implode(', ', array_keys($data)));
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
    public function getBar()
    {
        return $this->bar;
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
        if ($name === 'bar')
            return $this->getBar(); // a string

        throw new \InvalidArgumentException('Property "'.$name.'" in class "type_safety\Foo" does not exist and could not be retrieved!');
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
        if ($name === 'bar')
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
    public function setBar($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "bar" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toString($value);
        $this->bar = $value;
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
            throw new \LogicException('Property "'.$name.'" in "type_safety\Foo" cannot be set, because it is read-only!');
        if ($name === 'bar')
            return $this->setBar($value); // a string
        throw new \InvalidArgumentException('Property "'.$name.'" in class "type_safety\Foo" does not exist and could not be set!');
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
        if ($name === 'bar')
            throw new \LogicException('The property "bar" cannot be unset because it is non-nullable!'); // a string (cannot be unset)
    }

    /**
     * Create or update type_safety\Foo instance (server call)
     *
     * @return modified instance object
     */
    public function persist()
    {

        $newObject = parent::persist();
        $this->updateWithAnother($newObject);

        return $this;
    }

    private function updateWithAnother(\type_safety\Foo $result)
    {
        $this->URI = $result->URI;

        $this->bar = $result->bar;
        $this->ID = $result->ID;
    }

    public function toJson()
    {
        return \type_safety\FooJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \type_safety\FooJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'type_safety\Foo'.$this->toJson();
    }

    public function __clone()
    {
        return \type_safety\FooArrayConverter::fromArray(\type_safety\FooArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \type_safety\FooArrayConverter::toArray($this);
    }

    /**
     * Implementation of the IteratorAggregate interface via \ArrayIterator
     *
     * @return Traversable a new iterator specially created for this iteratation
     */
    public function getIterator()
    {
        return new \ArrayIterator(\type_safety\FooArrayConverter::toArray($this));
    }
}