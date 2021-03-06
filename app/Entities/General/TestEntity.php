<?php

namespace App\Entities\General;


use App\Entities\BaseEntity;
use App\Interfaces\Repositories\General\TestRepositoryInterface;
use Illuminate\Support\Facades\App;

class TestEntity extends BaseEntity
{
    protected $table = 'tests';

    /**
     * @return TestRepositoryInterface
     */
    public function getRepo()
    {
        $repo= App::make(TestRepositoryInterface::class);
        return $repo->setEntity($this);
    }

    public function tag()
    {
        return $this->belongsTo(TagEntity::class, 'tag_id');
    }

    public function methods()
    {
        return $this->hasMany(MethodEntity::class, 'test_id');
    }

    /**
     * ACCESSORS
     */

    public function getSortNameClassAttribute()
    {
        $pieces= explode('\\', $this->class);
        return end($pieces);
    }

}
