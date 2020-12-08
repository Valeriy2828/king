<?php


namespace App\Repositories;

use Config;

abstract class Repository
{
    protected $model = FALSE;

    public function get($select = '*',$take = FALSE,$pagination = FALSE,$where = FALSE){

        $builder = $this->model->select($select);

        if($take){
            $builder->take($take);
        }

        if($where){
            $builder->where($where[0],$where[1]);
        }

        if($pagination){
            $page = 4;
            return $this->check($builder->paginate($page));
        }

        return $this->check($builder->get());
    }

    protected function check($result){
        if($result->isEmpty()){
            return FALSE;
        }

        $result->transform(function ($item, $key){

            if(is_string($item->img) && is_object(json_decode($item->img)) && (json_last_error() == JSON_ERROR_NONE)){
                $item->img = json_decode($item->img);
            }

            if(is_string($item->title) && is_object(json_decode($item->title)) && (json_last_error() == JSON_ERROR_NONE)){
                $item->title = json_decode($item->title);
            }

            if(is_string($item->desc) && is_object(json_decode($item->desc)) && (json_last_error() == JSON_ERROR_NONE)){
                $item->desc = json_decode($item->desc);
            }

            if(is_string($item->director) && is_object(json_decode($item->director)) && (json_last_error() == JSON_ERROR_NONE)){
                $item->director = json_decode($item->director);
            }

            if(is_string($item->customer) && is_object(json_decode($item->customer)) && (json_last_error() == JSON_ERROR_NONE)){
                $item->customer = json_decode($item->customer);
            }

            if(is_string($item->text) && is_object(json_decode($item->text)) && (json_last_error() == JSON_ERROR_NONE)){
                $item->text = json_decode($item->text);
            }
            if(is_string($item->year) && is_object(json_decode($item->year)) && (json_last_error() == JSON_ERROR_NONE)){
                $item->year = json_decode($item->year);
            }

            return $item;
        });

        return $result;
    }

    public function one($alias,$attr = []){
        $result = $this->model->where('slug',$alias)->first();

        return $result;
    }
}