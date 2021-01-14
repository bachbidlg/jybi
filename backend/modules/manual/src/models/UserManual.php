<?php

namespace milkyway\manual\models;

use common\helpers\MyHelper;
use common\models\User;
use milkyway\manual\ManualModule;
use milkyway\manual\models\table\UserManualTable;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "user_manual".
 *
 * @property int $id
 * @property string $title Tiêu đề
 * @property int $for_permission
 * @property string $description Mô tả
 * @property string $content Hướng dẫn sử dụng
 * @property int $status Trạng thái: 0 - disalbed, 1 - published
 * @property int $sort Th
 * @property int $created_at Ngày tạo
 * @property int $created_by Người tạo
 * @property int $updated_at Ngày cập nhật
 * @property int $updated_by Người cập nhật
 *
 * @property PermissionManual $forPermission
 */
class UserManual extends UserManualTable
{
    public $toastr_key = 'user-manual';

    /**
     * @return array
     */
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
     * @return array
     */
    public function rules()
    {
        return [
            [['title', 'for_permission'], 'required'],
            [['for_permission', 'status', 'sort', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            ['sort', 'default', 'value' => 0],
            [['content'], 'string'],
            [['title', 'description'], 'string', 'max' => 255],
            [['for_permission'], 'exist', 'skipOnError' => true, 'targetClass' => PermissionManual::class, 'targetAttribute' => ['for_permission' => 'id']],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => ManualModule::t('manual', 'ID'),
            'title' => ManualModule::t('manual', 'Title'),
            'for_permission' => ManualModule::t('manual', 'For Permission'),
            'description' => ManualModule::t('manual', 'Description'),
            'content' => ManualModule::t('manual', 'Content'),
            'status' => ManualModule::t('manual', 'Status'),
            'sort' => ManualModule::t('manual', 'Sort'),
            'created_at' => ManualModule::t('manual', 'Created At'),
            'created_by' => ManualModule::t('manual', 'Created By'),
            'updated_at' => ManualModule::t('manual', 'Updated At'),
            'updated_by' => ManualModule::t('manual', 'Updated By'),
        ];
    }
}
