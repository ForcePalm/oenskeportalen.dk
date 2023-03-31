<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Wishes Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Wish newEmptyEntity()
 * @method \App\Model\Entity\Wish newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Wish[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Wish get($primaryKey, $options = [])
 * @method \App\Model\Entity\Wish findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Wish patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Wish[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Wish|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Wish saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Wish[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Wish[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Wish[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Wish[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class WishesTable extends Table
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

        $this->setTable('wishes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Wishlists', [
            'foreignKey' => 'wishlist_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'reserved_by',
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
            ->notEmptyString('uuid')
            ->add('uuid', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('wishlist_id')
            ->notEmptyString('wishlist_id');

        $validator
            ->scalar('wish_name')
            ->maxLength('wish_name', 255)
            ->notEmptyString('wish_name');

        $validator
            ->scalar('wish_description')
            ->maxLength('wish_description', 4294967295)
            ->notEmptyString('wish_description');

        $validator
            ->numeric('wish_price')
            ->allowEmptyString('wish_price');

        $validator
            ->scalar('wish_link')
            ->maxLength('wish_link', 255)
            ->allowEmptyString('wish_link');

        $validator
            ->scalar('wish_img')
            ->maxLength('wish_img', 255)
            ->allowEmptyString('wish_img');


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
        $rules->add($rules->isUnique(['uuid']), ['errorField' => 'uuid']);
        $rules->add($rules->existsIn('wishlist_id', 'Wishlists'), ['errorField' => 'wishlist_id']);
        $rules->add($rules->existsIn('reserved_by', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
