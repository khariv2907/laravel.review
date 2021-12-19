<?php

namespace App\Http\Controllers\Profile;

use App\Dto\Profile\UpdateProfileData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Services\Profile\ProfileService;
use App\Traits\HasRedirectWithMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateProfileController extends Controller
{
    use HasRedirectWithMessage;

    /**
     * Update profile info.
     */
    public function __invoke(ProfileService $profileService, UpdateProfileRequest $request)
    {
        /** @var UpdateProfileData $data */
        $data = $request->getData();
        $userId = Auth::id();
        
        $isUpdated = $profileService->updateByDataObject($userId, $data);
        
        if (! $isUpdated) {
            return $this->backWithError(__('message.update.failed'));
        }

        return $this->backWithSuccess(__('message.update.success'));
    }
}
