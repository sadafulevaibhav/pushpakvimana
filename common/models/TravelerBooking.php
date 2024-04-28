<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "traveler_booking".
 *
 * @property int $id
 * @property string $traveler_name
 * @property int $traveler_age
 * @property string $traveler_gender
 * @property string $traveler_passport
 * @property string $booking_date
 * @property int $group_id
 * @property int $package_id
 * @property int $tour_detail_id
 */
class TravelerBooking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'traveler_booking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['traveler_name', 'traveler_age', 'traveler_gender', 'traveler_passport', 'booking_date', 'group_id', 'package_id', 'tour_detail_id'], 'required'],
            [['traveler_age', 'group_id', 'package_id', 'tour_detail_id'], 'integer'],
            [['booking_date'], 'safe'],
            [['traveler_name'], 'string', 'max' => 50],
            [['traveler_gender'], 'string', 'max' => 10],
            [['traveler_passport'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'traveler_name' => 'Traveler Name',
            'traveler_age' => 'Traveler Age',
            'traveler_gender' => 'Traveler Gender',
            'traveler_passport' => 'Traveler Passport',
            'booking_date' => 'Booking Date',
            'group_id' => 'Group ID',
            'package_id' => 'Package ID',
            'tour_detail_id' => 'Tour Detail ID',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TravelerBookingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TravelerBookingQuery(get_called_class());
    }

    public function batchInsert($table, $columns, $rows)
    {
        // $table = $this->db->quoteSql($table);

        $columns = array_map(function ($column) {
            return $this->db->quoteSql($column);
        }, $columns);
        echo "<pre>";print_r(array_values($rows));exit;

        $params = [];
        $sql = $this->db->createCommand()->insert($table,$columns,$rows)->execute();
        // $this->setRawSql($sql);
        // $this->bindValues($params);
        return $this;

	

    }
}
