<?php
namespace Todo;

require_once __DIR__.'/MarkDoneJsonConverter.php';
require_once __DIR__.'/MarkDoneArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * @property string $URI a unique object identifier (read-only)
 * @property string $taskURI a string
 *
 * @package Todo
 * @version 0.9.9 beta
 */
class MarkDone extends \NGS\Patterns\DomainEvent
{
    protected $URI;
    protected $taskURI;

    /**
     * Constructs object using a key-property array or instance of class "Todo\MarkDone"
     *
     * @param array|void $data key-property array or instance of class "Todo\MarkDone" or pass void to provide all fields with defaults
     */
    public function __construct($data = array())
    {
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
        if(!array_key_exists('taskURI', $data))
            $data['taskURI'] = ''; // a string
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
        if (array_key_exists('taskURI', $data))
            $this->setTaskURI($data['taskURI']);
        unset($data['taskURI']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "Todo\MarkDone" constructor: '.implode(', ', array_keys($data)));
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
    public function getTaskURI()
    {
        return $this->taskURI;
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
        if ($name === 'taskURI')
            return $this->getTaskURI(); // a string

        throw new \InvalidArgumentException('Property "'.$name.'" in class "Todo\MarkDone" does not exist and could not be retrieved!');
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
        if ($name === 'taskURI')
            return true; // a string (always set)

        return false;
    }

    /**
     * @param string $value a string
     *
     * @return string
     */
    public function setTaskURI($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "taskURI" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toString($value);
        $this->taskURI = $value;
        return $value;
    }

    /**
     * Property setter which checks for invalid access to domain event properties and enforces proper type checks
     *
     * @param string $name Property name
     * @param mixed $value Property value
     */
    public function __set($name, $value)
    {
        if ($name === 'URI')
            throw new \LogicException('Property "URI" in "Todo\MarkDone" cannot be set, because event URI is populated by server!');
        if ($name === 'taskURI')
            return $this->setTaskURI($value); // a string
        throw new \InvalidArgumentException('Property "'.$name.'" in class "Todo\MarkDone" does not exist and could not be set!');
    }

    /**
     * Will unset a property if it exists, but throw an exception if it is not nullable
     *
     * @param string $name Property name to unset (set to null)
     */
    public function __unset($name)
    {
        if ($name === 'URI')
            throw new \LogicException('The property "URI" cannot be unset because event URI is created by server!');
        if ($name === 'taskURI')
            throw new \LogicException('The property "taskURI" cannot be unset because it is non-nullable!'); // a string (cannot be unset)
    }

    public function toJson()
    {
        return \Todo\MarkDoneJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \Todo\MarkDoneJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'Todo\MarkDone'.$this->toJson();
    }

    public function __clone()
    {
        return \Todo\MarkDoneArrayConverter::fromArray(\Todo\MarkDoneArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \Todo\MarkDoneArrayConverter::toArray($this);
    }
}