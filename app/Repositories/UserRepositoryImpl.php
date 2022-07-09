<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use stdClass;
use TheSource\Domain\Contracts\Exceptions\EntityNotFoundException;
use TheSource\Domain\Contracts\Repositories\User\UserCommandsRepository;
use TheSource\Domain\Contracts\Repositories\User\UserQueriesRepository;
use TheSource\Domain\Entities\User;
use TheSource\Domain\ValueObjects\EmailAddress;

class UserRepositoryImpl implements UserCommandsRepository, UserQueriesRepository
{
    public function insert(User $user): void
    {
        $values = [
            'name' => $user->getPersonName()->getFirstName(),
            'email' => $user->getEmailAddress()->getFullAddress(),
            'password' => $user->getHashedPassword(),
            'email_verified_at' => $user->getEmailVerifiedAt()?->format('Y-m-d H:i:s'),
        ];
        DB::table('users')->insert($values);
    }

    public function update(User $user): void
    {
        $values = [
            'name' => $user->getPersonName()->getFirstName(),
            'email' => $user->getEmailAddress()->getFullAddress(),
            'password' => $user->getHashedPassword(),
            'email_verified_at' => $user->getEmailVerifiedAt()?->format('Y-m-d H:i:s'),
        ];
        DB::table('users')->where('id', $user->getId())->update($values);
    }

    public function deleteById(int $id): void
    {
        DB::table('users')->delete($id);
    }

    public function findById(int $id): User
    {
        $userRecord = DB::table('users')->find($id);
        if (!$userRecord) {
            throw new EntityNotFoundException();
        }
        return $this->getUserFromRecord($userRecord);
    }

    public function findByEmail(EmailAddress $emailAddress): User
    {
        $userRecord = DB::table('users')->where('email', $emailAddress->getFullAddress())->first();
        if (!$userRecord) {
            throw new EntityNotFoundException();
        }
        return $this->getUserFromRecord($userRecord);
    }

    public function getAll(): array
    {
        $userRecords = DB::table('users')->get();
        $users = [];
        foreach ($userRecords as $userRecord) {
            $users[] = $this->getUserFromRecord($userRecord);
        }
        return $users;
    }

    private function getUserFromRecord(stdClass $userRecord): User
    {
        $user = new User();
        $user->setId($userRecord->id);
        $user
            ->setPersonName($userRecord->name, '')
            ->setEmailAddress($userRecord->email)
            ->setHashedPassword($userRecord->password);

        if ($userRecord->email_verified_at) {
            $user->setEmailVerifiedAt($userRecord->email_verified_at);
        }
        if ($userRecord->created_at) {
            $user->setCreatedAt($userRecord->created_at);
        }
        if ($userRecord->updated_at) {
            $user->setUpdatedAt($userRecord->updated_at);
        }

        return $user;
    }


}
