import { ProfileUploadInputView } from "@/views/profile/profile-upload-input-view";
import { ProfileUploadInputDataBind } from "./profile/profile-upload-input-data-bind";
import { ProfileImageContainerView } from "@/views/profile/profile-image-container-view";

const inputView = new ProfileUploadInputView();
const containerView = new ProfileImageContainerView();
ProfileUploadInputDataBind.bind(inputView, containerView);
