<?php

namespace App;

class Room
{
    /**
     * @var array
     */
    protected $people = [];

    /**
     * Constructor. Fill the room with the given people.
     *
     * @param array $people
     */
    public function __construct($people = [])
    {
        $this->people = $people;
    }

    /**
     * Check if the specified person is in the room.
     *
     * @param string $person
     * @return bool
     */
    public function has($person)
    {
        return in_array($person, $this->people);
    }

    /**
     * Add a new person to the room.
     *
     * @param string $person
     * @return array
     */
    public function add($person)
    {
        array_push($this->people, $person);
        return $this->people;
    }

    /**
     * Remove a person from the room.
     *
     * @param string $person
     * @return array
     */
    public function remove($person)
    {
        if (($key = array_search($person, $this->people)) !== false) {
            unset($this->people[$key]);
        }
        return $this->people;
    }
}
