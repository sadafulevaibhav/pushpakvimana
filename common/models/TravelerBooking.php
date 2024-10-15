<?php

namespace common\models;
use yii\data\ActiveDataProvider;

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
   public $full_name =''; 
   public $email =''; 
   public $mobile = '';
   public $whats_app = '';
   public $travel_date = '';
   public $travellers_count = '';
   public $vacation_type = '';
   public $travel_destination = '';
   public $package = '';
   
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
            [['traveler_age', 'group_id', 'package_id', 'tour_detail_id', 'booker_id'], 'integer'],
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
            'booker_id' => 'Booker ID',
            'package' => 'Package'
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

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery|BookerDetails
     */
    public function getBooker()
    {
        return $this->hasOne(BookerDetails::class, ['booker_id' => 'id']);
    }

    public function batchInsert($table, $columns, $rows)
    {
        // $table = $this->db->quoteSql($table);

        $columns = array_map(function ($column) {
            return $this->db->quoteSql($column);
        }, $columns);
        // echo "<pre>";print_r(array_values($rows));exit;

        $params = [];
        $sql = $this->db->createCommand()->insert($table,$columns,$rows)->execute();
        // $this->setRawSql($sql);
        // $this->bindValues($params);
        return $this;

	

    }

     /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public static function findTravellers($booker_id)
    {
        $query = TravelerBooking::find();
        $query->where(['booker_id'=>$booker_id])
           ->all();
       $provider = new ActiveDataProvider([
            'query' => $query,
        ]);
      
        return $provider;

    }
}
