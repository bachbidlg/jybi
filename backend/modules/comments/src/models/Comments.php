<?php

namespace milkyway\comments\models;

use common\helpers\MyHelper;
use common\models\User;
use milkyway\comments\CommentsModule;
use milkyway\comments\models\table\CommentsTable;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "comments".
*
    * @property int $id
    * @property string $comment
    * @property string $comment_table
    * @property int $comment_id
    * @property int $status 0: Disabled, 1: Published
    * @property int $created_at
    * @property int $created_by
    * @property int $updated_at
    * @property int $updated_by
    * @property array $metadata Other info, ex: name, phone, address,...
    *
            * @property User $createdBy
            * @property User $updatedBy
    */
class Comments extends CommentsTable
{
    public $toastr_key = 'comments';
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                [
                    'class' => BlameableBehavior::class,
                    'createdByAttribute' => 'created_by',
                    'updatedByAttribute' => 'updated_by',
                ],
                'timestamp' => [
                    'class' => 'yii\behaviors\TimestampBehavior',
                    'preserveNonEmptyValues' => true,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                    ],
                ],
            ]
        );
    }

    /**
    * {@inheritdoc}
    */
    public function rules()
    {
        return [
			[['comment', 'comment_table', 'comment_id'], 'required'],
			[['comment'], 'string'],
			[['comment_id', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
			[['metadata'], 'safe'],
			[['comment_table'], 'string', 'max' => 255],
			[['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
			[['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => CommentsModule::t('comments', 'ID'),
            'comment' => CommentsModule::t('comments', 'Comment'),
            'comment_table' => CommentsModule::t('comments', 'Comment Table'),
            'comment_id' => CommentsModule::t('comments', 'Comment ID'),
            'status' => CommentsModule::t('comments', 'Status'),
            'created_at' => CommentsModule::t('comments', 'Created At'),
            'created_by' => CommentsModule::t('comments', 'Created By'),
            'updated_at' => CommentsModule::t('comments', 'Updated At'),
            'updated_by' => CommentsModule::t('comments', 'Updated By'),
            'metadata' => CommentsModule::t('comments', 'Metadata'),
        ];
    }
}
