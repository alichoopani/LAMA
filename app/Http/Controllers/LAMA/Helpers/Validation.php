<?php


namespace App\Http\Controllers\LAMA\Helpers;


class Validation
{

    private $response = [
        'status' => true,
        'errors' => []
    ];
    private $data;
    private $rulesItems;

    public function __construct($data, $rulesItems)
    {
        $this->data = $data;
        $this->rulesItems = $rulesItems;
        $this->Validation();
    }

    private function Validation() {
        //make loop in rules items
        foreach ($this->rulesItems as $ruleKey => $rulesItem) {
            $this->response['errors'][$ruleKey] = [];
            $rulesForThisItem = explode('|', $rulesItem);
            foreach ($rulesForThisItem as $rule) {
                $rule = explode(':', $rule);
                $validationMethod = (method_exists($this, 'Validate' . ucfirst($rule[0]))) ? 'Validate' . ucfirst($rule[0]) : 'UnavailableMethod';
                if (!isset($this->data[$ruleKey]))
                    $this->setError($ruleKey, 404);
                else
                    $this->$validationMethod($ruleKey, $this->data[$ruleKey], (isset($rule[1])) ? $rule[1] : null);

            }
        }
    }


    private function ValidateMinLength($label, $data, $param) {
        if (strlen($data) < $param)
            $this->setError($label, 4020);
    }


    private function ValidateMaxLength($label, $data, $param) {
        if (strlen($data) > $param)
            $this->setError($label, 4010);
    }

    private function ValidateIsEmail($label, $data, $param) {
        if (!filter_var($data, FILTER_VALIDATE_EMAIL))
            $this->setError($label, 5001);
    }

    private function ValidateNotNull($label, $data,$param) {
        if (strlen($data) < 1)
            $this->setError($label, 3001);
    }

    private function ValidateIsNumeric($label, $data,$param) {
        if (!is_numeric($data))
            $this->setError($label, 2001);
    }

    private function ValidateNumberBetween($label, $data,$param) {
        $params = explode('-', $param);
        if ((int)$data < (int)$params[0] || (int)$data > (int)$params[1])
            $this->setError($label, 2010, $param);
    }


    private function ValidateLengthBetween($label, $data, $param) {
        $params = explode('-', $param);
        if (strlen($data) < (int)$params[0] || strlen($data) > (int)$params[1])
            $this->setError($label, 4030, $param);
    }

    private function Validate() {}

    private function ValidateUnique($label, $data, $param) {
        $params = explode('.', $param);

        $entityName = '\App\Entities\\' . ucfirst($params[0]);
        if (class_exists($entityName)) {
            $entity = new $entityName();
            $countData = $entity->where([$params[1] => $data])->count();
            if ($countData > 0)
                $this->setError($label, 4032);
        } else {
            $this->setError($label, 4031);
        }

    }















    private function UnavailableMethod($label, $data, $param) {
        $this->setError($label, 405);
    }



    private function setError($label, $errorID, $param = null) {
        $this->response['errors'][$label][] = $errorID;
        $this->response['status'] = false;
    }

    public function getErrors() {
        return $this->response['errors'];
    }

    public function getStatus() {
        return $this->response['status'];
    }

}
