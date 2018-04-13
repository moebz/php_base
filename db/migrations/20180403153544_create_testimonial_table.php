<?php


use Phinx\Migration\AbstractMigration;

class CreateTestimonialTable extends AbstractMigration
{
    public function up ()
    {

        $testimonials = $this->table('testimonials');
        $testimonials->addColumn('title', 'string')
        ->addColumn('testimonial', 'text')
        ->addColumn('user_id', 'integer')
        ->addForeignKey('user_id', 'users', 'id', ['delete' => 'cascade', 'update' => 'cascade'])
        ->addColumn('created_at', 'timestamp', ['default' => "CURRENT_TIMESTAMP"])
        ->addColumn('updated_at', 'timestamp', ['null' => true])
        ->save();

    }

    public function down ()
    {
        
        //$this->dropTable('testimonials');

    }
}
