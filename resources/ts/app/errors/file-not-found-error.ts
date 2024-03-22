export class FileNotFoundError extends Error {
    /**
     * @param {string} name
     */
    constructor(name: string) {
        super(`File not found: ${name}`);
    }
}
