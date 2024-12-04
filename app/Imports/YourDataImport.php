<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToArray;

class YourDataImport implements ToArray
{
    private $data = [];

    public function array(array $array)
    {
        // Store the array data
        $this->data = $array;
    }

    // Optional: A getter to retrieve the array after processing
    public function getData(): array
    {
        $data=$this->data;
        if (count($data) >= 2) {
        $keys = $data[0];
        $result = [];
        for ($i = 1; $i < count($data); $i++) {
            $result[] = array_combine($keys, $data[$i]);
        }
        } else {
            $result = [];
        }
        return $result;
    }
}


