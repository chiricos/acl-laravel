<?php

namespace cerverus\Repositories;

use cerverus\Entities\Record;

class RecordRepo extends BaseRepo
{

    protected function getModel()
    {
        return new Record();
    }

    public function saveRecord()
    {
        dd("entro");exit;
    }


}