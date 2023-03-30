<?php
declare(strict_types=1);

namespace OenskeportalTheme\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Shared Model
 *
 * @property \App\Model\Table\WishlistsTable&\Cake\ORM\Association\BelongsTo $Wishlists
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Shared newEmptyEntity()
 * @method \App\Model\Entity\Shared newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Shared[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Shared get($primaryKey, $options = [])
 * @method \App\Model\Entity\Shared findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Shared patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Shared[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Shared|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Shared saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Shared[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Shared[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Shared[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Shared[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SharedTable extends Table
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

        $this->setTable('shared');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Wishlists', [
            'foreignKey' => 'id',
            'bindingKey' => 'wishlist_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
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
            ->integer('wishlist_id')
            ->notEmptyString('wishlist_id');

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

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
        $rules->add($rules->existsIn('wishlist_id', 'Wishlists'), ['errorField' => 'wishlist_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
