<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    /**
    * Perform pre-authorization checks.
    *
    * @param  \App\Models\User  $user
    * @param  string  $ability
    * @return void|bool
    */
    public function before(User $user, $ability)
    {
        return $user->grantAllActions();
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Book  $book
     * @return mixed
     */
    public function view(User $user, Book $book)
    {
        return $user->id === $book->customer_id;
    }

    /**
     * Determine whether the user can view the invoice of the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Book  $book
     * @return mixed
     */
    public function viewInvoice(User $user, Book $book)
    {
        return $user->id === $book->customer_id && $book->invoice_number != null;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Book  $book
     * @return mixed
     */
    public function update(User $user, Book $book)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Book  $book
     * @return mixed
     */
    public function delete(User $user, Book $book)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Book  $book
     * @return mixed
     */
    public function restore(User $user, Book $book)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Book  $book
     * @return mixed
     */
    public function forceDelete(User $user, Book $book)
    {
        //
    }

    /**
     * Determine whether the user can cancel the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Book  $book
     * @return mixed
     */
    public function cancel(User $user, Book $book)
    {
        return $user->id === $book->customer_id && $book->can_be_canceled;
    }

    /**
     * Determine whether the user can cancel the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Book  $book
     * @return mixed
     */
    public function finish(User $user, Book $book)
    {
        return $user->type === User::ADMIN_TYPE && $book->can_be_finished;
    }

    /**
     * Determine whether the user can cancel the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Book  $book
     * @return mixed
     */
    public function createReview(User $user, Book $book)
    {
        return $user->type === User::CUSTOMER_TYPE && $book->state === 'finished' && $book->review()->count() == 0;
    }
}
