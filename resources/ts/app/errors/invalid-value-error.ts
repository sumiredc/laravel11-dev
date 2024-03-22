export class InvalidValueError extends Error {
    /**
     * @param {string} name
     * @param {any} value
     */
    constructor(name: string, value: any) {
        super(`Invalid value detected. ${name}: ${value}`);
    }
}
