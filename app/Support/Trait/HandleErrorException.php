<?php

namespace App\Support\Trait;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait HandleErrorException
{
    /**
     * @param ValidationException $exception
     *
     * @return JsonResponse
     */
    public function renderApiResponse(ValidationException $exception): JsonResponse
    {
        return response()->json([
            'code' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'message' => trans('status.validation'),
            'errors' => $this->convertApiErrors($exception->errors()),
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @param $errors
     *
     * @return array
     */
    private function convertApiErrors($errors): array
    {
        $result = [];
        foreach ($errors as $k => $error) {
            $result[] = [
                'field' => $k,
                'message' => $error,
            ];
        }

        return $result;
    }

    /**
     * @param NotFoundHttpException|ModelNotFoundException $exception
     * @return JsonResponse
     */
    public function renderApiNotFoundResponse($exception): JsonResponse
    {
        return response()->json([
            'code' => Response::HTTP_NOT_FOUND,
            'message' => trans('status.not_found'),
            'errors' => $exception->getMessage(),
        ], Response::HTTP_NOT_FOUND);
    }

    /**
     * @return JsonResponse
     */
    public function renderNotLoginException(): JsonResponse
    {
        return response()->json([
            'code' => Response::HTTP_UNAUTHORIZED,
            'message' => trans('auth.auth'),
            'errors' => trans('status.not_login'),
        ], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * @param BadRequestHttpException $exception
     *
     * @return JsonResponse
     */
    public function renderApiBadRequestResponse(BadRequestHttpException $exception): JsonResponse
    {
        return response()->json([
            'code' => Response::HTTP_BAD_REQUEST,
            'message' => trans('status.not_found'),
            'errors' => $exception->getMessage(),
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Response server error exception
     *
     * @param $exception
     *
     * @return JsonResponse
     */
    public function renderServerErrorException($exception): JsonResponse
    {
        return response()->json([
            'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
            'message' => null,
            'errors' => $exception->getMessage(),
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * @param $exception
     *
     * @return JsonResponse
     */
    public function renderForbiddenException($exception): JsonResponse
    {
        return response()->json([
            'code' => Response::HTTP_FORBIDDEN,
            'message' => $exception->getMessage(),
        ], Response::HTTP_FORBIDDEN);
    }

    /**
     * @param $exception
     *
     * @return JsonResponse
     */
    public function renderUnknownException($exception): JsonResponse
    {
        return response()->json([
            'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
            'message' => $exception->getMessage(),
        ], Response::HTTP_BAD_GATEWAY);
    }
}
