export class ElementNotFoundError extends Error {
    /**
     * @param {string} name
     */
    constructor(name: string) {
        super(`Element "${name}" not found.`);
    }
}
