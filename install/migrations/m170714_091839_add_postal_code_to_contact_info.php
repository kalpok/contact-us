<?php

use yii\db\Migration;

class m170714_091839_add_postal_code_to_contact_info extends Migration
{
    public function up()
    {
        $this->addColumn('contactus_info', 'postalCode', 'string');
    }

    public function down()
    {
        $this->dropColumn('contactus_info', 'postalCode');
        return true;
    }
}
