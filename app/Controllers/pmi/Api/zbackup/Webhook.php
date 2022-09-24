<?php

namespace App\Controllers\Api;

/**
* Developer: https://bocahganteng.com/ M. Ali Imron
* Company: https://digitalorbittechnology.com/
* Product: https://trackingnesia.com/
* Directur: https://ummukhairiyahyusna.com/
*/

use CodeIgniter\RESTful\ResourceController;
// use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\Files\UploadedFile;
use App\Models\WebhookModel;

class Webhook extends ResourceController
{
    public function __construct()
    {
        $this->WebhookModel = new WebhookModel();
    }

    // protected $request;

    // public function __construct(RequestInterface $request)
    // {
    //     $this->request = $request;
    // }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        // 
        echo "OK";
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        // $additional = $this->request->getVar('additional');
        // if ($additional) {
        //     $overspeed_speed = $additional->overspeed_speed;
        // }else{
        //     $overspeed_speed = null;
        // }

        $data = [
            "user_id"  => $this->request->getVar('user_id'),
            "alert_id"  => $this->request->getVar('alert_id'),
            "device_id"  => $this->request->getVar('device_id'),
            "geofence_id"  => $this->request->getVar('geofence_id'),
            "poi_id"  => $this->request->getVar('poi_id'),
            "altitude"  => $this->request->getVar('altitude'),
            "course"  => $this->request->getVar('course'),
            "latitude"  => $this->request->getVar('latitude'),
            "longitude"  => $this->request->getVar('longitude'),
            "speed"  => $this->request->getVar('speed'),
            "time"  => $this->request->getVar('time'),
            "additional" => $this->request->getVar('additional'),
            "message" => $this->request->getVar('message'),
            "type" => $this->request->getVar('type'),
            "position_id" => $this->request->getVar('position_id'),
            "name" => $this->request->getVar('name'),
            "detail" => $this->request->getVar('detail'),
            "user"
            "address"
            "device"
            "icon_colors"
            "active"
            "deleted"
            "name"
            "imei"
            "fuel_measurement_id"
            "fuel_quantity"
            "fuel_price"
            "fuel_per_km"
            "sim_number"
            "msisdn"
            "device_model"
            "plate_number"
            "vin"
            "registration_number"
            "object_owner"
            "additional_notes"
            "expiration_date"
            "sim_expiration_date"
            "sim_activation_date"
            "installation_date"
            "tail_color": "#33cc33",
            "tail_length": 5,
            "engine_hours": "gps",
            "detect_engine": "gps",
            "min_moving_speed": 6,
            "min_fuel_fillings": 10,
            "min_fuel_thefts": 10,
            "snap_to_road": 0,
            "gprs_templates_only": 0,
            "valid_by_avg_speed": 1,
            "parameters": "[\"event\",\"sat\",\"gsm\",\"hdop\",\"odometer\",\"runtime\",\"mcc\",\"mnc\",\"lac\",\"cid\",\"status\",\"adc1\",\"adc2\",\"adc3\",\"battery\",\"power\",\"eventdata\",\"fuel\",\"devicetime\",\"fixtime\",\"valid\",\"enginehours\"]",
            "currents": {
                "geofences": []
            },
            "created_at": "2017-07-04 12:24:27",
            "updated_at": "2021-09-24 09:13:25",
            "forward": null,
            "device_type_id": null,
            "stop_duration": "0s"
            },
            "geofence": null,
            "sensors": [
        ];

        echo json_encode($data);

        // $insert = $this->WebhookModel->insert($data);

        // $jsonArray = json_decode(file_get_contents('php://input'),true); 
        // $jsonArray = json_decode($this->input->raw_input_stream, true);
        // $requestBody = $this->request->getBody();

        // echo $message->getBody();

        // $method = $this->request->getMethod();

        // echo $method;
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}


// {
//     "user_id": 1,
//     "alert_id": 595,
//     "device_id": 136,
//     "geofence_id": null,
//     "poi_id": null,
//     "altitude": "45",
//     "course": "131",
//     "latitude": "25.206735",
//     "longitude": "51.229231",
//     "speed": "93.00",
//     "time": "2021-12-30 11:11:13",
//     "additional": {
//         "overspeed_speed": 90
//     },
//     "message": "Overspeed (90 kph)",
//     "type": "overspeed",
//     "position_id": 5235155,
//     "name": "Overspeed",
//     "detail": "90 kph",
//     "user": {
//         "id": 1,
//         "email": "admin@gpswox.com",
//         "phone_number": "+370000000"
//     },
//     "address": "Rawdat Rashed Road, Rawdat Rashed, Jariyan Al Batnah, Qatar",
//     "device": {
//         "id": 136,
//         "user_id": null,
//         "current_driver_id": 37,
//         "timezone_id": null,
//         "traccar_device_id": 136,
//         "icon_id": 0,
//     "icon_colors": {
//         "moving": "green",
//         "stopped": "yellow",
//         "offline": "red",
//         "engine": "yellow"
//     },
//     "active": 1,
//     "deleted": 0,
//     "name": "Demo 13",
//     "imei": "100000013",
//     "fuel_measurement_id": 1,
//     "fuel_quantity": "0.00",
//     "fuel_price": "0.00",
//     "fuel_per_km": "0.0000",
//     "sim_number": "",
//     "msisdn": null,
//     "device_model": "",
//     "plate_number": "",
//     "vin": "",
//     "registration_number": "",
//     "object_owner": "",
//     "additional_notes": "",
//     "expiration_date": null,
//     "sim_expiration_date": "0000-00-00",
//     "sim_activation_date": "0000-00-00",
//     "installation_date": "0000-00-00",
//     "tail_color": "#33cc33",
//     "tail_length": 5,
//     "engine_hours": "gps",
//     "detect_engine": "gps",
//     "min_moving_speed": 6,
//     "min_fuel_fillings": 10,
//     "min_fuel_thefts": 10,
//     "snap_to_road": 0,
//     "gprs_templates_only": 0,
//     "valid_by_avg_speed": 1,
//     "parameters": "[\"event\",\"sat\",\"gsm\",\"hdop\",\"odometer\",\"runtime\",\"mcc\",\"mnc\",\"lac\",\"cid\",\"status\",\"adc1\",\"adc2\",\"adc3\",\"battery\",\"power\",\"eventdata\",\"fuel\",\"devicetime\",\"fixtime\",\"valid\",\"enginehours\"]",
//     "currents": {
//         "geofences": []
//     },
//     "created_at": "2017-07-04 12:24:27",
//     "updated_at": "2021-09-24 09:13:25",
//     "forward": null,
//     "device_type_id": null,
//     "stop_duration": "0s"
//     },
//     "geofence": null,
//     "sensors": [
//         {
//             "id": 334,
//             "type": "satellites",
//             "name": "Satellites",
//             "value": "7",
//             "unit": "",
//             "formatted": "7"
//         },
//         {
//             "id": 335,
//             "type": "gsm",
//             "name": "GSM",
//             "value": 100,
//             "unit": "%",
//             "formatted": "100 %"
//         },
//         {
//             "id": 336,
//             "type": "odometer",
//             "name": "Odometer",
//             "value": 29988.165,
//             "unit": "km",
//             "formatted": "29988 km"
//         },
//         {
//             "id": 337,
//             "type": "engine_hours",
//             "name": "Runtime",
//             "value": "23391882",
//             "unit": "s",
//             "formatted": "23391882 s"
//         },
//         {
//             "id": 338,
//             "type": "battery",
//             "name": "Battery",
//             "value": 0.35,
//             "unit": "%",
//             "formatted": "0.35 %"
//         },
//         {
//             "id": 360,
//             "type": "door",
//             "name": "23440108",
//             "value": true,
//             "unit": "",
//             "formatted": "Opened"
//         }
//     ]
// }