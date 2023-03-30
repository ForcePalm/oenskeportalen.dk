<?php
declare(strict_types=1);

namespace AdminTheme\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \AdminTheme\Model\Table\SharedTable&\Cake\ORM\Association\HasMany $Shared
 * @property \AdminTheme\Model\Table\WishlistsTable&\Cake\ORM\Association\HasMany $Wishlists
 * @property \AdminTheme\Model\Table\GroupsTable&\Cake\ORM\Association\BelongsToMany $Groups
 *
 * @method \AdminTheme\Model\Entity\User newEmptyEntity()
 * @method \AdminTheme\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \AdminTheme\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \AdminTheme\Model\Entity\User get($primaryKey, $options = [])
 * @method \AdminTheme\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \AdminTheme\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \AdminTheme\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \AdminTheme\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \AdminTheme\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \AdminTheme\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \AdminTheme\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \AdminTheme\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \AdminTheme\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Shared', [
            'foreignKey' => 'user_id',
            'className' => 'AdminTheme.Shared',
        ]);
        $this->hasMany('Wishlists', [
            'foreignKey' => 'user_id',
            'className' => 'AdminTheme.Wishlists',
        ]);
        $this->belongsToMany('Groups', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'group_id',
            'joinTable' => 'groups_users',
            'className' => 'AdminTheme.Groups',
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
            ->scalar('uuid')
            ->maxLength('uuid', 255)
            ->allowEmptyString('uuid')
            ->add('uuid', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        $validator
            ->date('birthday')
            ->allowEmptyDate('birthday');

        $validator
            ->scalar('reset_request_token')
            ->maxLength('reset_request_token', 255)
            ->allowEmptyString('reset_request_token');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->isUnique(['uuid'], ['allowMultipleNulls' => true]), ['errorField' => 'uuid']);

        return $rules;
    }
}
