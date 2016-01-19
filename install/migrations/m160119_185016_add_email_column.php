<?php

use yii\db\Schema;
use yii\db\Migration;

class m160119_185016_add_email_column extends Migration
{
    public function up()
    {
        $this->addColumn('contactus_department', 'email', 'string');
    }

    public function down()
    {
        echo "m150831_123357_add_gallery_column_to_page cannot be reverted.\n";

        return false;
    }
}
