<?php

class AdvancedCamelCaseModel extends \Illuminate\Database\Eloquent\Model
{

    use AdvancedModelTrait;

    protected $primaryKey = 'Id';
    public $incrementing = false;
    public $timestamps = true;
    public $useUuid = false;
    public $useUniqueId = false;

    /**
     * The name of the "created at" column.
     * @var string
     */
    const CREATED_AT = 'CreatedAt';

    /**
     * The name of the "updated at" column.
     * @var string
     */
    const UPDATED_AT = 'UpdatedAt';

    /**
     * The name of the "deleted at" column.
     * @var string
     */
    const DELETED_AT = 'DeletedAt';
}
