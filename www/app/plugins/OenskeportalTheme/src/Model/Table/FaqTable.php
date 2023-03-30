<?php
declare(strict_types=1);

namespace OenskeportalTheme\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Faq Model
 *
 * @method \OenskeportalTheme\Model\Entity\Faq newEmptyEntity()
 * @method \OenskeportalTheme\Model\Entity\Faq newEntity(array $data, array $options = [])
 * @method \OenskeportalTheme\Model\Entity\Faq[] newEntities(array $data, array $options = [])
 * @method \OenskeportalTheme\Model\Entity\Faq get($primaryKey, $options = [])
 * @method \OenskeportalTheme\Model\Entity\Faq findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \OenskeportalTheme\Model\Entity\Faq patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \OenskeportalTheme\Model\Entity\Faq[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \OenskeportalTheme\Model\Entity\Faq|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \OenskeportalTheme\Model\Entity\Faq saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \OenskeportalTheme\Model\Entity\Faq[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \OenskeportalTheme\Model\Entity\Faq[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \OenskeportalTheme\Model\Entity\Faq[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \OenskeportalTheme\Model\Entity\Faq[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FaqTable extends Table
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

        $this->setTable('faq');
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
