<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    private bool $success;
    private int $statusCode;

    /**
     * __construct
     * 
     * @param   bool    $success
     * @param   mixed   $resource
     * @return  void
     */
    public function __construct(bool $success, mixed $resource, int $statusCode = 200)
    {
        parent::__construct($resource);
        $this->success = $success;
        $this->statusCode = $statusCode;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode($this->statusCode);
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'success' => $this->success,
            'message' => $this->when(!$this->success, $this->resource),
            'meta' => $this->when($this->success, [
                'description' => '',
                'total' => $this->resource->count()
            ]),
            'data' => $this->when($this->success, $this->resource)
        ];
    }
}
