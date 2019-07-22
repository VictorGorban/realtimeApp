<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        $name = $this->name;
//        if(!isset($name)){
//            $name = $this->username;
//        }

        $this->name=$this->username;

        // todo: полностью похуй на это. Почему? Надо спросить на SO

        return [
            'id' =>$this->id,
            'name' =>$this->name,
            'email' =>$this->email,
            'password' =>$this->password,
        ];
    }
}
