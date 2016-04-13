<?php

use yii\db\Migration;

class m160413_081658_create_requests extends Migration
{
    public function up()
    {
        $this->createTable('request', [
            'id' => $this->primaryKey(),
            'userid' => $this->integer(11)->notNull(),
            'urgency' => $this->integer(11)->defaultValue(0),
            'description' => $this->text()->notNull(),
            'tel' => $this->string(55)->notNull(),
        ]);

        $this->addForeignKey(
            'FK_user', '{{%request}}', 'userid', '{{%user}}', 'id'
        );
    }

    public function down()
    {
        $this->dropTable('requests');
    }
}
