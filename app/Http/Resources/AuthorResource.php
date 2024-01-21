<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
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
    public function __construct(mixed $resource)
    {
        parent::__construct($resource);
        // $this->success = $success;
        // $this->statusCode = $statusCode;
        $this->success = true;
        $this->statusCode = 200;
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
     * Check whether the data is plural.
     */
    // private function isPluralResource(): bool
    // {
    //     return collect($this->resource)->count() > 1;
    // }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // dd($this);
        // return ['posts' => $this->name ];
        return parent::toArray($request);

        // return collect($this->resource)->merge(['posts' => PostResource::collection($this->whenLoaded('posts'))])->toArray();

        // return [
        //     'id' => $this->id,
        //     'name' => $this->name,
        //     'username' => $this->username,
        //     'email' => $this->email,
        //     'email_verified_at' => $this->email_verified_at,
        //     'password' => $this->password,
        //     'remember_token' => $this->remember_token,
        //     'created_at' => $this->created_at,
        //     'updated_at' => $this->updated_at
        // ];
    }
}