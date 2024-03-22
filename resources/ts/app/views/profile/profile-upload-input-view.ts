import { ElementNotFoundError } from "@/errors/element-not-found-error";
import { View } from "../view";

export interface ProfileUploadInputViewI extends View<HTMLInputElement> {}

export class ProfileUploadInputView implements ProfileUploadInputViewI {
    /**
     * @var {string}
     */
    private static _ID: string = "profileUploadInput";

    /**
     * @var {HTMLInputElement}
     */
    private readonly _element: HTMLInputElement | null;

    constructor() {
        this._element = <HTMLInputElement | null>(
            document.getElementById(ProfileUploadInputView._ID)
        );
    }

    /**
     * @return {HTMLInputElement}
     */
    get element(): HTMLInputElement {
        if (this._element === null) {
            throw new ElementNotFoundError(`#${ProfileUploadInputView._ID}`);
        }
        return this._element;
    }

    /**
     * @return {boolean}
     */
    exists(): boolean {
        return this._element !== null;
    }
}
