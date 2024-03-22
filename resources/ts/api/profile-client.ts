import { AxiosConnection, ContentType, ResponseType } from "@ex/axios";
import { ApiClient } from ".";

export interface UploadResponse {
    data: { component: { html: string } };
}

export interface ProfileClientI {
    upload(userId: number, formData: FormData): Promise<UploadResponse>;
}

export class ProfileClient implements ProfileClientI {
    private static readonly UPLOAD_API = "/api/profile/upload/:userId";

    static use() {
        const client = new AxiosConnection().axios;
        return new ProfileClient(client);
    }

    /**
     * @param {ApiClient} _client
     */
    private constructor(private readonly _client: ApiClient) {}

    /**
     * @param {number} userId
     * @param {FormData} formData
     * @return {Promise<UploadResponse>}
     */
    async upload(userId: number, formData: FormData) {
        const api = ProfileClient.UPLOAD_API.replace(":userId", String(userId));

        return this._client.post(api, formData, {
            headers: { "Content-Type": ContentType.MULTIPART_FORM_DATA },
            withCredentials: true,
            responseType: ResponseType.JSON,
        });
    }
}
