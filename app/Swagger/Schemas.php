<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Reservation",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="user_id", type="integer"),
 *     @OA\Property(property="room_id", type="integer"),
 *     @OA\Property(property="check_in", type="string", format="date"),
 *     @OA\Property(property="check_out", type="string", format="date")
 * )
 *
 * @OA\Schema(
 *     schema="Room",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="description", type="string"),
 *     @OA\Property(property="price", type="number", format="float")
 * )
 */
class Schemas {}
