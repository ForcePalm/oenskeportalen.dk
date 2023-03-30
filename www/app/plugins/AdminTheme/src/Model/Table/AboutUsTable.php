<?php
declare(strict_types=1);

namespace AdminTheme\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AboutUs Model
 *
 * @method \AdminTheme\Model\Entity\AboutU newEmptyEntity()
 * @method \AdminTheme\Model\Entity\AboutU newEntity(array $data, array $options = [])
 * @method \AdminTheme\Model\Entity\AboutU[] newEntities(array $data, array $options = [])
 * @method \AdminTheme\Model\Entity\AboutU get($primaryKey, $options = [])
 * @method \AdminTheme\Model\Entity\AboutU findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \AdminTheme\Model\Entity\AboutU patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \AdminTheme\Model\Entity\AboutU[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \AdminTheme\Model\Entity\AboutU|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \AdminTheme\Model\Entity\AboutU saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \AdminTheme\Model\Entity\AboutU[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \AdminTheme\Model\Entity\AboutU[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \AdminTheme\Model\Entity\AboutU[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \AdminTheme\Model\Entity\AboutU[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AboutUsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('about_us');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->notEmptyString('title');

        $validator
            ->scalar('content')
            ->maxLength('content', 4294967295)
            ->notEmptyString('content');

        return $validator;
    }
}
