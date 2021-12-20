<?php

namespace App\Http\Controllers\Account\Profile;

use App\Dto\Profile\UpdatePasswordData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdatePasswordRequest;
use App\Services\Profile\ProfileService;
use App\Traits\HasRedirectWithMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UpdatePasswordController extends Controller
{
    use HasRedirectWithMessage;

    /**
     * Create a new instance.
     */
    public function __construct(
        private ProfileService $profileService,
    ) {}

    /**
     * Update profile info.
     */
    public function __invoke(UpdatePasswordRequest $request): RedirectResponse
    {
        /** @var UpdatePasswordData $data */
        $data = $request->getData();
        $userId = Auth::id();

        $isUpdated = $this->profileService->updatePasswordByDataObject($userId, $data);

        if (! $isUpdated) {
            return $this->backWithError(__('message.update.failed'));
        }

        return $this->backWithSuccess(__('message.update.success'));
    }
}
