<?php

namespace App\Http\Resources;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class QuestionResource extends JsonResource
{
    // Response from db to Laravel server ->Resource -> response to client
    // of course, it works ONLY if we use it, e.g., in show() method. Like return new QuestionResource($question);

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
//         not so bad solution. In my case, it returns just everything I want, but with milliseconds (which I don't want)
//        $created = $this->created_at;
//        if($created!=null){
//            $created = new DateTime($created, );
//        }

        /*
         * i.e., I need custom GLOBAL date serializer
         * // should not use it as global... Ok, and what? Take response?
        Carbon::serializeUsing(function ($date) {
            return [
                'date' => $date->toDateTimeString(),
                'timezone_type' => $date->timezone_type,
                'timezone' => $date->tzName,
            ];
        });*/

        return [
            'id' =>$this->id,
            'title' =>$this->title,
            'path' =>$this->path,
            'body' =>$this->body,
            'created' => $this->created_at->diffForHumans(),
//            'modified' =>$this->modified_at,
            'user' =>$this->user->name,
        ];
    }
}
