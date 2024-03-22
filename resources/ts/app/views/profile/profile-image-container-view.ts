import { ElementNotFoundError } from "@/errors/element-not-found-error";
import { View } from "../view";

export interface ProfileImageContainerViewI extends View<HTMLElement> {}

export class ProfileImageContainerView implements ProfileImageContainerViewI {
    /**
     * @var {string}
     */
    private static _ID: string = "profileImageContainer";

    /**
     * @var {HTMLElement}
     */
    private readonly _element: HTMLElement | null;

    constructor() {
        this._element = <HTMLElement | null>(
            document.getElementById(ProfileImageContainerView._ID)
        );
    }

    /**
     * @return {HTMLElement}
     */
    get element(): HTMLElement {
        if (this._element === null) {
            throw new ElementNotFoundError(`#${ProfileImageContainerView._ID}`);
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
