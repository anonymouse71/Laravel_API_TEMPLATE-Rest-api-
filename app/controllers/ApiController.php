<?php

use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use Illuminate\Pagination\Paginator;

class ApiController extends BaseController {

    protected $statusCode = 200;

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    protected function respondWithPagination(Paginator $lessons, $data){
        //protected function respondWithPagination($lessons, $data){

        $data = array_merge($data, [
            'paginator' => [
                'total_count' => $lessons->getTotal(),
                'total_pages' => ceil($lessons->getTotal() / $lessons->getPerPage()),
                'current_page' => $lessons->getCurrentPage(),
                'limit' => $lessons->getPerPage()
            ]

        ]);
        return $this->respond($data);


        //'data' => $this->lessonTransformer->transformCollection($lessons->toArray())

    }

    public function respondNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(SymfonyResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }



    public function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }



    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

    public function respondCreated($message)
    {
        return $this->setStatusCode(201)
            ->respond([
                'message' => $message
            ]);
    }
}