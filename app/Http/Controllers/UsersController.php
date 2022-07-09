<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use TheSource\Application\UseCases\User\CreateUser\CreateUserUseCase;
use TheSource\Application\UseCases\User\CreateUser\InputBoundary as CreateUserInputBoundary;
use TheSource\Application\UseCases\User\DeleteUser\DeleteUserUseCase;
use TheSource\Application\UseCases\User\DeleteUser\InputBoundary as DeleteUserInputBoundary;
use TheSource\Application\UseCases\User\GetAllUsers\GetAllUsersUseCase;
use TheSource\Application\UseCases\User\GetAllUsers\InputBoundary as GetAllUsersInputBoundary;
use TheSource\Application\UseCases\User\GetUser\GetUserUseCase;
use TheSource\Application\UseCases\User\GetUser\InputBoundary as GetUserInputBoundary;
use TheSource\Application\UseCases\User\UpdateUser\InputBoundary as UpdateUserInputBoundary;
use TheSource\Application\UseCases\User\UpdateUser\UpdateUserUseCase;
use TheSource\Domain\Contracts\Exceptions\EntityNotFoundException;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, GetAllUsersUseCase $useCase)
    {
        $input = new GetAllUsersInputBoundary();
        $output = $useCase->handle($input);
        return Response::json([
            'message' => $output->getMessage(),
            'data' => $output->toArray(),
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, GetUserUseCase $useCase, $id)
    {
        $input = new GetUserInputBoundary($id);
        try {
            $output = $useCase->handle($input);
            return Response::json([
                'message' => $output->getMessage(),
                'data' => $output->toArray(),
            ], 200);
        } catch (EntityNotFoundException $notFoundEx) {
            return Response::json([], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CreateUserUseCase $useCase)
    {
        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $emailAddress = $request->input('email_address');
        $password = $request->input('password');

        $input = new CreateUserInputBoundary($firstName, $lastName, $emailAddress, $password);
        $output = $useCase->handle($input);
        return Response::json(['message' => $output->getMessage()], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpdateUserUseCase $useCase, $id)
    {
        $newValues = [];
        if ($request->has('first_name')) {
            $newValues['firstName'] = $request->input('first_name');
        }
        if ($request->has('last_name')) {
            $newValues['lastName'] = $request->input('last_name');
        }
        if ($request->has('email_address')) {
            $newValues['emailAddress'] = $request->input('email_address');
        }
        if ($request->has('password')) {
            $newValues['password'] = $request->input('password');
        }

        $input = new UpdateUserInputBoundary($id, $newValues);
        try {
            $output = $useCase->handle($input);
            return Response::json(['message' => $output->getMessage()], 200);
        } catch (EntityNotFoundException $notFoundEx) {
            return Response::json([], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, DeleteUserUseCase $useCase, $id)
    {
        $input = new DeleteUserInputBoundary($id);
        try {
            $output = $useCase->handle($input);
            return Response::json(['message' => $output->getMessage()], 200);
        } catch (EntityNotFoundException $notFoundEx) {
            return Response::json([], 404);
        }
    }
}
