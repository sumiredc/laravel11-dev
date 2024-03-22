export interface View<E = HTMLElement> {
    /**
     * @return {E}
     */
    get element(): E;

    /**
     * @return {boolean}
     */
    exists(): boolean;
}
