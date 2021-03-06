<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/bigtable/admin/v2/bigtable_table_admin.proto

namespace Google\Cloud\Bigtable\Admin\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for
 * [google.bigtable.admin.v2.BigtableTableAdmin.GetTable][google.bigtable.admin.v2.BigtableTableAdmin.GetTable]
 *
 * Generated from protobuf message <code>google.bigtable.admin.v2.GetTableRequest</code>
 */
class GetTableRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * The unique name of the requested table.
     * Values are of the form
     * `projects/<project>/instances/<instance>/tables/<table>`.
     *
     * Generated from protobuf field <code>string name = 1;</code>
     */
    private $name = '';
    /**
     * The view to be applied to the returned table's fields.
     * Defaults to `SCHEMA_VIEW` if unspecified.
     *
     * Generated from protobuf field <code>.google.bigtable.admin.v2.Table.View view = 2;</code>
     */
    private $view = 0;

    public function __construct() {
        \GPBMetadata\Google\Bigtable\Admin\V2\BigtableTableAdmin::initOnce();
        parent::__construct();
    }

    /**
     * The unique name of the requested table.
     * Values are of the form
     * `projects/<project>/instances/<instance>/tables/<table>`.
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * The unique name of the requested table.
     * Values are of the form
     * `projects/<project>/instances/<instance>/tables/<table>`.
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * The view to be applied to the returned table's fields.
     * Defaults to `SCHEMA_VIEW` if unspecified.
     *
     * Generated from protobuf field <code>.google.bigtable.admin.v2.Table.View view = 2;</code>
     * @return int
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * The view to be applied to the returned table's fields.
     * Defaults to `SCHEMA_VIEW` if unspecified.
     *
     * Generated from protobuf field <code>.google.bigtable.admin.v2.Table.View view = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setView($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Bigtable\Admin\V2\Table_View::class);
        $this->view = $var;

        return $this;
    }

}

