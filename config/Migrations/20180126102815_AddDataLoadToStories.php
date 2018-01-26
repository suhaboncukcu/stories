<?php
use Migrations\AbstractMigration;

class AddDataLoadToStories extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('stories');
        $table->addColumn('data_load', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->update();
    }
}
