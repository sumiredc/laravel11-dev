import {
    ProfileUploadInputViewModel,
    ProfileUploadInputViewModelI,
} from "@/view-models/profile/profile-upload-input-view-model";
import { ProfileImageContainerViewI } from "@/views/profile/profile-image-container-view";
import { ProfileUploadInputViewI } from "@/views/profile/profile-upload-input-view";

type ChangeEvent = {
    target: {
        files: FileList;
        dataset: { userId: string };
    };
} & Event;

export interface ProfileUploadInputDataBindI {}

export class ProfileUploadInputDataBind implements ProfileUploadInputDataBindI {
    /**
     * @param {ProfileUploadInputViewI} inputView
     */
    static bind(
        inputView: ProfileUploadInputViewI,
        profileImageContainerView: ProfileImageContainerViewI
    ) {
        if (inputView.exists()) {
            new ProfileUploadInputDataBind(
                inputView.element,
                new ProfileUploadInputViewModel(
                    profileImageContainerView.element
                )
            );
        }
    }

    /**
     * @param {HTMLInputElement} inputEl
     * @param {ProfileUploadInputViewModelI} viewModel
     */
    constructor(
        private readonly _inputEl: HTMLInputElement,
        private readonly _viewModel: ProfileUploadInputViewModelI
    ) {
        this._attachEvent();
    }

    private _attachEvent() {
        const viewModel = this._viewModel;

        this._inputEl.addEventListener("change", (ev: ChangeEvent) => {
            viewModel.upload(
                parseInt(ev.target.dataset.userId),
                ev.target.files
            );
        });
    }
}
