<?php

trait AdvancedModelTrait{

    public static function boot() {
        parent::boot();
        static::creating(function ($model) {
            if ($model->incrementing == true) {
                return;
            }
            if ($model->useUuid) {
                $model->{$model->getKeyName()} = $model->generateUuid();
                return;
            }
            if ($model->useUniqueId) {
                if (is_null($model->{$model->getKeyName()})) {
                    $model->{$model->getKeyName()} = $model->generateUniqueId();
                }
                return;
            }
        });
    }

    public static function chunks($perChunk) {
        $total = static::count();
        $numChunks = ceil($total / $perChunk);
        return $numChunks;
    }

    public static function getConnName() {
        $o = new static;
        return $o->connection;
    }

    public static function getTableName() {
        return (new static)->getTable();
    }

    private function generateUniqueId() {
        return date('YmdHis') . substr(explode(" ", microtime())[0], 2, 6);
    }

    function generateUuid() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x', mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0x0fff) | 0x4000, mt_rand(0, 0x3fff) | 0x8000, mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff));
    }
    
    public function trash(){
        $deletedAtKey = static::DELETED_AT;
        $this->$deletedAtKey = date('Y-m-d H:i:s');
        return $this->save();
    }
    
    public function untrash(){
        $deletedAtKey = static::DELETED_AT;
        $this->$deletedAtKey = NULL;
        return $this->save();
    }
}