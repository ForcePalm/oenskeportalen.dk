<?php
declare(strict_types=1);

namespace AdminTheme\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Settings Model
 *
 * @method \AdminTheme\Model\Entity\Setting newEmptyEntity()
 * @method \AdminTheme\Model\Entity\Setting newEntity(array $data, array $options = [])
 * @method \AdminTheme\Model\Entity\Setting[] newEntities(array $data, array $options = [])
 * @method \AdminTheme\Model\Entity\Setting get($primaryKey, $options = [])
 * @method \AdminTheme\Model\Entity\Setting findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \AdminTheme\Model\Entity\Setting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \AdminTheme\Model\Entity\Setting[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \AdminTheme\Model\Entity\Setting|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \AdminTheme\Model\Entity\Setting saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \AdminTheme\Model\Entity\Setting[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \AdminTheme\Model\Entity\Setting[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \AdminTheme\Model\Entity\Setting[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \AdminTheme\Model\Entity\Setting[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SettingsTable extends Table
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

        $this->setTable('settings');
        $this->setDisplayField('id');
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
            ->scalar('site_name')
            ->maxLength('site_name', 255)
            ->notEmptyString('site_name');

        $validator
            ->scalar('site_description')
            ->maxLength('site_description', 255)
            ->notEmptyString('site_description');

        $validator
            ->scalar('site_logo')
            ->maxLength('site_logo', 255)
            ->allowEmptyString('site_logo');

        return $validator;
    }
}
