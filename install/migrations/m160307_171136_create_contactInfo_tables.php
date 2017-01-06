<?php

use yii\db\Migration;

class m160307_171136_create_contactInfo_tables extends Migration
{
    public function up()
    {
        $this->createTable('contactus_info', array(
            'id' => 'pk',
            'title' => 'string COLLATE utf8_unicode_ci DEFAULT "اطلاعات تماس"',
            'motto' => 'string COLLATE utf8_unicode_ci',
            'fax' => 'string COLLATE utf8_unicode_ci',
            'openHour' => 'string COLLATE utf8_unicode_ci',
            'email' => 'string COLLATE utf8_unicode_ci',
            'address' => 'text COLLATE utf8_unicode_ci',
            'phone' => 'string COLLATE utf8_unicode_ci',
            'description' => 'text COLLATE utf8_unicode_ci'
        ));
    }

    public function down()
    {
        $this->dropTable('contactus_info');
    }
}
