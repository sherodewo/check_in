<?php
/**
 * Created by PhpStorm.
 * User: huzairuje
 * Date: 2/27/19
 * Time: 4:39 PM
 */

namespace App\Library;

use Exception;

class ApiBaseResponse
{
    protected $LIMIT = 10;

    public function listPaginate($collection, $limit)
    {
        $return = [];
        $paginated = $collection->paginate($limit);
        $return['meta']['error'] = 0;
        $return['meta']['status'] = 200;
        $return['meta']['message'] = trans('message.api.success');
        $return['meta']['total'] = $paginated->total();
        $return['meta']['per_page'] = $paginated->perPage();
        $return['meta']['current_page'] = $paginated->currentPage();
        $return['meta']['last_page'] = $paginated->lastPage();
        $return['meta']['has_more_pages'] = $paginated->hasMorePages();
        $return['meta']['from'] = $paginated->firstItem();
        $return['meta']['to'] = $paginated->lastItem();
        $return['links']['self'] = url()->full();
        $return['links']['next'] = $paginated->nextPageUrl();
        $return['links']['prev'] = $paginated->previousPageUrl();
        $return['data'] = $paginated->items();
        return $return;
    }

    public function singleData($data, array $relations)
    {
        $return = [];
        $return['meta']['error'] = 0;
        $return['meta']['status'] = 200;
        $return['meta']['message'] = trans('message.api.success');
        $return['data'] = $data;
        $return = $this->generateRelations($return, $relations);
        return $return;
    }

    private function generateRelations($return, $relations)
    {
        if (isset($relations)) {
            foreach ($relations as $key => $relation) {
                $return['data'][$key] = $relation;
            }
        }
        return $return;
    }

    public function successResponse($id)
    {
        $return = [];
        $return['meta']['error'] = 0;
        $return['meta']['status'] = 200;
        $return['meta']['message'] = trans('message.api.success');
        $return['data']['id'] = $id;
        return $return;
    }

    public function errorResponse(Exception $e)
    {
        $return = [];
        $return['meta']['status'] = 500;
        $return['meta']['message'] = trans('message.api.error');
        $return['meta']['error'] = $e->getMessage();
        return $return;
    }

    public function notFoundResponse()
    {
        $return = [];
        $return['meta']['status'] = 404;
        $return['meta']['message'] = trans('message.api.notFound');
        return $return;
    }

    public function validationFailResponse($errors)

    {
        $result = call_user_func_array("array_merge", $errors);

        for ($i = 0; $i < count($result); $i++) {
            if ($i == count($result) - 1) {
                $s = rtrim($result[$i], ".");
                $dt[] = $s . ".";
            } else {
                $dt[] = rtrim($result[$i], ".");
            }
        }

        $res = implode(",", $dt);

        $return = [];
        $return['meta']['status'] = 400;
        $return['meta']['message'] = trans('message.api.badRequest');
        $return['result'] = $res;


        return $return;
    }

    public function unauthorizedResponse()
    {
        $return = [];
        $return['meta']['status'] = 401;
        $return['meta']['message'] = trans('message.api.unauthorized');
        return $return;
    }

    public function whereDoYouGo()
    {
        $return = [];
        $return['meta']['status'] = 401;
        $return['meta']['message'] = trans('message.api.whereDoYouGo');
        return $return;
    }

    public function badRequest($errors)
    {
        $return = [];
        $return['meta']['status'] = 400;
        $return['meta']['message'] = trans('message.api.badRequest');
        $return['data'] = $errors;
        return $return;
    }

    public function invalidToken($errors)
    {
        $return = [];
        $return['meta']['status'] = 401;
        $return['meta']['message'] = trans('message.api.invalidToken');
        $return['data'] = $errors;
        return $return;
    }

    public function unProcessableEntity($errors)
    {
        $return = [];
        $return['meta']['status'] = 422;
        $return['meta']['message'] = trans('message.api.unProcessableEntity');
        $return['data'] = $errors;
        return $return;
    }

    public function status($status, $message, $data)
    {
        $return = [];
        $return['meta']['status'] = $status;
        $return['meta']['message'] = $message;
        $return['data'] = $data;
        return $return;
    }

    public function statusCode($status_code, $result, $message)
    {
        $return = [];
        $return['meta']['status_code'] = $status_code;
        $return['meta']['result'] = $result;
        $return['meta']['message'] = $message;
        return $return;
    }

    public function codeStatus($code, $status, $result)
    {
        $return = [];
        $return['meta']['code'] = $code;
        $return['meta']['status'] = $status;
        $return['meta']['result'] = $result;
        return $return;
    }

    public function codeStatusData($code, $status, $data)
    {
        $return = [];
        $return['meta']['code'] = $code;
        $return['meta']['status'] = $status;
        $return['data'] = $data;
        return $return;
    }

    public function roomRespone( $code, $status, $name)
    {
        $return = [];
        $return['meta']['code'] = $code;
        $return['meta']['status'] = $status;
        $return['data'] ['name'] = $name;

        return $return;
    }

    public function ok()
    {
        $return = [];
        $return['status'] = 'Alive and OK';
        return $return;
    }
}
