<?php
declare(strict_types=1);

namespace AdminTheme\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Groups Model
 *
 * @property \AdminTheme\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \AdminTheme\Model\Entity\Group newEmptyEntity()
 * @method \AdminTheme\Model\Entity\Group newEntity(array $data, array $options = [])
 * @method \AdminTheme\Model\Entity\Group[] newEntities(array $data, array $options = [])
 * @method \AdminTheme\Model\Entity\Group get($primaryKey, $options = [])
 * @method \AdminTheme\Model\Entity\Group findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \AdminTheme\Model\Entity\Group patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \AdminTheme\Model\Entity\Group[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \AdminTheme\Model\Entity\Group|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \AdminTheme\Model\Entity\Group saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \AdminTheme\Model\Entity\Group[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \AdminTheme\Model\Entity\Group[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \AdminTheme\Model\Entity\Group[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \AdminTheme\Model\Entity\Group[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class GroupsTable extends Table
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

        $this->setTable('groups');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Users', [
            'foreignKey' => 'group_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'groups_users',
            'className' => 'AdminTheme.Users',
        ]);
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
            ->scalar('group_name')
            ->maxLength('group_name', 255)
            ->notEmptyString('group_name');

        return $validator;
    }
}
