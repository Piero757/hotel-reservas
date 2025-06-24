<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="Hotel Reservas API",
 *     version="1.0.0",
 *     description="API para gestionar reservas de hoteles."
 * )
 * @OA\Server(
 *     url=L5_SWAGGER_CONST_HOST,
 *     description="Base URL"
 * )
 */
class OpenApiAnnotations
{
}
