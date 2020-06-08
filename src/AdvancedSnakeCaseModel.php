<?php

class AdvancedSnakeCaseModel extends \Illuminate\Database\Eloquent\Model
{

    use AdvancedModelTrait;

    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = true;
    public $useUuid = false;
    public $useUniqueId = false;

    /**
     * The name of the "created at" column.
     * @var string
     */
    const CREATED_AT = 'created_at';

    /**
     * The name of the "updated at" column.
     * @var string
     */
    const UPDATED_AT = 'updated_at';

    /**
     * The name of the "deleted at" column.
     * @var string
     */
    const DELETED_AT = 'deleted_at';
}
