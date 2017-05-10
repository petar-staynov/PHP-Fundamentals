<?php


namespace Data;


class IndexViewData
{

    private $errors = null;

    private $formData = [];

    /**
     * @return null
     */
    public function getError()
    {
        return $this->errors;
    }

    /**
     * @return array
     */
    public function getFormData()
    {
        return $this->formData;
    }

    /**
     * @param null $errors
     */
    public function setError($errors)
    {
        $this->errors = $errors;
    }

    /**
     * @param array $formData
     */
    public function setFormData(array $formData)
    {
        $this->formData = $formData;
    }



}