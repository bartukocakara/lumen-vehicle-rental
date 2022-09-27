<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;

class ReservationTest extends TestCase
{
    private const API_PREFIX = 'api';
    private const API_VERSION = 'v1';
    private const TAX_RATE = 0.08;

    public function test_reservation_create() : void
    {
        $payload = $this->createorUpdateDataPrepare();
        $insert = DB::table('reservations')->insert([
                'vehicle_id' => $payload['vehicle_id'],
                'user_id' => $payload['user_id'],
                'from_location' => $payload['from_location'],
                'to_location' => $payload['to_location'],
                'from_date' => $payload['from_date'],
                'to_date' => $payload['to_date'],
                'tax_price' => $payload['tax_price'],
                'sub_total' => $payload['sub_total'],
                'grand_total' => $payload['grand_total'],
            ]);
        $headers = [
            'Accept' => 'application/json',
        ];
        $test = $this->call('POST', self::API_PREFIX . DIRECTORY_SEPARATOR .
                                    self::API_VERSION . DIRECTORY_SEPARATOR .
                                    'reservations', $payload, $headers);
        $test->assertJson(json_decode($test->getContent(), true));
        $test->assertStatus(200);
    }

    public function test_reservation_list() : void
    {
        $headers = [
            'Accept' => 'application/json',
        ];
        $test = $this->call('GET', self::API_PREFIX . DIRECTORY_SEPARATOR .
                                     self::API_VERSION . DIRECTORY_SEPARATOR .
                                    'reservations' );
        $test->assertJson(json_decode($test->getContent(), true));
        $test->assertStatus(200);
    }

    public function test_reservation_show() : void
    {
        $reservationId = Reservation::first()->id;

        $headers = [
            'Accept' => 'application/json',
        ];
        $test = $this->call('GET', self::API_PREFIX . DIRECTORY_SEPARATOR .
                                    self::API_VERSION . DIRECTORY_SEPARATOR .
                                    'reservations' . DIRECTORY_SEPARATOR . $reservationId, $headers);
        $test->assertJson(json_decode($test->getContent(), true));
        $test->assertStatus(200);
    }

    public function test_reservation_update() : void
    {
        $payload = $this->createorUpdateDataPrepare();
        $reservationId = DB::table('reservations')->first()->id;

        $headers = [
            'Accept' => 'application/json',
        ];
        $test = $this->call('PUT', self::API_PREFIX . DIRECTORY_SEPARATOR .
                                    self::API_VERSION . DIRECTORY_SEPARATOR .
                                    'reservations' . DIRECTORY_SEPARATOR . $reservationId,
                                     $payload, $headers);
        $test->assertJson(json_decode($test->getContent(), true));
        $test->assertStatus(200);
    }

    public function test_reservation_delete() : void
    {
        $reservationId = Reservation::first()->id;

        $headers = [
            'Accept' => 'application/json',
        ];
        $test = $this->call('PUT', self::API_PREFIX . DIRECTORY_SEPARATOR .
                                    self::API_VERSION . DIRECTORY_SEPARATOR .
                                    'reservations' . DIRECTORY_SEPARATOR . $reservationId, $headers);
        $test->assertJson(json_decode($test->getContent(), true));
        $test->assertStatus(200);
    }

    public function createorUpdateDataPrepare()
    {
        $vehicle = DB::table('vehicles')->first()->id;
        $vehicleId = $vehicle->id;
        $subTotal = $vehicle->price;
        $taxPrice = $subTotal * self::TAX_RATE;
        $grandTotal = $taxPrice + $subTotal;
        $userId = DB::table('users')->first()->id;
        $longitude = floatval(
            filter_var(
              rand(-90, 90),
              FILTER_SANITIZE_NUMBER_FLOAT
            )
        );
        $latitude = floatval(
            filter_var(
              rand(-90, 90),
              FILTER_SANITIZE_NUMBER_FLOAT
            )
        );
        $fromLocation = [
            'longitude' => $longitude,
            'latitude' => $latitude
        ];
        $toLocation = [
            'longitude' => $longitude,
            'latitude' => $latitude
        ];

        $toLocation = [
            'longitude' => $longitude,
            'latitude' => $latitude
        ];
        $fromDate = date('Y-m-d', time());
        $toDate = date('Y-m-d', time());
        $payload = [
            'vehicle_id' => $vehicleId,
            'user_id' => $userId,
            'from_location' => $fromLocation,
            'to_location' => $toLocation,
            'from_date' => $fromDate,
            'to_date' => $toDate,
            'tax_price' => $taxPrice,
            'sub_total' => $subTotal,
            'grand_total' => $grandTotal,
        ];
        return $payload;
    }
}
