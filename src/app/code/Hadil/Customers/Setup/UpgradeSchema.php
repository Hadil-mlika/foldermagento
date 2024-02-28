<?php namespace Hadil\Customers\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * Upgrades DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        // Action to do if module version is less than 1.0.0.0
        if (version_compare($context->getVersion(), '1.0.0.0') < 0) {

            /**
             * Create table 'Customer_Contact'
             */

            $tableName = $installer->getTable('customer_contact2');
            $tableComment = 'Contact info about customers ';




            $columns = array(
                'customer_id' => array(
                    'type' => Table::TYPE_INTEGER,
                    'size' => null,
                    'options' => array('identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true),
                    'comment' => 'customer Id',
                ),
                'customer_name' => array(
                    'type' => Table::TYPE_TEXT,
                    'size' => 255,
                    'options' => array('nullable' => false, 'default' => ''),
                    'comment' => ' name of the customer',
                ),

                'customer_email' => array(
                    'type' => Table::TYPE_TEXT,
                    'size' => 255,
                    'options' => array('nullable' => false, 'default' => ''),
                    'comment' => ' email of the customer ',
                ),


                'customer_phonenumber' => array(
                    'type' => Table::TYPE_INTEGER,
                    'size' => 15,  // Vous pouvez ajuster la taille selon les besoins
                    'options' => array('nullable' => false, 'default' => 0),
                    'comment' => 'phone number of the customer',
                ),


                'contact_request' => array(
                    'type' => Table::TYPE_TEXT,
                    'size' => 255,
                    'options' => array('nullable' => false, 'default' => ''),
                    'comment' => 'message of the customer',
                ),


                'contact_response' => array(
                    'type' => Table::TYPE_TEXT,
                    'size' => 255,
                    'options' => array('nullable' => false, 'default' => ''),
                    'comment' => ' response to the customer',
                ),

                'contact_creation_date' => array(
                    'type' => Table::TYPE_DATE,
                    'size' => null,
                    'options' => array('nullable' => false),
                    'comment' => 'creation date of the demand of the customer',
                ),

                'contact_modification_date' => array(
                    'type' => Table::TYPE_DATE,
                    'size' => null,
                    'options' => array('nullable' => false),
                    'comment' => ' modifdate of the demand of the customer',
                ),


                'reason' => array(
                    'type' => Table::TYPE_INTEGER,
                    'size' => null,
                    'options' => array('unsigned' => true, 'nullable' => false),
                    'comment' => 'table customercontact linked to contactreason',
                ),

            );

            $indexes =  array(

            );

            $foreignKeys = array(
                'reason' => array(
                    'ref_table' => 'contact_reason2',
                    'ref_column' => 'reason_id',
                    'on_delete' => Table::ACTION_CASCADE,
                )
            );

            /**
             *  We can use the parameters above to create our table
             */

            // Table creation
            $table = $installer->getConnection()->newTable($tableName);

            // Columns creation
            foreach($columns AS $name => $values){
                $table->addColumn(
                    $name,
                    $values['type'],
                    $values['size'],
                    $values['options'],
                    $values['comment']
                );
            }

            // Indexes creation
            foreach($indexes AS $index){
                $table->addIndex(
                    $installer->getIdxName($tableName, array($index)),
                    array($index)
                );
            }

            // Foreign keys creation
            foreach($foreignKeys AS $column => $foreignKey){
                $table->addForeignKey(
                    $installer->getFkName($tableName, $column, $foreignKey['ref_table'], $foreignKey['ref_column']),
                    $column,
                    $foreignKey['ref_table'],
                    $foreignKey['ref_column'],
                    $foreignKey['on_delete']
                );
            }

            // Table comment
            $table->setComment($tableComment);

            // Execute SQL to create the table
            $installer->getConnection()->createTable($table);
        }

        $installer->endSetup();
    }
}
