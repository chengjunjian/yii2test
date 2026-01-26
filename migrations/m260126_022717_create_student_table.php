<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student}}`.
 */
class m260126_022717_create_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'age' => $this->integer()->unsigned()->notNull(),
            'gender' => "ENUM('M', 'F') NOT NULL",
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        // Insert test data
        $this->batchInsert('{{%student}}', ['name', 'age', 'gender'], [
            ['张三', 20, 'M'],
            ['李四', 21, 'M'],
            ['王五', 19, 'F'],
            ['赵六', 22, 'M'],
            ['钱七', 20, 'F'],
            ['孙八', 23, 'M'],
            ['周九', 20, 'F'],
            ['吴十', 21, 'M'],
            ['郑十一', 22, 'M'],
            ['陈十二', 19, 'F'],
            ['李十三', 24, 'M'],
            ['王十四', 20, 'F'],
            ['刘十五', 21, 'M'],
            ['黄十六', 22, 'M'],
            ['赵十七', 18, 'F'],
            ['吴十八', 25, 'M'],
            ['郑十九', 20, 'M'],
            ['陈二十', 21, 'F'],
            ['李二十一', 23, 'M'],
            ['王二十二', 19, 'M'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%student}}');
    }
}
