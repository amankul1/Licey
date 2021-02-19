<?php

class OrtEntity{
    private $id;
    private $name;
    private $fullName;

    public function __construct(){}

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }


}
