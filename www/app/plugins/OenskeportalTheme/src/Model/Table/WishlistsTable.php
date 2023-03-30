<?php
declare(strict_types=1);

namespace OenskeportalTheme\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Wishlists Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\SharedTable&\Cake\ORM\Association\HasMany $Shared
 * @property \App\Model\Table\WishesTable&\Cake\ORM\Association\HasMany $Wishes
 *
 * @method \OenskeportalTheme\Model\Entity\Wishlist newEmptyEntity()
 * @method \OenskeportalTheme\Model\Entity\Wishlist newEntity(array $data, array $options = [])
 * @method \OenskeportalTheme\Model\Entity\Wishlist[] newEntities(array $data, array $options = [])
 * @method \OenskeportalTheme\Model\Entity\Wishlist get($primaryKey, $options = [])
 * @method \OenskeportalTheme\Model\Entity\Wishlist findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \OenskeportalTheme\Model\Entity\Wishlist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \OenskeportalTheme\Model\Entity\Wishlist[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \OenskeportalTheme\Model\Entity\Wishlist|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \OenskeportalTheme\Model\Entity\Wishlist saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \OenskeportalTheme\Model\Entity\Wishlist[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \OenskeportalTheme\Model\Entity\Wishlist[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \OenskeportalTheme\Model\Entity\Wishlist[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \OenskeportalTheme\Model\Entity\Wishlist[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class WishlistsTable extends Table
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

        $this->setTable('wishlists');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'Users',
        ]);
        $this->hasMany('Shared', [
            'foreignKey' => 'wishlist_id',
            'className' => 'OenskeportalTheme.Shared',
        ]);
        $this->hasMany('Wishes', [
            'foreignKey' => 'wishlist_id',
            'className' => 'OenskeportalTheme.Wishes',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 4294967295)
            ->notEmptyString('description');

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
        $rules->add($rules->isUnique(['uuid']), ['errorField' => 'uuid']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
