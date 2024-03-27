import { FileNotFoundError } from "@/errors/file-not-found-error";
import { InvalidValueError } from "@/errors/invalid-value-error";
import { ProfileClient } from "@api/profile-client";

export interface ProfileUploadInputViewModelI {
    upload(userId: number, files: FileList): void;
}

export class ProfileUploadInputViewModel
    implements ProfileUploadInputViewModelI
{
    constructor(
        private readonly _containerEl: HTMLElement,
        private readonly _profileClient = ProfileClient.use()
    ) {}

    /**
     * @param {number} userId
     * @param {FileList} files
     */
    async upload(userId: number, files: FileList) {
        this._validateUserId(userId);
        this._validateFile(files);

        const formData = new FormData();
        formData.append("file", files[0]);

        try {
            const {
                data: { component },
            } = await this._profileClient.upload(userId, formData);

            this._containerEl.innerHTML = component.html;
        } catch (error) {
            // TODO: エラー処理 未対応
            throw error;
        }
    }

    /**
     * @param {number} userId
     * @throws {InvalidValueError}
     */
    private _validateUserId(userId: number) {
        if (userId < 1 || userId % 1 !== 0) {
            throw new InvalidValueError("userId", userId);
        }
    }

    /**
     * @param {FileList} files
     * @throws {FileNotFoundError}
     */
    private _validateFile(files: FileList) {
        if (files.length === 0) {
            throw new FileNotFoundError("Profile File");
        }
    }
}
