<?php

namespace App\Http\Controllers\Account\Profile;

use App\Dto\Profile\UpdateProfileData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Services\Profile\ProfileService;
use App\Traits\HasRedirectWithMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UpdateProfileController extends Controller
{
    use HasRedirectWithMessage;

    /**
     * Create a new instance.
     */
    public function __construct(
        private ProfileService $profileService,
    ) {
    }

    /**
     * Update profile info.
     */
    public function __invoke(UpdateProfileRequest $request): RedirectResponse
    {
        /** @var UpdateProfileData $data */
        $data = $request->getData();
        $userId = Auth::id();
        
        $isUpdated = $this->profileService->updateByDataObject($userId, $data);
        
        if (! $isUpdated) {
            return $this->backWithError(__('message.update.failed'));
        }

        return $this->backWithSuccess(__('message.update.success'));
    }
}
