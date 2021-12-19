<?php

namespace App\Http\Controllers\Profile;

use App\Dto\Profile\UpdatePasswordData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdatePasswordRequest;
use App\Services\Profile\ProfileService;
use App\Traits\HasRedirectWithMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdatePasswordController extends Controller
{
    use HasRedirectWithMessage;

    /**
     * Update profile info.
     */
    public function __invoke(ProfileService $profileService, UpdatePasswordRequest $request): RedirectResponse
    {
        /** @var UpdatePasswordData $data */
        $data = $request->getData();
        $userId = Auth::id();

        $isUpdated = $profileService->updatePasswordByDataObject($userId, $data);

        if (! $isUpdated) {
            return $this->backWithError(__('message.update.failed'));
        }

        return $this->backWithSuccess(__('message.update.success'));
    }
}
