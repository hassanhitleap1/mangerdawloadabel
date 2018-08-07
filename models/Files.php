<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $path_file
 * @property string $create_at
 * @property string $update_at
 */
class Files extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'],'required'],
            [['description'], 'string'],
            [['create_at', 'update_at'], 'safe'],
            [['title', 'path_file'], 'string', 'max' => 255],
            [['file'], 'file','skipOnEmpty' => false],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'path_file' => Yii::t('app', 'Path_File'),
            'create_at' => Yii::t('app', 'Create_At'),
            'update_at' => Yii::t('app', 'Update_At'),
            'file' => Yii::t('app', 'File'),
        ];
    }

    /**
     * @inheritdoc
     * @return FilesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FilesQuery(get_called_class());
    }


    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->create_at = date('Y-m-d h:m:s');
            } else {
                $this->update_at = date('Y-m-d h:m:s');
            }

            return true;
        } else {
            return false;
        }
    }
}
