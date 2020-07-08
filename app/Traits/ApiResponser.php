<?php 

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

trait ApiResponser{
    public function getCurrentLang(){
        return app()->getLocale();
    }


    private function successResponse($key,$value,$msg=""){
        return response()->json([
            'status' => true ,
            'errNum' => "S000",
            'msg'  => $msg,
            $key => $value
        ]);
    }

    protected function successMessage($succNum,$msg,$code=200){
        return response()->json([
            'status' => true ,
            'errNum' => $succNum,
            'msg'  => $msg
        ],$code);
    }
    
    protected function errorResponse($errNum,$msg,$code){
        return response()->json([
            'status' => false ,
            'errNum' => $errNum,
            'msg'  => $msg
        ],$code);
    }

    protected function showAll($key,Collection $collection, $code=200){
        if($collection->isEmpty()){
                return $this->successResponse($key,$collection,$code);
            }
        $transformer = $collection->first()->transformer;
        $collection = $this->filterData($collection,$transformer);
        //$collection = $this->sortData($collection,$transformer);
        $collection= $this->paginate($collection);
        //$collection = $this->cacheResponse($collection);
        return $this->successResponse($key,$collection, $code);
    }

    protected function showOne($key,Model $instance , $code=200){
       $transformer = $instance->transformer;
       $instance = $this->transformData($instance,$transformer);
       return $this->successResponse($key,$instance,$code);
    } 

    protected function transformData($data,$transformer)
    {
        $transformation = fractal($data,new $transformer);
        return $transformation->toArray()['data'];
    }


    private function sortData(Collection $collection,$transformer)
    {
        if(request()->has('sort_by')){
            $attribute = $transformer::originAttribute(request()->get('sort_by'));
            $collection = $collection->sortBy->{$attribute};
        }
        return $collection;
    }

    private function paginate(Collection $collection){

        $rules = [
            'per_page' => 'integer|min:2|max:50',
        ];
        request()->validate($rules);
        $perPage =15;

        if(request()->has('per_page')){
            $perPage = (int) request()->per_page;
        }
        $page = LengthAwarePaginator::resolveCurrentPage();
        
        $result = $collection->slice(($page-1)*$perPage,$perPage)->values();
        $paginated= new  LengthAwarePaginator($result,$collection->count(),$perPage,$page,[
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);
            // for another attribute as sort_by , filter 
        $paginated->appends(request()->all());    
        return $paginated;
    }

    private function cacheResponse($data){
        $url = request()->url();
        
        return Cache::remember($url, 30/60, function()use($data){
            return $data;
        });
    }

}

?>