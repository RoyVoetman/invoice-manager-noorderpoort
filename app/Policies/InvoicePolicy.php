<?php

namespace App\Policies;

use App\Models\Invoice;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class InvoicePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Invoice $invoice
     * @return Response|bool
     */
    public function view(User $user, Invoice $invoice)
    {
        return $user->role_id === Role::OWNER
            || $user->id === $invoice->debtor_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        return $user->role_id === Role::OWNER;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Invoice $invoice
     * @return Response|bool
     */
    public function update(User $user, Invoice $invoice)
    {
        return $user->role_id === Role::OWNER;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Invoice $invoice
     * @return Response|bool
     */
    public function delete(User $user, Invoice $invoice)
    {
        return $user->role_id === Role::OWNER;
    }
}
